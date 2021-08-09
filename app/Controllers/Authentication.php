<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

use App\Models\UserModel;
use App\Models\SchoolModel;

use CodeIgniter\RESTful\ResourceController;
// . ' and tickets_reply.id in (select max(id) from tickets_reply group by ticket_id)  order by tickets_reply.id desc's
use \Firebase\JWT\JWT;

class Authentication extends ResourceController
{
    protected $redirectAfterAuthenticate = 'home';
    protected $loginView = 'login';


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
                    $school = $model->get_parent_school($email);

                    if (!empty($school)) {
                        $school = json_decode(json_encode($school), true);
                        // var_dump($school);
                        // exit;
                        $t = array();
                        foreach ($school as $s) {
                            array_push($t, $s['school_id']);
                        }

                        $schools_id = implode(",", $t);
                    }
                    $data = array('email' => $result->email, 'user_id' => $result->id, 'role' => $result->role, 'token' => $output, 'school_id' => $schools_id, 'username' => $result->username);
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
}
