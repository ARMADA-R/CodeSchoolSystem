<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

use CodeIgniter\API\ResponseTrait;
use App\Models\SchoolModel;
use App\Models\UserModel;
use App\Models\MessaingModel;
use App\Models\StudentsModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;
use App\Models\GatesModel;

class Schools extends BaseController
{
    use ResponseTrait;
    public function GetSchools()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');
                $key = $this->request->getVar('key');
                if (empty($key) || $key != 'all') {
                    if (!$page) {
                        $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                        return $this->respond($result, 400);
                        exit;
                    }
                    if (!$limit) {
                        $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                        return $this->respond($result, 400);
                        exit;
                    }
                }
                $model = new SchoolModel();
                $result = $model->get_school($limit, $page, $key);

                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result, 'total_count' => count($result));
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetServicesSchools()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {

                $model = new SchoolModel();
                $result = $model->get_services();
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function EditSchool()
    {


        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_name = $this->request->getVar('school_name');
                $id = $this->request->getVar('id');
                $edcution_type = $this->request->getVar('edcution_type');
                $school_number = $this->request->getVar('school_number');
                $city = $this->request->getVar('city');
                $area = $this->request->getVar('area');
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $status = $this->request->getVar('status');
                $phone = $this->request->getVar('phone');
                $category = $this->request->getVar('category');
                $username = $this->request->getVar('username');


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
                if (!$id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل التعرفة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $usermodel = new UserModel();
                $model = new SchoolModel();
                // $check_email=$usermodel->get_user_email($email);
                // if(empty($check_email)){
                $data = [

                    'email' => $email,
                    'password' => md5($password),
                    'city' => $city,
                    'area' => $area,
                    'phone' => $phone,
                    'username' => $username,
                    'status' => 1

                ];

                if ($model->edit_school($data, $id)) {
                    $data2 = [
                        'school_name' => $school_name,
                        'education_type' => $edcution_type,
                        'school_number' => $school_number,
                        'category' => $category

                    ];


                    $info = $model->edit_info($data2, $id);

                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                    // }
                    // else{
                    //     $data=array('code'=>-1,'msg'=>'fail','data'=>[]);
                    //     return	$this->respond($data, 400);
                    // }


                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                    exit;
                }
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
    public function EditServiceSchool()
    {


        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $id = $this->request->getVar('id');
                $status = $this->request->getVar('status');
                $school_id = $this->request->getVar('school_id');
                $end_date = $this->request->getVar('end_date');

                $service_id = $this->request->getVar('service_id');
                if (!$service_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الخدمة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$end_date) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل التاريخ ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (strlen($status) == 0) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الحالة');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new SchoolModel();
                $check_service = $model->get_service_by_id($service_id, $school_id);
                if (!empty($check_service)) {
                    $data = array('service_id' => $service_id, 'school_id' => $school_id, 'end_date' => $end_date, 'status' => $status);
                    $update = $model->edit_service($data);
                    if ($update == 1) {
                        $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                        return    $this->respond($data, 200);
                    } else {
                        $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                        return    $this->respond($data, 400);
                    }
                } else {
                    $data = array('service_id' => $service_id, 'school_id' => $school_id, 'end_date' => $end_date, 'status' => $status);
                    $update = $model->add_service($data);
                    if ($update == 1) {
                        $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                        return    $this->respond($data, 200);
                    } else {
                        $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                        return    $this->respond($data, 400);
                    }
                }
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
    public function UpdateSchoolStatus()
    {


        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $id = $this->request->getVar('id');
                $status = $this->request->getVar('status');
                if (!$id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  التعرفة');
                    return $this->respond($result, 400);
                    exit;
                }
                if (strlen($status) == 0) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الحالة');
                    return $this->respond($result, 400);
                    exit;
                }

                $data = array('status' => $status);

                $model = new SchoolModel();
                $update = $model->edit_school($data, $id);
                if ($update == 1) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
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
    public function SendAdminEmailtoSchool()
    {
        if ($this->request->getMethod() == 'post') {
            $admin_email = $this->request->getVar('admin_email');
            $school_email = $this->request->getVar('school_email');
            $message_title = $this->request->getVar('message_title');
            $message_text = $this->request->getVar('message_text');
            if (!$admin_email) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل ايميل المدير ');
                return $this->respond($result, 400);
                exit;
            }
            if (!$school_email) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل ايميل المدرسة ');
                return $this->respond($result, 400);
                exit;
            }
            if (!$message_title) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عنوان الرسالة  ');
                return $this->respond($result, 400);
                exit;
            }
            if (!$message_text) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل نص الرسالة  ');
                return $this->respond($result, 400);
                exit;
            }
            $model = new UserModel();
            $check_email = $model->get_user_email($school_email);

            if (!empty($check_email)) {
                $to = $school_email;
                $subject = 'ايميل مدرسة';

                $headers = "From: " . $admin_email . "\r\n";
                $headers .= "Reply-To: " . $school_email . "\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                $message = '<p><strong>' . $message_title . "</strong> \r\n<p>" . $message_text . "</p>";


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
                $data = ['sender_id' => $sender_id, 'reciver_id' => $reciver_id, 'message' => $message_text, 'title' => $message_title, 'sender_type' => 1];
                $result = $model->add_email($data);
                if ($result) {
                    $result = array(
                        'code' => 1, 'msg' => 'success'
                    );

                    return $this->respond($result, 200);
                } else {
                    $result = array(
                        'code' => -1, 'msg' => 'fail'
                    );

                    return $this->respond($result, 400);
                }
            } else {
                $result = array(
                    'code' => -1, 'msg' => 'الايميل غير موجود'
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
    public function GetSchoolByID()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $id = $this->request->getVar('id');
                if (!$id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل التعرفة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new SchoolModel();
                $result = $model->get_school_by_id($id);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function DeleteSchool()
    {

        if ($this->request->getMethod() == 'delete') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $input = $this->request->getRawInput();;
                $id = isset($input['id']) ? $input['id'] : '';
                if (!$id) {
                    $data = array('code' => -1, 'msg' => 'Please insert id flied', 'data' => []);
                    return    $this->respond($data, 400);
                    exit;
                }
                $model = new SchoolModel();

                $delete = $model->delete_school($id);
                if ($delete == 1) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be Delete', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetSections()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {

                $model = new SchoolModel();
                $result = $model->get_sections();
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetSubject()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {

                $model = new SchoolModel();
                $level_id = $this->request->getVar('level_id');
                $school_id = $this->request->getVar('school_id');
                $result = $model->get_subjects($level_id, $school_id);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetPeriods()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {

                $model = new SchoolModel();
                $result = $model->get_period();
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetClasses()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {

                $model = new SchoolModel();
                $result = $model->get_classes();
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetSemester()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {

                $model = new SchoolModel();
                $result = $model->get_Semester();
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function SendAbsenceAndLag()
    {
        if ($this->request->getMethod() == 'post') {
            $students_id = $this->request->getVar('students_id');
            $class_id = $this->request->getVar('class_id');
            $semaster_id = $this->request->getVar('semaster_id');
            $monitoring_case = $this->request->getVar('monitoring_case');
            $period = $this->request->getVar('period');
            $day = $this->request->getVar('day');
            $date = $this->request->getVar('date');
            $school_id = $this->request->getVar('school_id');
            if (!$students_id) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الطلاب ');
                return $this->respond($result, 400);
                exit;
            }

            if (!$school_id) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة  ');
                return $this->respond($result, 400);
                exit;
            }

            if (!$monitoring_case) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  حالة الرصد  ');
                return $this->respond($result, 400);
                exit;
            }
            if (!$day) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  حالة اليوم  ');
                return $this->respond($result, 400);
                exit;
            }
            if (!$period) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  حالة الحصة  ');
                return $this->respond($result, 400);
                exit;
            }
            if (!$date) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  حالة التاريخ  ');
                return $this->respond($result, 400);
                exit;
            }
            $students_id = explode(",", $students_id);
            $model = new SchoolModel();
            $student_model = new StudentsModel();

            foreach ($students_id as $student) {
                $student2 = $student_model->get_student_name_by_id($student);
                if (!empty($student2)) {
                    $message = ' ابنكم' . $student2->full_name . ' رصد له حالة' . $monitoring_case . ' اليوم' . $day . ' الحصة' . $period . ' الموافق' . $date;
                } else {
                    $message = 'ابنكم رصد له حالة' . $monitoring_case . ' اليوم' . $day . ' الحصة' . $period . ' الموافق' . $date;
                }

                $data = array('student_id' => $student, 'class_id' => $class_id, 'semster_id' => $semaster_id, 'monitoring_case' => $monitoring_case, 'period' => $period, 'day' => $day, 'date' => $date, 'school_id' => $school_id, 'message' => $message);
                if ($model->add_asbense($data)) {
                } else {
                    $data = array('code' => 1, 'msg' => 'حصل خطأ ما الرجاء المحاولة لاحقا', 'data' => []);
                    return    $this->respond($data, 400);
                }
            }


            $data = array('code' => 1, 'msg' => 'success', 'data' => []);
            return    $this->respond($data, 200);
        } else {
            $result = array(
                'code' => -1, 'msg' => 'Method must be POST',
            );
            return $this->respond($result, 400);
        }
    }
    public function GetStudentAbsenceAndLag()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');
                $school_id = $this->request->getVar('school_id');
                $class_id = $this->request->getVar('class_id');
                $semaster_id = $this->request->getVar('semaster_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $key = $this->request->getVar('key');
                if (empty($key) || $key != 'all') {
                    if (!$page) {
                        $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                        return $this->respond($result, 400);
                        exit;
                    }
                    if (!$limit) {
                        $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                        return $this->respond($result, 400);
                        exit;
                    }
                }

                $model = new SchoolModel();
                $result = $model->get_student($limit, $page, $class_id, $semaster_id, $school_id, $key);

                if (!empty($result)) {
                    $schools = array();
                    $i = 0;
                    foreach ($result as $value) {
                        // $value['student_id']=
                        $schools[$i]['student_id'] = $value->student_id;
                        $schools[$i]['full_name'] = $value->full_name;
                        $schools[$i]['student_number'] = $value->student_number;
                        $schools[$i]['class_id'] = $value->class_id;
                        $schools[$i]['parent_phone'] = $value->parent_phone;
                        $schools[$i]['class_name'] = $value->class_name;
                        $schools[$i]['semaster_name'] = $value->name;
                        $schools[$i]['monitoring_case'] = null;
                        $schools[$i]['period'] = null;
                        $schools[$i]['day'] = null;
                        $schools[$i]['date'] = null;
                        $i++;
                        // array_push($schools,$value);
                    }
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $schools, 'total_count' => count($result));
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetArchiveAbsenceAndLag()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');
                $school_id = $this->request->getVar('school_id');

                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $key = $this->request->getVar('key');
                if (empty($key) || $key != 'all') {
                    if (!$page) {
                        $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                        return $this->respond($result, 400);
                        exit;
                    }
                    if (!$limit) {
                        $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                        return $this->respond($result, 400);
                        exit;
                    }
                }
                $model = new SchoolModel();
                $result = $model->get_asbense($limit, $page, $school_id, $key);
                $asbense = array();
                if (!empty($result)) {
                    $unique = array_unique($result, SORT_REGULAR);

                    foreach ($unique as $a) {
                        array_push($asbense, $a);
                    }

                    $data = array('code' => 1, 'msg' => 'success', 'data' => array_unique($asbense, SORT_REGULAR), 'total_count' => count($asbense));
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetSchoolTable()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');
                $school_id = $this->request->getVar('school_id');
                $class_id = $this->request->getVar('class_id');
                $semaster_id = $this->request->getVar('semaster_id');
                $section_id = $this->request->getVar('section_id');
                $program_id = $this->request->getVar('program_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $key = $this->request->getVar('key');
                if (empty($key) || $key != 'all') {
                    if (!$page) {
                        $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                        return $this->respond($result, 400);
                        exit;
                    }
                    if (!$limit) {
                        $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                        return $this->respond($result, 400);
                        exit;
                    }
                }
                $model = new SchoolModel();
                $result = $model->get_school_table($limit, $page, $school_id, $key, $class_id, $section_id, $semaster_id, $program_id);
                $asbense = array();
                if (!empty($result)) {


                    $data = [];
                    $i = 0;
                    foreach ($result as $row) {

                        $subjects = [
                            'subject_name' => $row->subject_name,
                            'period_name' => $row->period_name,

                        ];
                        if (!isset($data[$row->day])) {
                            $data[$row->day] = [
                                'day' => $row->day,

                                'table' => [$subjects]
                            ];
                        } else {
                            $data[$row->day]['table'][] = $subjects;
                        }
                    }
                    $data2 = array();
                    foreach ($data as $d) {
                        array_push($data2, $d);
                    }
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $data2, 'total_count' => count($asbense));
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetParentArchiveAbsenceAndLag()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');
                $school_id = $this->request->getVar('school_id');
                $key = $this->request->getVar('key');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }


                $key = $this->request->getVar('key');
                if (empty($key) || $key != 'all') {
                    if (!$page) {
                        $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                        return $this->respond($result, 400);
                        exit;
                    }
                    if (!$limit) {
                        $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                        return $this->respond($result, 400);
                        exit;
                    }
                }

                $model = new SchoolModel();
                $result = $model->get_asbense_reply($limit, $page, $school_id, $key);
                $asbense = array();
                if (!empty($result)) {
                    $unique = array_unique($result, SORT_REGULAR);
                    foreach ($unique as $a) {
                        array_push($asbense, $a);
                    }
                    $data = array('code' => 1, 'msg' => 'success', 'data' => array_unique($asbense, SORT_REGULAR), 'total_count' => count($asbense));
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetServicesBySchoolID()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new SchoolModel();
                $result = $model->get_service_by_school_id($school_id);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function AddSchoolTable()
    {
        if ($this->request->getMethod() == 'post') {

            $class_id = $this->request->getVar('class_id');
            $semaster_id = $this->request->getVar('semaster_id');
            $section_id = $this->request->getVar('section_id');
            $period = $this->request->getVar('period_id');
            $day = $this->request->getVar('day');
            $subject_id = $this->request->getVar('subject_id');
            $school_id = $this->request->getVar('school_id');
            $program_id = $this->request->getVar('program_id');
            if (!$class_id) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الصف ');
                return $this->respond($result, 400);
                exit;
            }

            if (!$school_id) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة  ');
                return $this->respond($result, 400);
                exit;
            }
            if (!$program_id) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل اسم  البرنامج  ');
                return $this->respond($result, 400);
                exit;
            }

            if (!$section_id) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الشعبة   ');
                return $this->respond($result, 400);
                exit;
            }
            if (!$day) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل   اليوم  ');
                return $this->respond($result, 400);
                exit;
            }
            if (!$period) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل   الحصة  ');
                return $this->respond($result, 400);
                exit;
            }
            if (!$semaster_id) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الفصل   ');
                return $this->respond($result, 400);
                exit;
            }
            $period = explode(",", $period);
            $subject_id = explode(",", $subject_id);
            $model = new SchoolModel();
            $student_model = new StudentsModel();

            foreach ($subject_id as $key => $value) {


                $data = array('school_id' => $school_id, 'class_id' => $class_id, 'semestar_id' => $semaster_id, 'section_id' => $section_id, 'period' => $period[$key], 'subject_id' => $value, 'day' => $day, 'program_id' => $program_id);
                if ($model->add_table_school($data)) {
                } else {
                    $data = array('code' => 1, 'msg' => 'حصل خطأ ما الرجاء المحاولة لاحقا', 'data' => []);
                    return    $this->respond($data, 400);
                }
            }


            $data = array('code' => 1, 'msg' => 'success', 'data' => []);
            return    $this->respond($data, 200);
        } else {
            $result = array(
                'code' => -1, 'msg' => 'Method must be POST',
            );
            return $this->respond($result, 400);
        }
    }
    public function GetLevel()
    {
        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {


                $result = array(0 => array('id' => 1, 'name' => 'المرحلة الابتدائية'), 1 => array('id' => 2, 'name' => 'المرحلة المتوسطة'), 2 => array('id' => 3, 'name' => 'نظام المقررات'));
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result, 'total_count' => count($result));
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }

    public function GetProgramBylevel()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $level_id = $this->request->getVar('level_id');
                if (!$level_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المرحلة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new SchoolModel();
                $result = $model->get_program_by_level($level_id);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetsubjectsByProgram()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $program = $this->request->getVar('program_id');
                if (!$program) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  البرنامج ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new SchoolModel();
                $result = $model->get_subject_by_program($program);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function AddSubject()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $name = $this->request->getVar('name');
                $level_id = $this->request->getVar('level_id');
                $program_id = $this->request->getVar('program_id');
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$level_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المرحلة ');
                    return $this->respond($result, 400);
                    exit;
                }

                if (!$name) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  اسم المادة  ');
                    return $this->respond($result, 400);
                    exit;
                }


                $model = new SchoolModel();
                $data = array('name' => $name, 'level_id' => $level_id, 'program_id' => $program_id, 'school_id' => $school_id);
                if ($model->add_subject($data)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
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
    public function AddProgramName()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $name = $this->request->getVar('name');

                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }


                if (!$name) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  اسم البرنامج  ');
                    return $this->respond($result, 400);
                    exit;
                }


                $model = new SchoolModel();
                $data = array('name' => $name, 'school_id' => $school_id);
                if ($model->add_program_name($data)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
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
    public function AddExamName()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $name = $this->request->getVar('name');

                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }


                if (!$name) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  اسم برنامج الاختبار  ');
                    return $this->respond($result, 400);
                    exit;
                }


                $model = new SchoolModel();
                $data = array('name' => $name, 'school_id' => $school_id);
                if ($model->add_exam_name($data)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
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
    public function GetTableschoolName()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new SchoolModel();
                $result = $model->get_program_school($school_id);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GeExamchoolName()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new SchoolModel();
                $result = $model->get_exam_school_name($school_id);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function AddExamTable()
    {
        if ($this->request->getMethod() == 'post') {

            $class_id = $this->request->getVar('class_id');

            $section_id = $this->request->getVar('section_id');

            $day = $this->request->getVar('day');
            $date = $this->request->getVar('date');
            $subject_id = $this->request->getVar('subject_id');
            $exam_id = $this->request->getVar('exam_id');
            $school_id = $this->request->getVar('school_id');
            if (!$school_id) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                return $this->respond($result, 400);
                exit;
            }
            if (!$class_id) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الصف ');
                return $this->respond($result, 400);
                exit;
            }


            if (!$exam_id) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل اسم  البرنامج  ');
                return $this->respond($result, 400);
                exit;
            }

            if (!$day) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  اليوم');
                return $this->respond($result, 400);
                exit;
            }
            if (!$date) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  التاريخ');
                return $this->respond($result, 400);
                exit;
            }
            if (!$subject_id) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المادة');
                return $this->respond($result, 400);
                exit;
            }

            $model = new SchoolModel();





            $data = array('school_id' => $school_id, 'class_id' => $class_id, 'section_id' => $section_id, 'day' => $day, 'date' => $date, 'day' => $day, 'exam_id' => $exam_id, 'subject_id' => $subject_id);
            if ($model->add_exam_table_school($data)) {

                $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                return    $this->respond($data, 200);
            } else {
                $data = array('code' => 1, 'msg' => 'حصل خطأ ما الرجاء المحاولة لاحقا', 'data' => []);
                return    $this->respond($data, 400);
            }
        } else {
            $result = array(
                'code' => -1, 'msg' => 'Method must be POST',
            );
            return $this->respond($result, 400);
        }
    }
    public function GetSchoolExamTable()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');
                $exam_id = $this->request->getVar('exam_id');
                $class_id = $this->request->getVar('class_id');

                $section_id = $this->request->getVar('section_id');

                $key = $this->request->getVar('key');
                if (empty($key) || $key != 'all') {
                    if (!$page) {
                        $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                        return $this->respond($result, 400);
                        exit;
                    }
                    if (!$limit) {
                        $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                        return $this->respond($result, 400);
                        exit;
                    }
                }
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new SchoolModel();
                $result = $model->get_school_exam_table($limit, $page, $key, $class_id, $section_id, $exam_id, $school_id);
                $asbense = array();
                if (!empty($result)) {


                    //                     $data = [];
                    //                     $i=0;
                    //                     foreach ($result as $row) {

                    //                         $subjects = [
                    //                             'subject_name' => $row->subject_name,


                    //                         ];
                    //                         if (!isset($data[$row->day])) {
                    //                             $data[$row->day] = [
                    //                                 'day' => $row->day,

                    //                                 'table' => [$subjects]
                    //                             ];
                    //                         } else {
                    //                             $data[$row->day]['table'][] = $subjects;
                    //                         }
                    //                     }
                    //                     $data2=array();
                    //                     foreach($data as $d){
                    // array_push($data2,$d);
                    //                     }
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result, 'total_count' => count($result));
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetParentExamTable()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');


                $key = $this->request->getVar('key');
                if (empty($key) || $key != 'all') {
                    if (!$page) {
                        $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                        return $this->respond($result, 400);
                        exit;
                    }
                    if (!$limit) {
                        $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                        return $this->respond($result, 400);
                        exit;
                    }
                }
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new SchoolModel();
                $result = $model->get_parent_exam_table2($limit, $page, $key, $school_id);
                $asbense = array();
                if (!empty($result)) {


                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result, 'total_count' => count($result));
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetParentSchoolTable()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');


                $key = $this->request->getVar('key');
                if (empty($key) || $key != 'all') {
                    if (!$page) {
                        $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                        return $this->respond($result, 400);
                        exit;
                    }
                    if (!$limit) {
                        $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                        return $this->respond($result, 400);
                        exit;
                    }
                }
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new SchoolModel();
                $result = $model->get_parent_school_table2($limit, $page, $key, $school_id);
                $asbense = array();
                if (!empty($result)) {


                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result, 'total_count' => count($result));
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function AddPeriod()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $name = $this->request->getVar('name');

                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }


                if (!$name) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  اسم البرنامج  ');
                    return $this->respond($result, 400);
                    exit;
                }


                $model = new SchoolModel();
                $data = array('name' => $name, 'school_id' => $school_id);
                if ($model->add_period($data)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
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
    public function GetSchoolsParent()
    {

        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {

                $schools_id = $this->request->getVar('schools_id');

                if (!$schools_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }


                $model = new SchoolModel();
                $result = $model->get_school_parent($schools_id);

                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result, 'total_count' => count($result));
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function UpdateAbsenceAndLagStatus()
    {


        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $id = $this->request->getVar('id');
                $is_read = $this->request->getVar('is_read');
                if (!$id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  التعرفة');
                    return $this->respond($result, 400);
                    exit;
                }
                if (strlen($is_read) == 0) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الحالة');
                    return $this->respond($result, 400);
                    exit;
                }

                $data = array('is_read' => $is_read);

                $model = new SchoolModel();
                $update = $model->edit_absence_and_lag($data, $id);
                if ($update == 1) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
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


    public function sendSMSToStudents($students = [])
    {
        (new Gates_Api())->sendSMS('http://www.smsscript.net/index.php/api/sendsms/', 'nobalaa', '123456', '966500000000', 'lasttest', 'sendername');
    }

    public function _____________getNotificationBalance()
    {
        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {


                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }

                $model = new SchoolModel();
                // $model->get_school_by_id($school_id);

                $schoolGate = $model->getSchoolGateInfo($school_id);

                if ($schoolGate) {
                    # code...
                }

                (new Gates_Api())->getUserNotificationBalance($school_id, $schoolGate['id']);
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }

    public function setSchoolGate()
    {
        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $gate_id = $this->request->getVar('gate_id');
                $school_id = $this->request->getVar('school_id');
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');
                $sender_name = $this->request->getVar('sender_name');
                $isActive = $this->request->getVar('isActive');


                if (!$gate_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء تحديد البوابة');
                    return $this->respond($result, 400);
                    exit;
                }

                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء تحديد المدرسة');
                    return $this->respond($result, 400);
                    exit;
                }

                if (!$username) {
                    $result = array('code' => -1, 'msg' => 'الرجاء تحديد اسم المستخدم');
                    return $this->respond($result, 400);
                    exit;
                }

                if (!$password) {
                    $result = array('code' => -1, 'msg' => 'الرجاء تحديد كلمة المرور');
                    return $this->respond($result, 400);
                    exit;
                }

                if (!$sender_name) {
                    $result = array('code' => -1, 'msg' => 'الرجاء تحديد اسم المرسل');
                    return $this->respond($result, 400);
                    exit;
                }

                if (strlen($sender_name) > 11) {
                    $result = array('code' => -1, 'msg' => 'يجب ان يكون اسم المرسل اقل من 12 محرف');
                    return $this->respond($result, 400);
                    exit;
                }


                // if (empty((new GatesModel())->get_gate_by_id($gate_id))) {
                //     $result = array('code' => -1, 'msg' => 'البوابة المحددة غير متوفرة!');
                //     return $this->respond($result, 400);
                //     exit;
                // }

                $model = new SchoolModel();


                if (empty($model->get_school_by_id($school_id))) {
                    $result = array('code' => -1, 'msg' => 'المدرسة المحددة غير متوفرة!');
                    return $this->respond($result, 400);
                    exit;
                }

                $res = $model->updateOrCreateSchoolGate([
                    'school_id' => $school_id,
                    'gate_id' => $gate_id,
                    'password' => $password,
                    'username' => $username,
                    'sender_name' => $sender_name,
                    'isActive' => $isActive == "1" ? 1 : 0,
                ]);

                if ($res) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 400);
        }
    }


    public function getSchoolGates()
    {
        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_id = $this->request->getVar('school_id');


                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء تحديد المدرسة');
                    return $this->respond($result, 400);
                    exit;
                }


                $model = new SchoolModel();


                if (empty($model->get_school_by_id($school_id))) {
                    $result = array('code' => -1, 'msg' => 'المدرسة المحددة غير متوفرة!');
                    return $this->respond($result, 400);
                    exit;
                }


                $res = $model->getSchoolGatesById($school_id);

                if (!empty($res)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $res);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 400);
        }
    }


    public function getSchoolActiveGateById($school_id)
    {
        $model = new SchoolModel();
        $res = $model->getSchoolActiveGatesById($school_id);
        return $res;
    }

    public function deleteSchoolGate()
    {
        if ($this->request->getMethod() == 'delete') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $input = $this->request->getRawInput();;
                $id = isset($input['id']) ? $input['id'] : '';
                if (!$id) {
                    $data = array('code' => -1, 'msg' => 'Please insert id flied', 'data' => []);
                    return    $this->respond($data, 400);
                    exit;
                }
                $model = new SchoolModel();

                $delete = $model->deleteSchoolGate($id);
                if ($delete == 1) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be Delete', 'data' => []);
            return    $this->respond($data, 200);
        }
    }

    public function SendAbsenceAndLagNotifications()
    {
        if ($this->request->getMethod() == 'post') {

            $absenceAndLagData = $this->request->getVar('data');

            $school_id = $this->request->getVar('school_id');


            if (!$school_id) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة  ');
                return $this->respond($result, 400);
                exit;
            }

            if (!$absenceAndLagData) {
                $result = array('code' => -1, 'msg' => 'الرجاء تحديد بيانات الرصد  ');
                return $this->respond($result, 400);
                exit;
            }

            $model = new SchoolModel();
            $student_model = new StudentsModel();
            $savedRecords = 0;
            $schoolGate = $this->getSchoolActiveGateById($school_id)[0];

            foreach ($absenceAndLagData as $studentAbsenceAndLagData) {

                $isToSend = $studentAbsenceAndLagData['isToSend'];
                $student_id = $studentAbsenceAndLagData['studentId'];
                $class_id = $studentAbsenceAndLagData['class_id'];
                $semster_id = $studentAbsenceAndLagData['semaster_id'];
                $monitoring_case = $studentAbsenceAndLagData['attendance_status'];
                $period = $studentAbsenceAndLagData['period'];
                $day = $studentAbsenceAndLagData['day'];
                $date = $studentAbsenceAndLagData['date'];
                $school_id = $studentAbsenceAndLagData['school'];
                $phone = $studentAbsenceAndLagData['phone'];
                $message = $studentAbsenceAndLagData['message'];

                $data = [
                    'student_id' => $student_id,
                    'class_id' => $class_id,
                    'semster_id' => $semster_id,
                    'monitoring_case' => $monitoring_case,
                    'period' => $period,
                    'day' => $day,
                    'date' => $date,
                    'school_id' => $school_id,
                    'message' => $message,
                    'send_status' => $isToSend == "1" ? null : -1,
                ];

                $temp = $model->add_asbense($data);


                if ($temp) {
                    $savedRecords++;
                }

                if ($isToSend == "1") {
                    $model->add_toSent([
                        "user_id" => $student_id,
                        "message" =>  $message,
                        "phone" =>  $phone,
                        "school_id" => $school_id,
                        "message_archive_id" => $temp->connID->insert_id,
                        "school_gate_id" => $schoolGate->id,
                        "type" => 'absenceAndLag',
                    ]);
                }
            }


            $data = ['code' => 1, 'msg' => 'تم حفظ حالة الغياب ل' . $savedRecords . ' طالب' . '   سيتم ارسال الاشعارات بأقرب وقت ممكن.', 'data' => []];
            return    $this->respond($data, 200);
        } else {
            $result = array(
                'code' => -1, 'msg' => 'Method must be POST',
            );
            return $this->respond($result, 400);
        }
    }

    // http://localhost/codeigniter/CodeSchoolSystem/public/Schools/checkAndSendSMSToStudents/100
    public function checkAndSendSMSToStudents($num)
    {

        $model = new SchoolModel();
        $unsentMessages = $model->get_unsent_messages(intval($num));
        $sentMessages = [];
        $faildSentAbsenceMessagesArchive = [];
        $successSentAbsenceMessagesArchive = [];

        $faildSentPublicMessagesArchive = [];
        $successSentPublicMessagesArchive = [];

        foreach ($unsentMessages as $key => $value) {

            $res = (new Gates_Api)->sendSMS($value->gates_arabic_link, $value->username, $value->password, $value->phone, $value->message, $value->sender_name, $value->gates_method);

            if ($res == "ok" || $res == 100) {
                $sentMessages[] = $value->unsent_message_id;

                if ($value->type == "absenceAndLag") {
                    $successSentAbsenceMessagesArchive[] = $value->message_archive_id;
                } else if ($value->type == "publicMessage") {
                    $successSentPublicMessagesArchive[] = $value->message_archive_id;
                }
            } else {
                $sentMessages[] = $value->unsent_message_id;

                if ($value->type == "absenceAndLag") {
                    $faildSentAbsenceMessagesArchive[] = $value->message_archive_id;
                } else if ($value->type == "publicMessage") {
                    $faildSentPublicMessagesArchive[] = $value->message_archive_id;
                }
            }

            if (count($sentMessages) > 10) {
                $model->deleteFromUnsentMessage($sentMessages);
                $model->updateAbsenceArchiveMessagesStatus($successSentAbsenceMessagesArchive, 1);
                $model->updateAbsenceArchiveMessagesStatus($faildSentAbsenceMessagesArchive, 0);

                $model->updatePublicMessagesArchiveMessagesStatus($faildSentPublicMessagesArchive, 0);
                $model->updatePublicMessagesArchiveMessagesStatus($successSentPublicMessagesArchive, 1);

                $sentMessages = [];
                $faildSentAbsenceMessagesArchive = [];
                $successSentAbsenceMessagesArchive = [];
                $faildSentPublicMessagesArchive = [];
                $successSentPublicMessagesArchive = [];
            }
        }

        $model->deleteFromUnsentMessage($sentMessages);
        $model->updateAbsenceArchiveMessagesStatus($successSentAbsenceMessagesArchive, 1);
        $model->updateAbsenceArchiveMessagesStatus($faildSentAbsenceMessagesArchive, 0);
        $model->updatePublicMessagesArchiveMessagesStatus($faildSentPublicMessagesArchive, 0);
        $model->updatePublicMessagesArchiveMessagesStatus($successSentPublicMessagesArchive, 1);
    }
}
