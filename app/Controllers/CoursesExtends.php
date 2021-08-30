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
                        $value['phone'] = str_replace('$', '', $value['student_number']);
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
