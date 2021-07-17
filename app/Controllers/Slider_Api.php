<?php namespace App\Controllers;
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");
use CodeIgniter\API\ResponseTrait;
use App\Models\SliderModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;
class Slider_Api extends BaseController
{ use ResponseTrait;
	
	public function Slider(){

		if($this->request->getMethod()=='get'){
		
			$model=new SliderModel();
			$result=$model->get_slider();
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
	$data=array('code'=>-1,'msg'=>'Method must be GET','data'=>[]);
return	$this->respond($data, 200);
}
	}
	public function Slider_admin(){

		if($this->request->getMethod()=='get'){
			$check = new Check(); // Create an instance
			$result=$check->check();
		
			if($result['code']==1){
			$model=new SliderModel();
			$result=$model->get_slider();
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
	public function AddSlider(){

		if($this->request->getMethod()=='post'){
			$check = new Check(); // Create an instance
			$result=$check->check();
		
			if($result['code']==1){
		$text=$this->request->getVar('text');
	
		if(!$text){
			$data=array('code'=>-1,'msg'=>'Please insert text flied','data'=>[]);
return	$this->respond($data, 400);
exit;
		}
		
		if(empty($_FILES['file']['name'])){
			$data=array('code'=>-1,'msg'=>'Please insert image flied','data'=>[]);
return	$this->respond($data, 400);
exit;
		}
	
			$model=new SliderModel();
			$input = $this->validate([
				'file' => [
					'uploaded[file]',
					'mime_in[file,image/jpg,image/jpeg,image/png]',
					'max_size[file,1024]',
				]
			]);
		
			if (!$input) {
				$data=array('code'=>-1,'msg'=>'Choose a valid file','data'=>[]);
				return	$this->respond($data, 400);
			
			} 
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
				   $filepath =$newName;
				
				$data=array('text'=>$text,'image_url'=>$filepath);
				if($model->add_slider($data)){
					$data=array('code'=>1,'msg'=>'success','data'=>[]);
					return	$this->respond($data, 200);
				}
				else{

				}
			$data=array('code'=>-1,'msg'=>'fail','data'=>[]);
				return	$this->respond($data, 400);
			}
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
	public function EditSlider(){
	

		if($this->request->getMethod()=='post'){
			$check = new Check(); // Create an instance
			$result=$check->check();
		
			if($result['code']==1){
			$text=$this->request->getVar('text');
			$id=$this->request->getVar('id');
			$input=$this->request->getRawInput();
	
	
		
		
			if(!$id){
				$data=array('code'=>-1,'msg'=>'Please insert id flied','data'=>[]);
		return	$this->respond($data, 400);
		exit;
			}
	
		
	
	
			if(!empty($_FILES['file']['name'])){
			$input2 = $this->validate([
				'file' => [
					'uploaded[file]',
					'mime_in[file,image/jpg,image/jpeg,image/png]',
					'max_size[file,1024]',
				]
			]);
	
			if (!$input2) {
				$data=array('code'=>-1,'msg'=>'Choose a valid file','data'=>[]);
				return	$this->respond($data, 400);
			
			} 
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
				   $filepath =$newName;
				   $data=array('text'=>$text,'image_url'=>$filepath);
			
				}
			
				$data=array('text'=>$text,'image_url'=>$filepath);
				
			
			}
		}
		
			else{
				$data=array('text'=>$text);
				
			}
			$model=new SliderModel();
			$update=$model->edit_slider($data,$id);
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
	public function DeleteSlider(){
		
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
			$model=new SliderModel();
			$slider=$model->get_slider_by_id($id);
			$delete=$model->delete_slider($id);
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
}