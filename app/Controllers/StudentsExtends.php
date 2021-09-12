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

    public function AddStudentsFromFile()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {

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
                $school = new SchoolModel();
                $user = new UserModel();

                if ($excelData !== []) {

                    $addedSuccessNum = 0;
                    $failedToAddNum = 0;

                    $model = new StudentsModel();

                    $classesCodes = [];
                    $classesData = [];

                    foreach ($excelData as  $value) {
                        $classesCodes[] = $value['class'];
                    }

                    $tempClassesData =  $school->get_classes_by_codes($classesCodes);

                    foreach ($tempClassesData as  $value) {
                        $classesData[$value->code] = $value->id;
                    }

                    $semestersNames = [];
                    $semestersData = [];

                    foreach ($excelData as  $value) {
                        $semestersNames[] = $value['semestar'];
                    }

                    $tempSemestersData =  $school->get_semesters_by_names($semestersNames);

                    foreach ($tempSemestersData as  $value) {
                        $semestersData[$value->name] = $value->id;
                    }



                    foreach ($excelData as  $value) {
                        try {

                            if ($value['full_name'] == '' || $value['student_number'] == '') {
                                throw new Exception();
                            }

                            $phone = str_replace("$", "", $value['phone']);

                            $model->add_student([
                                'school_id' => $school_id,
                                'student_number' => str_replace("$", "", $value['student_number']),
                                'full_name' => $value['full_name'],
                                'phone' => $phone,
                                'class_id' => !empty($classesData[$value['class']]) ? $classesData[$value['class']] : null,
                                'semestar_id' => !empty($semestersData[$value['semestar']]) ? $semestersData[$value['semestar']] : null,
                            ]);

                            $parent = null;
                            if ($parent == null) {
                                
                                $check_phone = $user->get_parent_by_phone($phone);
                                if (!empty($check_phone)) {
                                    $parent = $check_phone->id;
                                }
                            }

                            if (!empty($parent)) {

                                $data2 = array('school_id' => $school_id, 'parent_id' => $parent);
                                if ($school->add_parent_to_school($data2)) {
                                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                                }
                            }

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
            return  $this->respond($data, 200);
        }
    }

    public function DeleteStudents()
    {

        if ($this->request->getMethod() == 'delete') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $input = $this->request->getRawInput();;
                $ids = isset($input['ids']) ? $input['ids'] : '';
                if (!$ids) {
                    $data = array('code' => -1, 'msg' => 'Please insert ids flied', 'data' => []);
                    return  $this->respond($data, 400);
                    exit;
                }
                $model = new StudentsModel();

                $delete = $model->delete_students($ids);
                if ($delete >= 1) {
                    $data = array('code' => 1, 'msg' => 'تم حذف ' . $delete . ' من السجلات بنجاح.', 'data' => []);
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
            $data = array('code' => -1, 'msg' => 'Method must be Delete', 'data' => []);
            return  $this->respond($data, 200);
        }
    }
}
