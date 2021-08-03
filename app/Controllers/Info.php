<?php namespace App\Controllers;
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");
use CodeIgniter\API\ResponseTrait;
use App\Models\InfoModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;
class Info extends BaseController
{ use ResponseTrait;
    public function GetInfo(){

		if($this->request->getMethod()=='get'){
	
			$model=new InfoModel();
			$result=$model->get_info();
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
    public function EditInfo(){
	
	
        if($this->request->getMethod()=='post'){
            $check = new Check(); // Create an instance
            $result=$check->check();
        
            if($result['code']==1){
            $copyright=$this->request->getVar('copyright');
            $phone=$this->request->getVar('phone');
           
            if(!empty($_FILES['file']['name'])){
            $input2 = $this->validate([
                'file' => [
                    'uploaded[file]',
                    // 'mime_in[file,image/jpg,image/jpeg,image/png]',
                    // 'max_size[file,1024]',
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
                   $filepath = base_url()."/assets/files/".$newName;
                   $data=array('phone'=>$phone,'copyright'=>$copyright,'logo'=>$filepath);
            
                }
            
                // $data=array('text'=>$text,'image_url'=>$filepath);
                
            
            }
        }
        
            else{
                $data=array('phone'=>$phone,'copyright'=>$copyright);
                
            }
            $model=new InfoModel();
            $update=$model->edit_info($data);
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