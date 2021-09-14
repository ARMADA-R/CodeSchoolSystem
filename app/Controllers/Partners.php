<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

use CodeIgniter\API\ResponseTrait;
use App\Models\PartnersModel;
use App\Models\UserModel;
use App\Models\MessaingModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;

class Partners extends BaseController
{
  use ResponseTrait;
  public function GetPartners()
  {
    if ($this->request->getMethod() == 'get') {
      $check = new Check(); // Create an instance
      $result = $check->check();

      if ($result['code'] == 1) {
        $page = $this->request->getVar('page');
        $limit = $this->request->getVar('limit');
        $user_id = $this->request->getVar('user_id');

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
        if (!$user_id) {
          $result = array('code' => -1, 'msg' => 'الرجاء تحديد المستخدم ');
          return $this->respond($result, 400);
          exit;
        }


        $model = new PartnersModel();
        $userModel = new UserModel();

        $user = $userModel->get_user_by_id($user_id);

        if (!$user) {
          $data = array('code' => -1, 'msg' => 'المستخدم غير متوفر', 'data' => []);
          return  $this->respond($data, 400);
        }

        $user_role = $user->role;

        $new_parnters = array();

        if ($user_role == 1) {
          $result = $model->get_partners_offers($limit, $page, $key, -1);
        } else {
          $result = $model->get_partners_offers($limit, $page, $key, 1, $user);
        }


        if (!empty($result)) {
          $i = 0;
          foreach ($result as $value) {

            $key = $this->searchForId($value->id, $new_parnters);

            if ($key != 1) {
              $new_parnters[$i]['id'] = $value->id;
              $new_parnters[$i]['username'] = $value->username;
              $new_parnters[$i]['service_name'] = $value->service_name;
              $new_parnters[$i]['image_url'] = $value->image_url;
              $new_parnters[$i]['service_price'] = $value->service_price;
              $new_parnters[$i]['price_after_discount'] = $value->service_after_discount;
              $new_parnters[$i]['discount'] = $value->discount;
              $new_parnters[$i]['cubon'] = $value->cubon;
              $new_parnters[$i]['end_date'] = $value->end_date;
              $new_parnters[$i]['city'] = $value->city;
              $new_parnters[$i]['status'] = $value->status;
              $new_parnters[$i]['area'] = $value->area;
            }

            $i++;
          }

          $data = array('code' => 1, 'msg' => 'success', 'data' => $new_parnters, 'total_count' => count($new_parnters));
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
  public function GetPartnersData()
  {
    if ($this->request->getMethod() == 'get') {
      $check = new Check(); // Create an instance
      $result = $check->check();

      if ($result['code'] == 1) {
        $page = $this->request->getVar('page');
        $limit = $this->request->getVar('limit');
        $user_id = $this->request->getVar('user_id');

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
        if (!$user_id) {
          $result = array('code' => -1, 'msg' => 'الرجاء تحديد المستخدم ');
          return $this->respond($result, 400);
          exit;
        }


        $model = new PartnersModel();
        $userModel = new UserModel();

        $user = $userModel->get_user_by_id($user_id);

        if (!$user) {
          $data = array('code' => -1, 'msg' => 'المستخدم غير متوفر', 'data' => []);
          return  $this->respond($data, 400);
        }

        $user_role = $user->role;

        $new_parnters = array();

        if ($user_role == 1) {
          $result = $model->get_partners($limit, $page, $key);
        } else {
          $result = $model->get_partners($limit, $page, $key, $user);
        }


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



  public function GetServicePartner()
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
        $partner_id = $this->request->getVar('partner_id');
        if (!$partner_id) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الشريك ');
          return $this->respond($result, 400);
          exit;
        }
        $model = new PartnersModel();
        $new_parnters = array();

        $result = $model->get_service($partner_id, $limit, $page, $key);

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

  public function UpdateServiceStatus()
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

        $model = new PartnersModel();
        $update = $model->edit_service($data, $id);
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
  function searchForId($id, $array)
  {
    foreach ($array as $key => $val) {
      if (isset($val['id'])) {
        if ($val['id'] === $id) {
          return true;
        }
      }
    }
    return null;
  }

  public function GetPartnerById()
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
        $partner_id = $this->request->getVar('partner_id');
        if (!$partner_id) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الشريك ');
          return $this->respond($result, 400);
          exit;
        }
        $partner_id = $this->request->getVar('partner_id');
        if (!$partner_id) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الشريك ');
          return $this->respond($result, 400);
          exit;
        }
        $model = new PartnersModel();
        $new_parnters = array();

        $partner = $model->get_partner($partner_ids);

        if (!empty($partner)) {
          $result = $model->get_service($partner_id, $limit, $page, $key);
          $data = array('profile' => $partner, 'services' => $result);
          $data = array('code' => 1, 'msg' => 'success', 'data' => $data, 'total_count' => count($result));
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
  public function AddPartnerService()
  {

    if ($this->request->getMethod() == 'post') {
      $check = new Check(); // Create an instance
      $result = $check->check();

      if ($result['code'] == 1) {
        $service_name = $this->request->getVar('service_name');
        $service_price = $this->request->getVar('service_price');
        $price_after_discount = $this->request->getVar('price_after_discount');
        $discount = $this->request->getVar('discount');
        $cubon = $this->request->getVar('cubon');
        $end_date = $this->request->getVar('end_date');
        $status = $this->request->getVar('status');
        $partner_id = $this->request->getVar('partner_id');

        if (!$partner_id) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل شريك النجاح ');
          return $this->respond($result, 400);
          exit;
        }
        if (!$service_name) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل اسم الخدمة');
          return $this->respond($result, 400);
          exit;
        }
        if (!$service_price) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل سعر الخدمة ');
          return $this->respond($result, 400);
          exit;
        }


        $model = new PartnersModel();
        if ($file = $this->request->getFile('file')) {
          if ($file->isValid() && !$file->hasMoved()) {
            // Get file name and extension
            $name = $file->getName();
            $ext = $file->getClientExtension();

            // Get random file name
            $newName = $file->getRandomName();

            // Store file in public/uploads/ folder
            $file->move('./public/uploads', $newName);

            // Store file in public/uploads/ folder
            // File path to display preview
            $filepath = base_url() . "/public/uploads/" . $newName;
          } else {
            $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
            return  $this->respond($data, 400);
          }
        }

        $data = array('service_name' => $service_name, 'service_price' => $service_price, 'service_after_discount' => $price_after_discount, 'discount' => $discount, 'cubon' => $cubon, 'end_date' => $end_date, 'status' => $status, 'user_id' => $partner_id);
        if (!empty($filepath)) {

          $data['image_url'] = $filepath;
        }

        if ($model->add_service($data)) {
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
  public function EditPartnerService()
  {

    if ($this->request->getMethod() == 'post') {
      $check = new Check(); // Create an instance
      $result = $check->check();

      if ($result['code'] == 1) {
        $service_name = $this->request->getVar('service_name');
        $service_price = $this->request->getVar('service_price');
        $price_after_discount = $this->request->getVar('price_after_discount');
        $discount = $this->request->getVar('discount');
        $cubon = $this->request->getVar('cubon');
        $end_date = $this->request->getVar('end_date');
        $status = $this->request->getVar('status');
        $id = $this->request->getVar('id');
        if (!$id) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل التعرفة  ');
          return $this->respond($result, 400);
          exit;
        }
        if (!$service_name) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل اسم الخدمة');
          return $this->respond($result, 400);
          exit;
        }
        if (!$service_price) {
          $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل سعر الخدمة ');
          return $this->respond($result, 400);
          exit;
        }


        $model = new PartnersModel();
        if ($file = $this->request->getFile('file')) {
          if ($file->isValid() && !$file->hasMoved()) {
            // Get file name and extension
            $name = $file->getName();
            $ext = $file->getClientExtension();

            // Get random file name
            $newName = $file->getRandomName();

            // Store file in public/uploads/ folder
            $file->move('./assets/files', $newName);

            // File path to display preview
            $filepath = $newName;
          } else {
            $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
            return  $this->respond($data, 400);
          }
        }

        $data = array('service_name' => $service_name, 'service_price' => $service_price, 'service_after_discount' => $price_after_discount, 'discount' => $discount, 'cubon' => $cubon, 'end_date' => $end_date, 'status' => $status);
        if (!empty($filepath)) {

          $data['image_url'] = $filepath;
        }

        if ($model->edit_service($data, $id)) {
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
  public function GetServiceByID()
  {

    if ($this->request->getMethod() == 'get') {
      $check = new Check(); // Create an instance
      $result = $check->check();

      if ($result['code'] == 1) {
        $id = $this->request->getVar('id');
        $model = new PartnersModel();
        $result = $model->get_service_by_id($id);
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
  public function DeleteService()
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
        $model = new PartnersModel();

        $delete = $model->delete_service($id);
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



  public function getPartnerOfferForUser()
  {

    if ($this->request->getMethod() == 'post') {
      $check = new Check(); // Create an instance
      $result = $check->check();

      if ($result['code'] == 1) {
        $user_id = $this->request->getVar('user_id');
        $offerId = $this->request->getVar('offerId');

        if (!$user_id) {
          $result = array('code' => -1, 'msg' => 'الرجاء تحديد المستخدم ');
          return $this->respond($result, 400);
          exit;
        }
        if (!$offerId) {
          $result = array('code' => -1, 'msg' => 'الرجاء تحديد العرض ');
          return $this->respond($result, 400);
          exit;
        }

        $model = new PartnersModel();
        $usersModel = new UserModel();
        $new_parnters = array();
        //parents_partner_service

        $offer = $model->get_service_by_id($offerId);
        $parent = $usersModel->get_user_by_id($user_id);

        if (!$parent) {
          $data = array('code' => -1, 'msg' => 'المستخدم غير متوفر', 'data' => []);
          return  $this->respond($data, 400);
        }

        if (!$offer) {
          $data = array('code' => -1, 'msg' => 'العرض غير متوفر', 'data' => []);
          return  $this->respond($data, 400);
        }

        $parent_partner_offer = $model->get_parent_partner_offer($user_id, $offerId);

        if ($parent_partner_offer) {
          $data = array('code' => -1, 'msg' => 'لا يمكن الحصول على العرض اكثر من مرة', 'data' => []);
          return  $this->respond($data, 400);
        }

        $mail = \Config\Services::email();
        $mail->setFrom(env("SYSTEM_EMAIL"), env("SYSTEM_NAME"));

        $mail->setTo($parent->email);
        $mail->setSubject('عروض الشركاء');

        $mail->setMessage(view('mail/partnerOffer', ['cobon' => $offer->cubon, "service_name" => $offer->service_name]));
        $mail->send();


        $data = [
          "parent_id" => $parent->id,
          "partner_service_id" => $offer->id,
        ];

        $parent_partner_offer = $model->add_parent_partner_offer($data);

        $data = array('code' => 1, 'msg' => 'تم ارسال بريد الكتروني بتفاصيل العرض', 'data' => []);
        return  $this->respond($data, 200);
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
}
