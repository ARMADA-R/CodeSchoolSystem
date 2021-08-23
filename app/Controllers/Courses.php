<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

use CodeIgniter\API\ResponseTrait;
use App\Models\CoursesModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;

class Courses extends BaseController
{
	use ResponseTrait;
	public function GetCourses()
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
				$model = new CoursesModel();
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
				$result = $model->get_courses($school_id, $limit, $page, $key);
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
	public function AddCourse()
	{

		if ($this->request->getMethod() == 'post') {
			$check = new Check(); // Create an instance
			$result = $check->check();

			if ($result['code'] == 1) {
				$user_id = $this->request->getVar('user_id');
				$level = $this->request->getVar('level');
				$division = $this->request->getVar('division');
				$school_id = $this->request->getVar('school_id');
				$student_number = $this->request->getVar('student_number');
				$phone = $this->request->getVar('phone');
				$student_name = $this->request->getVar('student_name');
				if (!$school_id) {
					$result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
					return $this->respond($result, 400);
					exit;
				}
				if (!$level) {
					$result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المستوى ');
					return $this->respond($result, 400);
					exit;
				}

				// if(!$user_id){
				//     $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  الطالب  ');
				//   return $this->respond($result,400);
				//   exit;
				// }


				$model = new CoursesModel();
				$data = array('level' => $level, 'division' => $division, 'user_id' => $user_id, 'school_id' => $school_id, 'student_number' => $student_number, 'student_name' => $student_name, 'phone' => $phone);
				if ($model->add_course($data)) {
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
	public function EditCourse()
	{


		if ($this->request->getMethod() == 'post') {
			$check = new Check(); // Create an instance
			$result = $check->check();

			if ($result['code'] == 1) {
				$user_id = $this->request->getVar('user_id');
				$level = $this->request->getVar('level');
				$division = $this->request->getVar('division');
				$school_id = $this->request->getVar('school_id');
				$student_number = $this->request->getVar('student_number');
				$phone = $this->request->getVar('phone');
				$student_name = $this->request->getVar('student_name');
				$id = $this->request->getVar('id');
				if (!$id) {
					$result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل التعرفة ');
					return $this->respond($result, 400);
					exit;
				}
				if (!$level) {
					$result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المستوى ');
					return $this->respond($result, 400);
					exit;
				}

				// if(!$user_id){
				//     $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  الطالب  ');
				//   return $this->respond($result,400);
				//   exit;
				// }



				$data = array('level' => $level, 'division' => $division, 'user_id' => $user_id, 'student_number' => $student_number, 'student_name' => $student_name, 'phone' => $phone);

				$model = new CoursesModel();
				$update = $model->edit_course($data, $id);

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
			$data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
			return	$this->respond($data, 200);
		}
	}
	public function GetCourseByID()
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
				$model = new CoursesModel();
				$result = $model->get_course_by_id($id);
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
	public function DeleteCourse()
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
				$model = new CoursesModel();

				$delete = $model->delete_course([$id]);
				if ($delete == 1) {
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


	public function DeleteCourses()
	{

		if ($this->request->getMethod() == 'delete') {
			$check = new Check(); // Create an instance
			$result = $check->check();

			if ($result['code'] == 1) {
				$input = $this->request->getRawInput();;
				$ids = isset($input['ids']) ? $input['ids'] : '';
				if (!$ids) {
					$data = array('code' => -1, 'msg' => 'لم يتم تحديد مستخدمين!', 'data' => []);
					return	$this->respond($data, 400);
					exit;
				}
				$model = new CoursesModel();

				$delete = $model->delete_course($ids);

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
}
