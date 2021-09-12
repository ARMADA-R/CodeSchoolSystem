<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

use App\Models\UserModel;
use App\Models\SchoolModel;
use App\Models\StudentsModel;
use CodeIgniter\RESTful\ResourceController;
// . ' and tickets_reply.id in (select max(id) from tickets_reply group by ticket_id)  order by tickets_reply.id desc's
use \Firebase\JWT\JWT;

class Auth extends ResourceController
{

    public function Register()
    {
        if ($this->request->getMethod() == 'post') {

            $model = new UserModel();
            $role = $this->request->getVar('role');

            if (!$role) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل نوع المستخدم');
                return $this->respond($result, 400);
                exit;
            }
            if ($role == 2) {
                $school_name = $this->request->getVar('school_name');
                $edcution_type = $this->request->getVar('edcution_type');
                $school_number = $this->request->getVar('school_number');
                $city = $this->request->getVar('city');
                $area = $this->request->getVar('area');
                $email = $this->request->getVar('email');
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');

                $phone = $this->request->getVar('phone');

                if (!$school_name) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  اسم المدرسة');
                    return $this->respond($result, 400);
                    exit;
                }

                if (!$username) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال اسم المستخدم');
                    return $this->respond($result, 400);
                    exit;
                }

                if (!$edcution_type) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  نوع التعليم');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$email) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الايميل ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$password) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل كلمة المرور ');
                    return $this->respond($result, 400);
                    exit;
                }


                if (!$phone) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال رقم الجوال ');
                    return $this->respond($result, 400);
                    exit;
                }

                $model = new UserModel();
                $check_email = $model->get_user_email($email);
                $check_username = $model->get_user_username($username);
                $check_phone = $model->get_user_by_phone($phone);

                if (empty($check_email)) {
                    if (empty($check_phone)) {
                        if (empty($check_username)) {
                            $data = [

                                'email' => $email,
                                'username' => $username,
                                'password' => md5($password),
                                'city' => $city,
                                'area' => $area,
                                'phone' => $phone,
                                'role' => 2,
                                'status' => 1
                            ];

                            $save = $model->add_user($data);

                            if ($save > 0) {
                                $data2 = [
                                    'school_name' => $school_name,
                                    'education_type' => $edcution_type,
                                    'school_number' => $school_number,
                                    'school_id' => $save

                                ];

                                $school = new SchoolModel();
                                $info = $school->add_school_info($data2);

                                $iat = date('Y-m-d');

                                $a = strtotime($iat . '+1 year');


                                $exp =  date('Y-m-d', $a);

                                $user = array('user_id' => $save);
                                $payload = array(
                                    "iss" => "The_school",
                                    "aud" => "The_rewr",
                                    "iat" => $iat,

                                    "exp" => $exp,
                                    "data" => $user,
                                );

                                $kunci = 'SChO0lS';
                                $output = JWT::encode($payload, $kunci);
                                $result = array(
                                    'code' => 1, 'msg' => 'success', 'token' => $output, 'user_id' => $save
                                );

                                return $this->respond($result, 200);
                            } else {
                                $result = array(
                                    'code' => -1, 'msg' => 'fail',
                                );
                                return $this->respond($result, 400);
                                // echo $output;
                            }
                        } else {
                            $result = array('code' => -1, 'msg' => 'اسم المستخدم موجود مسبقا');
                            return $this->respond($result, 400);
                            exit;
                        }
                    } else {
                        $result = array('code' => -1, 'msg' => 'رقم الهاتف موجود مسبقا');
                        return $this->respond($result, 400);
                        exit;
                    }
                } else {
                    $result = array('code' => -1, 'msg' => 'الايميل موجود مسبقا');
                    return $this->respond($result, 400);
                    exit;
                }
            }
            if ($role == 3) {

                $email = $this->request->getVar('email');
                $username = $this->request->getVar('username');
                $phone = $this->request->getVar('phone');
                $password = $this->request->getVar('password');

                if (!$email) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الايميل ');
                    return $this->respond($result, 400);
                    exit;
                }

                if (!$username) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال اسم المستخدم ');
                    return $this->respond($result, 400);
                    exit;
                }

                if (!$phone) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال رقم الجوال ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$password) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل كلمة المرور ');
                    return $this->respond($result, 400);
                    exit;
                }

                $student = new StudentsModel();

                $parent_students = $student->get_students_by_phone($phone);

                $model = new UserModel();
                $school = new SchoolModel();
                
                $check_email = $model->get_user_email($email);
                $check_username = $model->get_user_username($username);
                $check_phone = $model->get_user_by_phone($phone);

                if (empty($check_email)) {
                    if (empty($check_phone)) {
                        if (empty($check_username)) {
                            $data = [
                                'email' => $email,
                                'username' => $username,
                                'phone' => $phone,
                                'password' => md5($password),

                                'role' => 3,
                                'status' => 1
                            ];

                            $save = $model->add_user($data);

                            if ($save > 0) {

                                if ($parent_students) {
                                    foreach ($parent_students as $value) {
                                        $data2 = array('school_id' => $value->school_id, 'parent_id' =>  $save);
                                        if ($school->add_parent_to_school($data2)) {
                                            $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                                        }
                                    }
                                }

                                $iat = date('Y-m-d');

                                $a = strtotime($iat . '+1 year');


                                $exp =  date('Y-m-d', $a);

                                $user = array('user_id' => $save);
                                $payload = array(
                                    "iss" => "The_school",
                                    "aud" => "The_rewr",
                                    "iat" => $iat,

                                    "exp" => $exp,
                                    "data" => $user,
                                );

                                $kunci = 'SChO0lS';
                                $output = JWT::encode($payload, $kunci);
                                $result = array(
                                    'code' => 1, 'msg' => 'success', 'token' => $output, 'user_id' => $save
                                );

                                return $this->respond($result, 200);
                            } else {
                                $result = array(
                                    'code' => -1, 'msg' => 'fail',
                                );
                                return $this->respond($result, 400);
                                // echo $output;
                            }
                        } else {
                            $result = array('code' => -1, 'msg' => 'اسم المستخدم موجود مسبقا');
                            return $this->respond($result, 400);
                            exit;
                        }
                    } else {
                        $result = array('code' => -1, 'msg' => 'رقم الهاتف موجود مسبقا');
                        return $this->respond($result, 400);
                        exit;
                    }
                } else {
                    $result = array('code' => -1, 'msg' => 'الايميل موجود مسبقا');
                    return $this->respond($result, 400);
                    exit;
                }
            }
            if ($role == 4) {

                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $city = $this->request->getVar('city');
                $area = $this->request->getVar('area');
                $phone = $this->request->getVar('phone');
                $username = $this->request->getVar('username');
                if (!$email) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الايميل ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$username) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال اسم المستخدم ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$password) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل كلمة المرور ');
                    return $this->respond($result, 400);
                    exit;
                }



                if (!$phone) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال رقم الجوال ');
                    return $this->respond($result, 400);
                    exit;
                }

                $model = new UserModel();
                $check_email = $model->get_user_email($email);
                $check_username = $model->get_user_username($username);
                $check_phone = $model->get_user_by_phone($phone);

                if (empty($check_email)) {
                    if (empty($check_phone)) {
                        if (empty($check_username)) {

                            $data = [

                                'email' => $email,
                                'username' => $username,
                                'password' => md5($password),
                                'city' => $city,
                                'area' => $area,
                                'phone' => $phone,
                                'username' => $username,
                                'role' => 4,
                                'status' => 1
                            ];

                            $save = $model->add_user($data);

                            if ($save > 0) {


                                $iat = date('Y-m-d');

                                $a = strtotime($iat . '+1 year');


                                $exp =  date('Y-m-d', $a);

                                $user = array('user_id' => $save);
                                $payload = array(
                                    "iss" => "The_school",
                                    "aud" => "The_rewr",
                                    "iat" => $iat,

                                    "exp" => $exp,
                                    "data" => $user,
                                );

                                $kunci = 'SChO0lS';
                                $output = JWT::encode($payload, $kunci);
                                $result = array(
                                    'code' => 1, 'msg' => 'success', 'token' => $output, 'user_id' => $save
                                );

                                return $this->respond($result, 200);
                            } else {
                                $result = array(
                                    'code' => -1, 'msg' => 'fail',
                                );
                                return $this->respond($result, 400);
                                // echo $output;
                            }
                        } else {
                            $result = array('code' => -1, 'msg' => 'اسم المستخدم موجود مسبقا');
                            return $this->respond($result, 400);
                            exit;
                        }
                    } else {
                        $result = array('code' => -1, 'msg' => 'رقم الهاتف موجود مسبقا');
                        return $this->respond($result, 400);
                        exit;
                    }
                } else {
                    $result = array('code' => -1, 'msg' => 'الايميل موجود مسبقا');
                    return $this->respond($result, 400);
                    exit;
                }
            }
        } else {
            $result = array(
                'code' => -1, 'msg' => 'Method must be POST',
            );
            return $this->respond($result, 400);
        }
    }
    public function test()
    {

        $check = new Check(); // Create an instance
        $result = $check->check();
        var_dump($result['code']);
        $result = json_encode($result['data']->exp);
        return $this->respond($result, 400);
    }
    public function Login()
    {
        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            if (!$email) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الايميل ');
                return $this->respond($result, 400);
                exit;
            }
            if (!$password) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل كلمة المرور ');
                return $this->respond($result, 400);
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
                $result = array(
                    'code' => 1, 'msg' => 'success', 'data' => $data
                );
                return $this->respond($result, 200);
            } else {
                $result = array(
                    'code' => -1, 'msg' => 'Username or Password incorrect',
                );
                return $this->respond($result, 400);
            }
        } else {
            $result = array(
                'code' => -1, 'msg' => 'Method must be POST',
            );
            return $this->respond($result, 400);
        }
    }
    public function SendRequestResetPassword()
    {
        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getVar('email');
            if (!$email) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الايميل ');
                return $this->respond($result, 400);
                exit;
            }
            $model = new UserModel();
            $check_email = $model->get_user_email($email);
            if (empty($check_email)) {
                $result = array(
                    'code' => -1, 'msg' => 'الايميل غير موجود ',
                );
                return $this->respond($result, 400);
            } else {
                $to = $email;

                $subject = 'تغير كلمة المرور';

                $headers = "From: school@gmail.com\r\n";
                $headers .= "Reply-To: " . $email . "\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                $message = '<p><strong>تغيير كلمة المرور</strong> يرجى الضغط على الرابط:</p><a href="index.html">اضغط هنا</a>';


                if (mail($to, $subject, $message, $headers)) {
                    $result = array(
                        'code' => 1, 'msg' => 'success',
                    );
                    return $this->respond($result, 200);
                } else {
                    $result = array(
                        'code' => -1, 'msg' => 'fail',
                    );
                    return $this->respond($result, 200);
                }
            }
        } else {
            $result = array(
                'code' => -1, 'msg' => 'Method must be POST',
            );
            return $this->respond($result, 400);
        }
    }
    public function ResetPassword()
    {
        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            if (!$email) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الايميل ');
                return $this->respond($result, 400);
                exit;
            }
            if (!$password) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل كلمة المرور ');
                return $this->respond($result, 400);
                exit;
            }
            $model = new UserModel();
            $check_email = $model->get_user_email($email);
            if (empty($check_email)) {
                $result = array(
                    'code' => -1, 'msg' => 'الايميل غير موجود ',
                );
                return $this->respond($result, 400);
            } else {
                $password_new = array('password' => md5($password));

                $result = $model->resetpassword($email, $password_new);
                if ($result == 1) {
                    $result = array(
                        'code' => 1, 'msg' => 'success',
                    );
                    return $this->respond($result, 200);
                } else {
                    $result = array(
                        'code' => -1, 'msg' => 'fail',
                    );
                    return $this->respond($result, 200);
                }
            }
        } else {
            $result = array(
                'code' => -1, 'msg' => 'Method must be POST',
            );
            return $this->respond($result, 400);
        }
    }
    public function Logout()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {

                $request = service('request');
                $test = $request->getHeader('Authorization');
                $token = $test->getValue();
                unset($token);
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
}
