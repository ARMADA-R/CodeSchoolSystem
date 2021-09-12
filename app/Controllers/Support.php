<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

use CodeIgniter\API\ResponseTrait;
use App\Models\SupportModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;

class Support extends BaseController
{
    use ResponseTrait;
    public function getSupport()
    {

        if ($this->request->getMethod() == 'get') {

            $model = new SupportModel();
            $result = $model->get_support();
            if (!empty($result)) {
                $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                return    $this->respond($data, 200);
            } else {
                $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                return    $this->respond($data, 200);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }

    public function editSupport()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $title = $this->request->getVar('title');
                $description = $this->request->getVar('description');
                $link = $this->request->getVar('link');
                $id = $this->request->getVar('id');

                if (!$title) {
                    $data = array('code' => -1, 'msg' => 'يجب تعيين العنوان', 'data' => []);
                    return $this->respond($data, 400);
                }

                if (!$id) {
                    $data = array('code' => -1, 'msg' => 'يجب تعيين المعرف', 'data' => []);
                    return $this->respond($data, 400);
                }

                $data = [
                    "title" => $title,
                    "description" => $description,
                    "link" => $link,
                ];

                $model = new SupportModel();
                $update = $model->edit_support($data, $id);
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

    public function addSupport()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {

                $title = $this->request->getVar('title');
                $description = $this->request->getVar('description');
                $link = $this->request->getVar('link');

                if (!$title) {
                    $data = array('code' => -1, 'msg' => 'يجب تعيين العنةان', 'data' => []);
                    return $this->respond($data, 400);
                }

                $data = [
                    "title" => $title,
                    "description" => $description,
                    "link" => $link,
                ];

                $model = new SupportModel();
                $res = $model->add_support($data);
                if ($res > 0) {
                    $data = array('code' => 1, 'msg' => 'تم اضافة قسم دعم', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'فشل الاضافة', 'data' => []);
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

    public function deleteSupport()
    {

        if ($this->request->getMethod() == 'delete') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $input = $this->request->getRawInput();;
                $id = isset($input['id']) ? $input['id'] : '';
                if (!$id) {
                    $data = array('code' => -1, 'msg' => 'يجب تحديد المعرف', 'data' => []);
                    return  $this->respond($data, 400);
                    exit;
                }
                $model = new SupportModel();

                $delete = $model->delete_support([$id]);
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
