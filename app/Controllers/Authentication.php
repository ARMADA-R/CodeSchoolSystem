<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

use App\Models\UserModel;
use App\Models\SchoolModel;

use CodeIgniter\RESTful\ResourceController;
use DateInterval;
use DateTime;
// . ' and tickets_reply.id in (select max(id) from tickets_reply group by ticket_id)  order by tickets_reply.id desc's
use \Firebase\JWT\JWT;

class Authentication extends ResourceController
{
    protected $redirectAfterAuthenticate = 'home';
    protected $loginView = 'login';
    protected $resetPasswordView = 'resetPassword';
    protected $forgetPasswordView = 'forgetPassword';


    public function Login()
    {
        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            if (!$email) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الايميل ');
                return view($this->loginView, ['data' => $result]);
                exit;
            }
            if (!$password) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل كلمة المرور ');
                return view($this->loginView, ['data' => $result]);
                exit;
            }
            $model = new UserModel();
            $result = $model->login($email, $password);

            if (!empty($result)) {

                $iat = date('Y-m-d');

                $a = strtotime($iat . '+1 year');

                $exp =  date('Y-m-d', $a);

                $payload = array(
                    "iss" => "The_school",
                    "aud" => "The_rewr",
                    "iat" => $iat,

                    "exp" => $exp,
                    "data" => $result->id,
                );
                
                $kunci = 'SChO0lS';
                $output = JWT::encode($payload, $kunci);
                if ($result->role == 3) {
                    $school = $model->get_parent_school($result->phone);

                    $schools_id = '';
                    if (!empty($school)) {
                        $school = json_decode(json_encode($school), true);
                        // var_dump($school);
                        // exit;
                        $t = array();
                        foreach ($school as $s) {
                            if (!in_array($s['id'], $t)) {
                                array_push($t, $s['id']);
                            }
                        }

                        $schools_id = implode(",", $t);
                    }
                    $data = array('email' => $result->email, 'user_id' => $result->id, 'role' => $result->role, 'token' => $output, 'school_id' => $schools_id, 'username' => $result->username);
                } else if ($result->role == 2) {

                    $school_info = (new SchoolModel())->get_school_info_by_id($result->id)[0];

                    $data = array('email' => $result->email, 'user_id' => $result->id, 'role' => $result->role, 'token' => $output, 'username' => $result->username, 'school_name' => $school_info->school_name);
                } else {
                    $data = array('email' => $result->email, 'user_id' => $result->id, 'role' => $result->role, 'token' => $output, 'username' => $result->username);
                }

                $this->setRedirectPathDependOnUserRole($result->role);

                $result = array(
                    'code' => 1, 'msg' => 'success', 'data' => $data
                );

                session()->set('user_data', $data);

                return redirect()->to(site_url($this->redirectAfterAuthenticate));
            } else {
                $result = array(
                    'code' => -1, 'msg' => 'Username or Password incorrect',
                );
                return view($this->loginView, ['data' => $result]);
            }
        } else {
            $result = array(
                'code' => -1, 'msg' => 'Method must be POST',
            );
            return view($this->loginView, ['data' => $result]);
        }
    }


    protected function setRedirectPathDependOnUserRole($role)
    {
        switch ($role) {
            case 1:
                $this->redirectAfterAuthenticate = "admin";
                break;
            case 2:
                $this->redirectAfterAuthenticate = "school";
                break;
            case 3:
                $this->redirectAfterAuthenticate = "parent";
                break;
            case 4:
                $this->redirectAfterAuthenticate = "partner";
                break;

            default:
                $this->redirectAfterAuthenticate = "";
                break;
        }
    }

    public function Logout()
    {
        session()->remove('user_data');
        return redirect()->to($this->loginView);
    }


    public function sendResetPassword()
    {
        $email = $this->request->getVar('email');
        if (!$email) {
            $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الايميل ');
            return view($this->forgetPasswordView, ['data' => $result]);
            exit;
        }
        $model = new UserModel();

        $res = $model->get_user_email($email);
        // dd($res);
        if ($res) {

            $pin = random_int(100000, 999999);
            $token = bin2hex(random_bytes(30));
            $data = [
                'email' => $email,
                'pin' => $pin,
                'token' => $token
            ];

            $resetPassLink = site_url('password/reset?token=' . $token . '&email=' . $email);

            if ($model->setResetPasswordCredentials($data)) {


                $mail = \Config\Services::email();

                $mail->setFrom(env("SYSTEM_EMAIL"), env("SYSTEM_NAME"));

                $mail->setTo($email);

                $mail->setSubject('اعادة ضبط كلمة المرور');

                $mail->setMessage(view('mail/resetPasswordEmail', ['link' => $resetPassLink]));

                $mail->send();

                return redirect()->route('forgetPassword')->with(
                    "data",
                    [
                        "msg" => "يرجى مراجعة صندوق البريد الالكتروني لديكم",
                        "code" => 0
                    ]
                );
            } else {
                $result = [
                    'code' => -1, 'msg' => 'حدث خطأ ما! الرجاء المحاولة مرة اخرى.',
                ];
                return view($this->forgetPasswordView, ['data' => $result]);
            }
        } else {
            $result = array(
                'code' => -1, 'msg' => 'البريد الالكتروني لا ينتمي الى سجلاتنا!',
            );
            return view($this->forgetPasswordView, ['data' => $result]);
        }
    }

    public function checkAndShowResetPasswordForm()
    {
        $email = $this->request->getVar('email');

        $token = $this->request->getVar('token');

        if (!$token || !$email) {
            $result = array('code' => -1, 'msg' => 'الرابط غير صالح!');
            return view($this->forgetPasswordView, ['data' => $result]);
            exit;
        }
        $model = new UserModel();

        $res = $model->getResetPasswordCredentials($email);

        if ($res) {
            $res = $res[0];
            $currentDatabaseDateTime = $model->getCurrentDatabaseDateTime();

            if ($res->token != $token) {
                $result = array(
                    'code' => -1, 'msg' => 'الرابط غير صالح!',
                );
                return view($this->forgetPasswordView, ['data' => $result]);
            }

            if ((new DateTime($res->create_date))->add(new DateInterval('PT2H')) <= (new DateTime($currentDatabaseDateTime))) {
                $result = array(
                    'code' => -1, 'msg' => 'الرابط غير صالح!',
                );
                return view($this->forgetPasswordView, ['data' => $result]);
            }

            return view($this->resetPasswordView, ['data' => $res]);
        } else {
            $result = array(
                'code' => -1, 'msg' => 'الرابط غير صالح!',
            );
            return view($this->forgetPasswordView, ['data' => $result]);
        }
    }

    public function resetPassword()
    {
        $email = $this->request->getVar('email');

        $token = $this->request->getVar('token');
        $password = $this->request->getVar('password');
        $password_confirmation = $this->request->getVar('password_confirmation');


        if (!$token || !$email) {

            $result = array('code' => -1, 'msg' => 'الرابط غير صالح!');
            return view($this->forgetPasswordView, ['data' => $result]);
            exit;
        }

        if (!$password) {

            $result = array('code' => -1, 'msg' => 'يجب تحديد كلمة المرور');
            return view($this->forgetPasswordView, ['data' => $result]);
            exit;
        }

        if (!$password_confirmation || ($password != $password_confirmation)) {

            $result = array('code' => -1, 'msg' => 'يجب تأكيد كلمة المرور');
            return view($this->forgetPasswordView, ['data' => $result]);
            exit;
        }

        $model = new UserModel();

        $res = $model->getResetPasswordCredentials($email);

        if ($res) {
            // dd($res);
            $res = $res[0];
            $currentDatabaseDateTime = $model->getCurrentDatabaseDateTime();

            if ($res->token != $token) {

                $result = array(
                    'code' => -1, 'msg' => 'الرابط غير صالح!',
                );
                return view($this->forgetPasswordView, ['data' => $result]);
            }

            if ((new DateTime($res->create_date))->add(new DateInterval('PT2H')) <= (new DateTime($currentDatabaseDateTime))) {

                $result = array(
                    'code' => -1, 'msg' => 'الرابط غير صالح!',
                );
                return view($this->forgetPasswordView, ['data' => $result]);
            }


            $model->resetPassword($email, $password);
            $model->delete_resetPassword_record($email);

            return redirect()->route('login')->withInput(['data' => 'تم تحديث كلمة المرور']);
        } else {
            $result = array(
                'code' => -1, 'msg' => 'الرابط غير صالح!',
            );
            return view($this->forgetPasswordView, ['data' => $result]);
        }
    }
}
