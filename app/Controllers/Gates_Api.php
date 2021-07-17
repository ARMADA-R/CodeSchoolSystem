<?php namespace App\Controllers;
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");
use CodeIgniter\API\ResponseTrait;
use App\Models\GatesModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;
class Gates_Api extends BaseController
{ use ResponseTrait;
	
	public function Gates(){

		if($this->request->getMethod()=='get'){
			$check = new Check(); // Create an instance
			$result=$check->check();
		
			if($result['code']==1){
			$model=new GatesModel();
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
			$result=$model->get_gates($limit,$page,$key);
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
	}public function GetGateByID(){

		if($this->request->getMethod()=='get'){
			$check = new Check(); // Create an instance
			$result=$check->check();
		
			if($result['code']==1){
				$id=$this->request->getVar('id');
			$model=new GatesModel();
			$result=$model->get_gate_by_id($id);
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
	public function AddGate(){

		if($this->request->getMethod()=='post'){
			$check = new Check(); // Create an instance
			$result=$check->check();
		
			if($result['code']==1){
		$username=$this->request->getVar('username');
        $password=$this->request->getVar('password');
        $english_link=$this->request->getVar('english_link');
        $arabic_link=$this->request->getVar('arabic_link');
        $email=$this->request->getVar('email');
        $type_sender=$this->request->getVar('type_sender');
        $encrypt_type=$this->request->getVar('encrypt_type');
        $status=$this->request->getVar('status');
        if(!$email){
            $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل الايميل ');
          return $this->respond($result,400);
          exit;
        }
        if(!$password){
            $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل كلمة المرور ');
          return $this->respond($result,400);
          exit;
        }
		
	
			$model=new GatesModel();
		$data=array('username'=>$username,'password'=>$password,'english_link'=>$english_link,'arabic_link'=>$arabic_link,'email'=>$email,'type_sender'=>$type_sender,'encrypt_type'=>$encrypt_type,'status'=>$status);
				if($model->add_gate($data)){
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
	public function EditGate(){
	
	
		if($this->request->getMethod()=='post'){
			$check = new Check(); // Create an instance
			$result=$check->check();
		
			if($result['code']==1){
			
			$id=$this->request->getVar('id');
			
				  $username=$this->request->getVar('username');
			$password=$this->request->getVar('password');
			$english_link=$this->request->getVar('english_link');
			$arabic_link=$this->request->getVar('arabic_link');
			$email=$this->request->getVar('email');
			$type_sender=$this->request->getVar('type_sender');
			$encrypt_type=$this->request->getVar('encrypt_type');
			$status=$this->request->getVar('status');
				if(!$email){
					$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل الايميل ');
				  return $this->respond($result,400);
				  exit;
				}
				if(!$password){
					$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل كلمة المرور ');
				  return $this->respond($result,400);
				  exit;
				}
				if(!$id){
					$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل التعرفة ');
				  return $this->respond($result,400);
				  exit;
				}
		
				$data=array('username'=>$username,'password'=>$password,'english_link'=>$english_link,'arabic_link'=>$arabic_link,'email'=>$email,'type_sender'=>$type_sender,'encrypt_type'=>$encrypt_type,'status'=>$status);
	
			$model=new GatesModel();
			$update=$model->edit_gate($data,$id);
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
	public function DeleteGate(){
		
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
			$model=new GatesModel();
		
			$delete=$model->delete_gate($id);
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
	function upload() { 
        // helper([ 'url']);
         
        $database = \Config\Database::connect();
        $db = $database->table('sliders');
    
        $input = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/png]',
                'max_size[file,1024]',
            ]
        ]);
    
        if (!$input) {
            print_r('Choose a valid file');
        } else {
			if($file = $this->request->getFile('file')) {
				if ($file->isValid() && ! $file->hasMoved()) {
				   // Get file name and extension
				   $name = $file->getName();
				   $ext = $file->getClientExtension();
	
				   // Get random file name
				   $newName = $file->getRandomName(); 
	
				   // Store file in public/uploads/ folder
				   $file->move('./assets/files', $newName);
	
				   // File path to display preview
				   $filepath = base_url()."/uploads/".$newName;
    
            $data = [
               'image_url' =>  $filepath,
               'text'  =>'test'
            ];
    
            $save = $db->insert($data);
            print_r('File has successfully uploaded');        
		}
	}
    }


}
public function UpdateGateStatus(){
	
	
	if($this->request->getMethod()=='post'){
		$check = new Check(); // Create an instance
		$result=$check->check();
	
		if($result['code']==1){
			$id=$this->request->getVar('id');
			$status=$this->request->getVar('status');
			if(!$id){
				$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  التعرفة');
			  return $this->respond($result,400);
			  exit;
			}
			if(strlen($status)==0){
				$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  الحالة');
			  return $this->respond($result,400);
			  exit;
			}
	
			$data=array('status'=>$status);

		$model=new GatesModel();
		$update=$model->edit_gate($data,$id);
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
}