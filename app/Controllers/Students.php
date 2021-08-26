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

class Students extends BaseController
{
  use ResponseTrait;
  public function GetStudents()
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
        $model = new StudentsModel();
        $result = $model->get_students($school_id, $limit, $page, $key);
        $count = $model->get_students_count($school_id);
        if (!empty($result)) {
          $data = array('code' => 1, 'msg' => 'success', 'data' => $result, 'total_count' => $count->count);
          return  $this->respond($data, 200);
        } else {
          $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
          return  $this->respond($data, 200);
        }
      } else {
        $result = array(
          'code' => $result['code'], 'msg' => $result['messages'],
        );
        return $this->respond($result, 400);
      }
    } else {
      $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
      return  $this->respond($data, 200);
    }
  }
  public function AddStudent()
  {

    if ($this->request->getMethod() == 'post') {
      $check = new Check(); // Create an instance
      $result = $check->check();

      if ($result['code'] == 1) {
        $full_name = $this->request->getVar('full_name');
        $student_number = $this->request->getVar('student_number');
        $phone = $this->request->getVar('phone');
        $class = $this->request->getVar('class');
        $semestar = $this->request->getVar('semestar');
        $school_id = $this->request->getVar('school_id');
        $parent_email = $this->request->getVar('parent_email');
        if (!$school_id) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
          return $this->respond($result, 400);
          exit;
        }
        if (!$full_name) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل اسم الطالب ');
          return $this->respond($result, 400);
          exit;
        }
        if (!$student_number) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  رقم الطالب ');
          return $this->respond($result, 400);
          exit;
        }
        if (!$class) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الصف  ');
          return $this->respond($result, 400);
          exit;
        }
        if (!$semestar) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الفصل  ');
          return $this->respond($result, 400);
          exit;
        }
        if ($parent_email) {
          $user = new UserModel();
          $check_email = $user->get_user_parent($parent_email);
          if (empty($check_email)) {
            $result = array('code' => -1, 'msg' => 'ايميل ولي الأمر غير موجود الرجاء تسجيل الحساب');
            return $this->respond($result, 400);
            exit;
          } else {
            $parent_email = $check_email->id;
          }
        }
        $model = new StudentsModel();
        $data = array('school_id' => $school_id, 'full_name' => $full_name, 'student_number' => $student_number, 'phone' => $phone, 'class_id' => $class, 'semestar_id' => $semestar, 'parent_id' => $parent_email);
        $save = $model->add_student($data);
        if ($save > 0) {
          if (!empty($parent_email)) {
            $data2 = array('school_id' => $school_id, 'parent_id' => $parent_email);
            $school = new SchoolModel();
            if ($school->add_parent_to_school($data2)) {
              $data = array('code' => 1, 'msg' => 'success', 'data' => []);
              return  $this->respond($data, 200);
            }
          }
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
  public function EditStudent()
  {


    if ($this->request->getMethod() == 'post') {
      $check = new Check(); // Create an instance
      $result = $check->check();

      if ($result['code'] == 1) {
        $full_name = $this->request->getVar('full_name');
        $student_number = $this->request->getVar('student_number');
        $phone = $this->request->getVar('phone');
        $class = $this->request->getVar('class');
        $semestar = $this->request->getVar('semestar');
        $school_id = $this->request->getVar('school_id');
        $parent_email = $this->request->getVar('parent_email');
        $id = $this->request->getVar('id');
        if (!$id) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل التعرفة ');
          return $this->respond($result, 400);
          exit;
        }
        if (!$full_name) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل اسم الطالب ');
          return $this->respond($result, 400);
          exit;
        }
        if (!$student_number) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  رقم الطالب ');
          return $this->respond($result, 400);
          exit;
        }
        if (!$class) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الصف  ');
          return $this->respond($result, 400);
          exit;
        }
        if (!$semestar) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الفصل  ');
          return $this->respond($result, 400);
          exit;
        }
        if ($parent_email) {
          $user = new UserModel();
          $check_email = $user->get_user_parent($parent_email);
          if (empty($check_email)) {
            $result = array('code' => -1, 'msg' => 'ايميل ولي الأمر غير موجود الرجاء تسجيل الحساب');
            return $this->respond($result, 400);
            exit;
          } else {
            $parent_email = $check_email->id;
          }
        }
        $data = array('school_id' => $school_id, 'full_name' => $full_name, 'student_number' => $student_number, 'phone' => $phone, 'class_id' => $class, 'semestar_id' => $semestar, 'parent_id' => $parent_email);

        $model = new StudentsModel();
        $update = $model->edit_student($data, $id);

        if ($update == 1) {
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
  public function GetStudentByID()
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
        $model = new StudentsModel();
        $result = $model->get_student_by_id($id);
        if (!empty($result)) {
          $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
          return  $this->respond($data, 200);
        } else {
          $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
          return  $this->respond($data, 200);
        }
      } else {
        $result = array(
          'code' => $result['code'], 'msg' => $result['messages'],
        );
        return $this->respond($result, 400);
      }
    } else {
      $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
      return  $this->respond($data, 200);
    }
  }
  public function DeleteStudent()
  {

    if ($this->request->getMethod() == 'delete') {
      $check = new Check(); // Create an instance
      $result = $check->check();

      if ($result['code'] == 1) {
        $input = $this->request->getRawInput();;
        $id = isset($input['id']) ? $input['id'] : '';
        if (!$id) {
          $data = array('code' => -1, 'msg' => 'Please insert id flied', 'data' => []);
          return  $this->respond($data, 400);
          exit;
        }
        $model = new StudentsModel();

        $delete = $model->delete_students([$id]);
        if ($delete == 1) {
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
      $data = array('code' => -1, 'msg' => 'Method must be Delete', 'data' => []);
      return  $this->respond($data, 200);
    }
  }
  public function AddParebtToStudent()
  {

    if ($this->request->getMethod() == 'post') {
      $check = new Check(); // Create an instance
      $result = $check->check();

      if ($result['code'] == 1) {
        $id = $this->request->getVar('student_id');

        $parent_email = $this->request->getVar('parent_email');
        if (!$id) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل رقم التعرفة ');
          return $this->respond($result, 400);
          exit;
        }
        if (!$parent_email) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدحال حقل ولي الأمر');
          return $this->respond($result, 400);
          exit;
        }

        if ($parent_email) {
          $user = new UserModel();
          $check_email = $user->get_user_parent($parent_email);
          if (empty($check_email)) {
            $result = array('code' => -1, 'msg' => 'ايميل ولي الأمر غير موجود الرجاء تسجيل الحساب');
            return $this->respond($result, 400);
            exit;
          } else {
            $parent_email = $check_email->id;
          }
        }
        $model = new StudentsModel();
        $data = array('parent_id' => $parent_email);
        $save =   $update = $model->edit_student($data, $id);
        if ($save == 1) {

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
