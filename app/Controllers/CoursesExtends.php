<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

use CodeIgniter\API\ResponseTrait;
use App\Models\CoursesModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;

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

                $file = isset($_FILES["excel"]['tmp_name']) ? $_FILES["excel"]['tmp_name'] : '';

                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }

                $data = ExcelReader::parseToArray($file, 2, 0);
                if ($data !== []) {

                    $addedSuccessNum = 0;
                    $failedToAddNum = 0;

                    $model = new CoursesModel();

                    foreach ($data as  $value) {
                        
                        try {
                            $model->add_course([
                                'user_id' => $user_id,
                                'school_id' => $school_id,
                                'student_number' => $value['IdentificationID'],
                                'student_name' => $value['FullName'],
                                'phone' => $value['MobileNumber']
                            ]);

                            $addedSuccessNum++;
                        } catch (\Throwable $th) {
                            $failedToAddNum++;
                        }
                    }
                
                    return    $this->respond(['code' => 1, 'msg' => 'تم إضافة '.$addedSuccessNum.' عنصر وفشل '.$failedToAddNum, 'data' => []], 200);

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
}
