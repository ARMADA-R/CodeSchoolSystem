<?php namespace App\Controllers;
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");
use CodeIgniter\API\ResponseTrait;
use App\Models\TeachersModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;
class Teachers extends BaseController
{ use ResponseTrait;
    public function GetTeachers(){
        if($this->request->getMethod()=='get'){
			$check = new Check(); // Create an instance
			$result=$check->check();
		
			if($result['code']==1){
                $school_id=$this->request->getVar('school_id');
                if(!$school_id){
                    $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل المدرسة ');
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
			$model=new TeachersModel();
			$result=$model->get_teachers($school_id,$limit,$page,$key);
			if(!empty($result)){
			$data=array('code'=>1,'msg'=>'success','data'=>$result,'total_count'=>count($result));
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
public function AddTeacher(){

    if($this->request->getMethod()=='post'){
        $check = new Check(); // Create an instance
        $result=$check->check();
    
        if($result['code']==1){
    $full_name=$this->request->getVar('full_name');
    $teacher_number=$this->request->getVar('teacher_number');
    $phone=$this->request->getVar('phone');
    $email=$this->request->getVar('email');
    $school_id=$this->request->getVar('school_id');
    if(!$school_id){
        $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل المدرسة ');
      return $this->respond($result,400);
      exit;
    }
    if(!$full_name){
        $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل اسم الطالب ');
      return $this->respond($result,400);
      exit;
    }
    if(!$teacher_number){
        $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  رقم المعلم ');
      return $this->respond($result,400);
      exit;
    }
    if(!$phone){
        $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  الهاتف  ');
      return $this->respond($result,400);
      exit;
    }
   

        $model=new TeachersModel();
    $data=array('school_id'=>$school_id,'full_name'=>$full_name,'teacher_number'=>$teacher_number,'phone'=>$phone,'email'=>$email);
            if($model->add_teacher($data)){
                $data=array('code'=>1,'msg'=>'success','data'=>[]);
                return	$this->respond($data, 200);
            }
            else{
                $data=array('code'=>-1,'msg'=>'fail','data'=>[]);
                return	$this->respond($data, 400);
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
public function EditTeacher(){
	
	
	if($this->request->getMethod()=='post'){
		$check = new Check(); // Create an instance
		$result=$check->check();
	
		if($result['code']==1){
		  $full_name=$this->request->getVar('full_name');
    $teacher_number=$this->request->getVar('teacher_number');
    $phone=$this->request->getVar('phone');
    $email=$this->request->getVar('email');
    $school_id=$this->request->getVar('school_id');
    $id=$this->request->getVar('id');
           
           
			if(!$id){
                $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل التعرفة ');
              return $this->respond($result,400);
              exit;
            }
            if(!$full_name){
                $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل اسم الطالب ');
              return $this->respond($result,400);
              exit;
            }
            if(!$teacher_number){
                $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  رقم المعلم ');
              return $this->respond($result,400);
              exit;
            }
            if(!$phone){
                $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  الهاتف  ');
              return $this->respond($result,400);
              exit;
            }
           
        
            $data=array('full_name'=>$full_name,'teacher_number'=>$teacher_number,'phone'=>$phone,'email'=>$email);

		$model=new TeachersModel();
        $update=$model->edit_teacher($data,$id);
       
		if($update==1)
		{
			$data=array('code'=>1,'msg'=>'success','data'=>[]);
			return	$this->respond($data, 200);
		}
		else{
			$data=array('code'=>-1,'msg'=>'fail','data'=>[]);
			return	$this->respond($data, 400);
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
    public function GetTeacherByID(){

		if($this->request->getMethod()=='get'){
			$check = new Check(); // Create an instance
			$result=$check->check();
		
			if($result['code']==1){
                $id=$this->request->getVar('id');
                if(!$id){
                    $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل التعرفة ');
                  return $this->respond($result,400);
                  exit;
                }
			$model=new TeachersModel();
			$result=$model->get_teachers_by_id($id);
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
    public function DeleteTeacher(){
		
		if($this->request->getMethod()=='delete'){
			$check = new Check(); // Create an instance
		$result=$check->check();
	
		if($result['code']==1){
		$input=$this->request->getRawInput();;
		$id=isset($input['id']) ? $input['id'] :'';
			if(!$id){
				$data=array('code'=>-1,'msg'=>'Please insert id flied','data'=>[]);
		return	$this->respond($data, 400);
		exit;
			}
			$model=new TeachersModel();
		
			$delete=$model->delete_teachers($id);
			if($delete==1)
		{
			$data=array('code'=>1,'msg'=>'success','data'=>[]);
			return	$this->respond($data, 200);
		}
		else{
			$data=array('code'=>-1,'msg'=>'fail','data'=>[]);
			return	$this->respond($data, 400);
		}
	}
	else{
		$result=array('code'=>$result['code'],'msg'=>$result['messages'],
	);
	return $this->respond($result,400);
	}
		}
		else{
			$data=array('code'=>-1,'msg'=>'Method must be Delete','data'=>[]);
			return	$this->respond($data, 200);
			}
	}
}