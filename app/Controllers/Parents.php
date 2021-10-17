<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use App\Models\MessaingModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;
use App\Models\ParentsModel;

class Parents extends BaseController
{
  use ResponseTrait;
  public function GetParents()
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

        $userModel = new UserModel();
        $result = $userModel->get_users_by_role(3);


        if (!empty($result)) {
          
          $data = array('code' => 1, 'msg' => 'success', 'data' => $result, 'total_count' => count($result));
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



  public function EditParent()
  {
    if ($this->request->getMethod() == 'post') {
      $check = new Check(); // Create an instance
      $result = $check->check();

      if ($result['code'] == 1) {
        $id = $this->request->getVar('id');
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $city = $this->request->getVar('city');
        $phone = $this->request->getVar('phone');
        $area = $this->request->getVar('area');
        $user_id = $this->request->getVar('user_id');

        if (!$id) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل التعرفة ');
          return $this->respond($result, 400);
          exit;
        }

        if (!$username) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال اسم المستخدم');
          return $this->respond($result, 400);
          exit;
        }
        if (!$email) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال البريد الالكتروني');
          return $this->respond($result, 400);
          exit;
        }
        if (!$city) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدينة');
          return $this->respond($result, 400);
          exit;
        }
        if (!$phone) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الجوال');
          return $this->respond($result, 400);
          exit;
        }
        if (!$area) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المنطقة');
          return $this->respond($result, 400);
          exit;
        }

        $data = [
          'username' => $username,
          'email' => $email,
          'city' => $city,
          'phone' => $phone,
          'area' => $area,
        ];

        $model = new ParentsModel();
        $update = $model->edit_parent($data, $id);

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


  public function DeleteParent()
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
        $model = new ParentsModel();

        $delete = $model->delete_parents([$id]);
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
}
