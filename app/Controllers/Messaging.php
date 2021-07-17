<?php namespace App\Controllers;
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");
use CodeIgniter\API\ResponseTrait;
use App\Models\MessaingModel;
use App\Models\UserModel;
use App\Models\StudentsModel;
use App\Models\TeachersModel;
use App\Models\EmployeeModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;
class Messaging extends BaseController
{ use ResponseTrait;
    public function MailArchive(){

		if($this->request->getMethod()=='get'){
			$check = new Check(); // Create an instance
			$result=$check->check();
		
			if($result['code']==1){
				$key= $this->request->getVar('key');
				$page=$this->request->getVar('page');
              
                $limit=$this->request->getVar('limit');
				if(empty($key) || $key!='all'){
					if(!$page){
						$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل الصفحة ');
					  return $this->respond($result,400);
					  exit;
					}
					if(!$limit){
						$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل عدد العناصر ');
					  return $this->respond($result,400);
					  exit;
					}
				}
			$model=new MessaingModel();
			$result=$model->MailArhive($limit,$page,$key);
			if(!empty($result)){
			$data=array('code'=>1,'msg'=>'success','data'=>$result);
return	$this->respond($data, 200);
			}
			else{
				$data=array('code'=>1,'msg'=>'no data found','data'=>[]);
return	$this->respond($data, 200);
			}
		}
		else{
			$result=array('code'=>$result['code'],'msg'=>$result['messages'],
		);
		return $this->respond($result,400);
		}
		}
else{
	$data=array('code'=>-1,'msg'=>'Method must be GET','data'=>[]);
return	$this->respond($data, 200);
}
}
public function SendGeneralMail(){

	if($this->request->getMethod()=='post'){
		$check = new Check(); // Create an instance
		$result=$check->check();
	
		if($result['code']==1){
		$model=new MessaingModel();
		$user=new UserModel();
		$school_id=$this->request->getVar('school_id');
		$template_id=$this->request->getVar('template_id');
		$group=$this->request->getVar('group');
		if(!$school_id){
			$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل المدرسة ');
		  return $this->respond($result,400);
		  exit;
		}
		if(!$template_id){
			$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل القالب ');
		  return $this->respond($result,400);
		  exit;
		}
		if(!$group){
			$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل المجموعة ');
		  return $this->respond($result,400);
		  exit;
		}
		$school=$user->get_user_role($school_id);
		if($school->role!=2){
			$result=array('code'=>-1,'msg'=>'الرجاء إدخال مستخدم مدرسة  ');
		  return $this->respond($result,400);
		  exit;
		}
		if($group==1 || $group==2 || $group==3){
		$data=array('school_id'=>$school_id,'sender_type'=>$group,'template_id'=>$template_id);
	
		if($model->add_general_email($data)){
		$data=array('code'=>1,'msg'=>'success','data'=>[]);
return	$this->respond($data, 200);
		}
		else{
			$data=array('code'=>1,'msg'=>'no data found','data'=>[]);
return	$this->respond($data, 200);
		}
	}
	else{
		$result=array('code'=>-1,'msg'=>'الرجاء إدخال مجموعة صحيحة  ');
		  return $this->respond($result,400);
		  exit;
	}
	}
	else{
		$result=array('code'=>$result['code'],'msg'=>$result['messages'],
	);
	return $this->respond($result,400);
	}
	}
else{
$data=array('code'=>-1,'msg'=>'Method must be POST','data'=>[]);
return	$this->respond($data, 200);
}
}
public function GetGeneralMessage(){

	if($this->request->getMethod()=='get'){
		$check = new Check(); // Create an instance
		$result=$check->check();
	
		if($result['code']==1){
			$school_id=$this->request->getVar('school_id');
			
			$group=$this->request->getVar('group');
			if(!$school_id){
				$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل المدرسة ');
			  return $this->respond($result,400);
			  exit;
			}
			if(!$group){
				$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل المجموعة ');
			  return $this->respond($result,400);
			  exit;
			}
			$page=$this->request->getVar('page');
              
			$limit=$this->request->getVar('limit');
			$key= $this->request->getVar('key');
			if(empty($key) || $key!='all'){
			if(!$page){
				$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل الصفحة ');
			  return $this->respond($result,400);
			  exit;
			}
			if(!$limit){
				$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل عدد العناصر ');
			  return $this->respond($result,400);
			  exit;
			}
		  }
			if($group==1 || $group==2 || $group==3){
if($group==1){
	$model=new StudentsModel();
	$result=$model->get_students($school_id,$limit,$page,$key);
	$data=array('code'=>1,'msg'=>'success','data'=>$result,'total_count'=>count($result));
return	$this->respond($data, 200);
}
if($group==2){
	$model=new TeachersModel();
	$result=$model->get_teachers($school_id,$limit,$page,$key);
	$data=array('code'=>1,'msg'=>'success','data'=>$result,'total_count'=>count($result));
return	$this->respond($data, 200);
}
if($group==3){
	$model=new EmployeeModel();
	$result=$model->get_employee($school_id,$limit,$page,$key);
	$data=array('code'=>1,'msg'=>'success','data'=>$result,'total_count'=>count($result));
return	$this->respond($data, 200);
}
else{
	$data=array('code'=>1,'msg'=>'no datat found','data'=>[]);
return	$this->respond($data, 200);	
}	
	}
	else{
		$result=array('code'=>-1,'msg'=>'الرجاء إدخال مجموعة صحيحة  ');
		  return $this->respond($result,400);
		  exit;
	}
	}
	else{
		$result=array('code'=>$result['code'],'msg'=>$result['messages'],
	);
	return $this->respond($result,400);
	}
	}
else{
$data=array('code'=>-1,'msg'=>'Method must be GET','data'=>[]);
return	$this->respond($data, 200);
}
}
public function GetArchiveGeneralMessage(){

	if($this->request->getMethod()=='get'){
		$check = new Check(); // Create an instance
		$result=$check->check();
	
		if($result['code']==1){
			$school_id=$this->request->getVar('school_id');
			
			$group=$this->request->getVar('group');
			$date=$this->request->getVar('date');
			
			if(!$school_id){
				$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل المدرسة ');
			  return $this->respond($result,400);
			  exit;
			}
			if(!$group){
				$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل المجموعة ');
			  return $this->respond($result,400);
			  exit;
			}
			$page=$this->request->getVar('page');
              
			$limit=$this->request->getVar('limit');
			$key= $this->request->getVar('key');
			if(empty($key) || $key!='all'){
			if(!$page){
				$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل الصفحة ');
			  return $this->respond($result,400);
			  exit;
			}
			if(!$limit){
				$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل عدد العناصر ');
			  return $this->respond($result,400);
			  exit;
			}
		  }
			if($group==1 || $group==2 || $group==3){
				$model=new MessaingModel();
if($group==1){
	
	$result=$model->get_archive_message_students($school_id,$date,$limit,$page,$key);
	$data=array('code'=>1,'msg'=>'success','data'=>$result,'total_count'=>count($result));
return	$this->respond($data, 200);
}
if($group==2){

	$result=$model->get_archive_message_teacher($school_id,$date,$limit,$page,$key);
	$data=array('code'=>1,'msg'=>'success','data'=>$result,'total_count'=>count($result));
return	$this->respond($data, 200);
}
if($group==3){
// 	$model=new EmployeeModel();
	$result=$model->get_archive_message_employee($school_id,$date,$limit,$page,$key);
	$data=array('code'=>1,'msg'=>'success','data'=>$result,'total_count'=>count($result));
return	$this->respond($data, 200);
}
else{
	$data=array('code'=>1,'msg'=>'no datat found','data'=>[]);
return	$this->respond($data, 200);	
}	
	}
	else{
		$result=array('code'=>-1,'msg'=>'الرجاء إدخال مجموعة صحيحة  ');
		  return $this->respond($result,400);
		  exit;
	}
	}
	else{
		$result=array('code'=>$result['code'],'msg'=>$result['messages'],
	);
	return $this->respond($result,400);
	}
	}
else{
$data=array('code'=>-1,'msg'=>'Method must be GET','data'=>[]);
return	$this->respond($data, 200);
}

}
}