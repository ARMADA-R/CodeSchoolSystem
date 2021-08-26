<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

use CodeIgniter\API\ResponseTrait;
use App\Models\EmployeeModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;

class Employee extends BaseController
{
	use ResponseTrait;
	public function GetEmployee()
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
				$model = new EmployeeModel();
				$result = $model->get_employee($school_id, $limit, $page, $key);
				if (!empty($result)) {
					$data = array('code' => 1, 'msg' => 'success', 'data' => $result, 'total_count' => count($result));
					return	$this->respond($data, 200);
				} else {
					$data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
					return	$this->respond($data, 200);
				}
			} else {
				$result = array(
					'code' => $result['code'], 'msg' => $result['messages'],
				);
				return $this->respond($result, 400);
			}
		} else {
			$data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
			return	$this->respond($data, 200);
		}
	}
	public function AddEmployee()
	{

		if ($this->request->getMethod() == 'post') {
			$check = new Check(); // Create an instance
			$result = $check->check();

			if ($result['code'] == 1) {
				$name = $this->request->getVar('name');
				$phone = $this->request->getVar('phone');

				$school_id = $this->request->getVar('school_id');
				if (!$school_id) {
					$result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
					return $this->respond($result, 400);
					exit;
				}
				if (!$name) {
					$result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل اسم الموظف ');
					return $this->respond($result, 400);
					exit;
				}

				if (!$phone) {
					$result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الهاتف  ');
					return $this->respond($result, 400);
					exit;
				}


				$model = new EmployeeModel();
				$data = array('school_id' => $school_id, 'name' => $name, 'phone' => $phone);
				if ($model->add_employee($data)) {
					$data = array('code' => 1, 'msg' => 'success', 'data' => []);
					return	$this->respond($data, 200);
				} else {
					$data = array('code' => -1, 'msg' => 'fail', 'data' => []);
					return	$this->respond($data, 400);
				}
			} else {
				$result = array(
					'code' => $result['code'], 'msg' => $result['messages'],
				);
				return $this->respond($result, 400);
			}
		} else {
			$data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
			return	$this->respond($data, 200);
		}
	}
	public function EditEmployee()
	{


		if ($this->request->getMethod() == 'post') {
			$check = new Check(); // Create an instance
			$result = $check->check();

			if ($result['code'] == 1) {
				$name = $this->request->getVar('name');
				$phone = $this->request->getVar('phone');

				$school_id = $this->request->getVar('school_id');
				$id = $this->request->getVar('id');


				if (!$id) {
					$result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل التعرفة ');
					return $this->respond($result, 400);
					exit;
				}
				if (!$name) {
					$result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل اسم الموظف ');
					return $this->respond($result, 400);
					exit;
				}

				if (!$phone) {
					$result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الهاتف  ');
					return $this->respond($result, 400);
					exit;
				}



				$data = array('name' => $name, 'phone' => $phone);

				$model = new EmployeeModel();
				$update = $model->edit_employee($data, $id);

				if ($update == 1) {
					$data = array('code' => 1, 'msg' => 'success', 'data' => []);
					return	$this->respond($data, 200);
				} else {
					$data = array('code' => -1, 'msg' => 'fail', 'data' => []);
					return	$this->respond($data, 400);
				}
			} else {
				$result = array(
					'code' => $result['code'], 'msg' => $result['messages'],
				);
				return $this->respond($result, 400);
			}
		} else {
			$data = array('code' => -1, 'msg' => 'Method must be PoST', 'data' => []);
			return	$this->respond($data, 200);
		}
	}
	public function GetEmployeeByID()
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
				$model = new EmployeeModel();
				$result = $model->get_employee_by_id($id);
				if (!empty($result)) {
					$data = array('code' => 1, 'msg' => 'success', 'data' => $result);
					return	$this->respond($data, 200);
				} else {
					$data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
					return	$this->respond($data, 200);
				}
			} else {
				$result = array(
					'code' => $result['code'], 'msg' => $result['messages'],
				);
				return $this->respond($result, 400);
			}
		} else {
			$data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
			return	$this->respond($data, 200);
		}
	}
	public function DeleteEmployee()
	{

		if ($this->request->getMethod() == 'delete') {
			$check = new Check(); // Create an instance
			$result = $check->check();

			if ($result['code'] == 1) {
				$input = $this->request->getRawInput();;
				$id = isset($input['id']) ? $input['id'] : '';
				if (!$id) {
					$data = array('code' => -1, 'msg' => 'Please insert id flied', 'data' => []);
					return	$this->respond($data, 400);
					exit;
				}
				$model = new EmployeeModel();

				$delete = $model->delete_employee([$id]);
				if ($delete >= 1) {
					$data = array('code' => 1, 'msg' => 'success', 'data' => []);
					return	$this->respond($data, 200);
				} else {
					$data = array('code' => -1, 'msg' => 'fail', 'data' => []);
					return	$this->respond($data, 400);
				}
			} else {
				$result = array(
					'code' => $result['code'], 'msg' => $result['messages'],
				);
				return $this->respond($result, 400);
			}
		} else {
			$data = array('code' => -1, 'msg' => 'Method must be Delete', 'data' => []);
			return	$this->respond($data, 200);
		}
	}
	public function GetTinyUrl()
	{
		if ($this->request->getMethod() == 'get') {
			$check = new Check(); // Create an instance
			$result = $check->check();

			if ($result['code'] == 1) {
				$url = $this->request->getVar('url');
				$ch = curl_init();
				$timeout = 10;
				curl_setopt($ch, CURLOPT_URL, 'http://tinyurl.com/api-create.php?url=' . $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
				$data = curl_exec($ch);


				$data = array('code' => 1, 'msg' => 'success', 'data' => array('url' => $data));
				return	$this->respond($data, 200);
			} else {
				$result = array(
					'code' => $result['code'], 'msg' => $result['messages'],
				);
				return $this->respond($result, 400);
			}
		} else {
			$data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
			return	$this->respond($data, 200);
		}
	}
}
