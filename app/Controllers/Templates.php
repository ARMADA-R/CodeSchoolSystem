<?php namespace App\Controllers;
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");
use CodeIgniter\API\ResponseTrait;
use App\Models\TemplateModel;
use App\Models\UserModel;
use App\Models\MessaingModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;
class Templates extends BaseController
{ use ResponseTrait;
    public function GetGeneralMessagingTempalte(){
        if($this->request->getMethod()=='get'){
			$check = new Check(); // Create an instance
			$result=$check->check();
		
			if($result['code']==1){
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
              $school_id=$this->request->getVar('school_id');
                if(!$school_id){
                    $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل المدرسة ');
                  return $this->respond($result,400);
                  exit;
                }
			$model=new TemplateModel();
			$result=$model->get_template($limit,$page,$key,$school_id);
			if(!empty($result)){
				$templates=array();
				$i=0;
				foreach($result as $s){
				    $templates[$i]['id']=$s->id;
$templates[$i]['name']=$s->name;
$templates[$i]['content']=$s->content;
$templates[$i]['letters_number']=$s->letters_number;
$templates[$i]['message_number']=$s->message_number;
if($s->sender_type==1){
	$templates[$i]['sender_type']='رسالة نصية';
}
if($s->sender_type==2){
	$templates[$i]['sender_type']='واتس اب';
}
$i++;
				}
			$data=array('code'=>1,'msg'=>'success','data'=>$templates,'total_count'=>count($result));
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
public function AddTemplate(){

    if($this->request->getMethod()=='post'){
        $check = new Check(); // Create an instance
        $result=$check->check();
    
        if($result['code']==1){
    $name=$this->request->getVar('name');
    $content=$this->request->getVar('content');
    $letters_number=$this->request->getVar('letters_number');
    $message_number=$this->request->getVar('message_number');
	$school_id=$this->request->getVar('school_id');
	$sender_type=$this->request->getVar('sender_type');
                if(!$school_id){
                    $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل المدرسة ');
                  return $this->respond($result,400);
                  exit;
                }
    if(!$name){
        $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل اسم القالب ');
      return $this->respond($result,400);
      exit;
    }
    if(!$content){
        $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  المحتوى ');
      return $this->respond($result,400);
      exit;
    }
	if(!$sender_type){
        $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  نوع الارسال ');
      return $this->respond($result,400);
      exit;
    }

        $model=new TemplateModel();
    $data=array('name'=>$name,'content'=>$content,'letters_number'=>$letters_number,'message_number'=>$message_number,'school_id'=>$school_id,'sender_type'=>$sender_type);
            if($model->add_template($data)){
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
public function EditTemplate(){
	
	
	if($this->request->getMethod()=='post'){
		$check = new Check(); // Create an instance
		$result=$check->check();
	
		if($result['code']==1){
			   $name=$this->request->getVar('name');
			   $id=$this->request->getVar('id');
			$content=$this->request->getVar('content');
			$letters_number=$this->request->getVar('letters_number');
			$message_number=$this->request->getVar('message_number');
			$sender_type=$this->request->getVar('sender_type');
            if(!$name){
                $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل اسم القالب ');
              return $this->respond($result,400);
              exit;
            }
            if(!$content){
                $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  المحتوى ');
              return $this->respond($result,400);
              exit;
            }
			if(!$id){
                $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل التعرفة ');
              return $this->respond($result,400);
              exit;
            }
			if(!$sender_type){
				$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  نوع الارسال ');
			  return $this->respond($result,400);
			  exit;
			}
			$data=array('name'=>$name,'content'=>$content,'letters_number'=>$letters_number,'message_number'=>$message_number,'sender_type'=>$sender_type);

		$model=new TemplateModel();
		$update=$model->edit_template($data,$id);
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
    public function GetTemplateByID(){

		if($this->request->getMethod()=='get'){
			$check = new Check(); // Create an instance
			$result=$check->check();
		
			if($result['code']==1){
				$id=$this->request->getVar('id');
			$model=new TemplateModel();
			$result=$model->get_template_by_id($id);
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
    public function DeleteTemplate(){
		
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
			$model=new TemplateModel();
		
			$delete=$model->delete_template($id);
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