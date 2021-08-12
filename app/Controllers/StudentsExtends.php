<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

use CodeIgniter\API\ResponseTrait;
use App\Models\StudentsModel;
use App\Models\UserModel;
use App\Models\SchoolModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;

class StudentsExtends extends Students
{
    use ResponseTrait;
    
    public function AddStudent()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {

                $school_id = $this->request->getVar('school_id');

                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                

                
                
                
                $data = ExcelReader::parseToArray($file, 2, 1);

                if ($data !== []) {
                    
                    $addedSuccessNum = 0;
                    $failedToAddNum = 0;
                    
                    $model = new StudentsModel();

                    
                    foreach ($data as  $value) {
                        
                        try {
                            $model->add_student([
                                'school_id' => $school_id,
                                'student_number' => $value['IdentificationID'],
                                 'full_name' => $value['FullName'],
                                 'phone' => $value['MobileNumber'],
                                 'class_id' => $value['Class'],
                                 'semestar_id' => $value['Semester'],
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

                $save = $model->add_student($data);
                
                if ($save > 0) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return  $this->respond($data, 200);
                    
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return  $this->respond($data, 400);
                }



            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return  $this->respond($data, 200);
        }
    }
   
       
}
