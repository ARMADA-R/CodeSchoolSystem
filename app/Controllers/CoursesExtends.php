<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

use CodeIgniter\API\ResponseTrait;
use App\Models\CoursesModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;
use App\Models\SchoolModel;

class CoursesExtends extends Courses
{
    use ResponseTrait;

    public function AddCoursesFromFile()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {

                $user_id = $this->request->getVar('user_id');
                $school_id = $this->request->getVar('school_id');
                $excelData = $this->request->getVar('excelData');


                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }


                if (!$excelData) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل بيانات Excel ');
                    return $this->respond($result, 400);
                    exit;
                }

                $excelData = json_decode($excelData, true);

                if ($excelData !== []) {

                    $addedSuccessNum = 0;
                    $failedToAddNum = 0;

                    $model = new CoursesModel();

                    foreach ($excelData as  $value) {
                        $value['student_number'] = str_replace('$', '', $value['student_number']);
                        $value['phone'] = str_replace('$', '', $value['phone']);
                        try {
                            if ($value['student_name'] == '' || $value['student_number'] == '') {
                                throw new Exception();
                            }

                            $model->add_course([
                                'user_id' => $user_id,
                                'school_id' => $school_id,
                                'student_number' => str_replace("$", "", $value['student_number']),
                                'student_name' => $value['student_name'],
                                'phone' => $value['phone']
                            ]);

                            $addedSuccessNum++;
                        } catch (\Throwable $th) {
                            $failedToAddNum++;
                        }
                    }

                    return    $this->respond(['code' => 1, 'msg' => 'تم إضافة ' . $addedSuccessNum . ' عنصر وفشل ' . $failedToAddNum, 'data' => []], 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'لا يوجد بيانات لإضافتها!', 'data' => []);
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

    public function getCoursesStudent()
    {

        if ($this->request->getMethod() == 'get') {

            $student_number = $this->request->getVar('student_num');
            $school_number = $this->request->getVar('school_num');

            if (!$school_number) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال الرقم الوزاري للمدرسة ');
                return $this->respond($result, 400);
                exit;
            }

            if (!$student_number) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال رقم الطالب ');
                return $this->respond($result, 400);
                exit;
            }


            $model = new CoursesModel();
            $schoolModel = new SchoolModel();

            $school = $schoolModel->get_school_by_number($school_number);
            if (empty($school)) {
                $data = array('code' => -1, 'msg' => 'الرقم الوزاري للمدرسة غير مطابق', 'data' => []);
                return  $this->respond($data, 400);
            }

            $result = $model->get_school_student_by_number($student_number, $school->id);
            if (!empty($result)) {

                $courseData = $model->get_course_by_id($result->id);
                if (!empty($courseData)) {
                    if (!empty($courseData->level) && !empty($courseData->division)) {
                        $data = array('code' => -1, 'msg' => 'معلومات الطالب محدثة!', 'data' => []);
                        return  $this->respond($data, 400);
                    }
                }

                $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                return  $this->respond($data, 200);
            } else {
                $data = array('code' => -1, 'msg' => 'لا يوجد تطابق!', 'data' => []);
                return  $this->respond($data, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return  $this->respond($data, 200);
        }
    }


    public function updateCoursesStudent()
    {

        if ($this->request->getMethod() == 'get') {

            $student_id = $this->request->getVar('student_id');
            $school_id = $this->request->getVar('school_id');
            $student_number = $this->request->getVar('student_number');
            $level = $this->request->getVar('level');
            $division = $this->request->getVar('division');

            if (!$school_id) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال معرف المدرسة ');
                return $this->respond($result, 400);
                exit;
            }

            if (!$student_id) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال معرف الطالب ');
                return $this->respond($result, 400);
                exit;
            }

            if (!$student_number) {
                $result = array('code' => -1, 'msg' => 'الرجاء إدخال رقم الطالب ');
                return $this->respond($result, 400);
                exit;
            }

            if (!$level) {
                $result = array('code' => -1, 'msg' => 'الرجاء تحديد المستوى ');
                return $this->respond($result, 400);
                exit;
            }

            if (!$division) {
                $result = array('code' => -1, 'msg' => 'الرجاء تحديد الشعبة ');
                return $this->respond($result, 400);
                exit;
            }


            $model = new CoursesModel();
            $schoolModel = new SchoolModel();

            $school = $schoolModel->get_school_by_id($school_id);
            if (empty($school)) {
                $data = array('code' => -1, 'msg' => 'المدرسة المحددة غير متوفرة!', 'data' => []);
                return  $this->respond($data, 400);
            }

            $courseData = $model->get_course_by_id($student_id);

            if (!empty($courseData)) {
                if (!empty($courseData->level) && !empty($courseData->division)) {
                    $data = array('code' => -1, 'msg' => 'معلومات الطالب محدثة!', 'data' => []);
                    return  $this->respond($data, 400);
                }
            }

            $result = $model->edit_course([
                "level" => $level,
                "division" => $division,
            ], $student_id);

            if (!empty($result)) {
                $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                return  $this->respond($data, 200);
            } else {
                $data = array('code' => -1, 'msg' => 'حدث خطأ ما يرجى اعادة المحاولة!', 'data' => []);
                return  $this->respond($data, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return  $this->respond($data, 200);
        }
    }
}
