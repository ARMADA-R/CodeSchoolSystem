<?php namespace App\Controllers;
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");
use App\Models\Contact_usModel;
use CodeIgniter\RESTful\ResourceController;
class Contact_us extends ResourceController
{ public function SendRequest(){
    if( $this->request->getMethod() =='post'){
        $email=$this->request->getVar('email');
        $message_title=$this->request->getVar('message_title');
        $message_text=$this->request->getVar('message_text');
        if(!$email){
            $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل الايميل ');
          return $this->respond($result,400);
          exit;
        }
        if(!$message_title){
            $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل عنوان الرسالة  ');
          return $this->respond($result,400);
          exit;
        }
        if(!$message_text){
            $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل نص الرسالة  ');
          return $this->respond($result,400);
          exit;
        }
      
        $model=new Contact_usModel();
        $black_list=$model->get_blacklist();
      
        if(!empty($black_list)){
            if (preg_match("/{$message_title}/i",$black_list->text)) {
                $result=array('code'=>-1,'msg'=>'العنوان يحوي كلمات مسيئة'
            );
    
            return $this->respond($result,400);
            exit;
            }
            if (preg_match("/{$message_text}/i",$black_list->text)) {
                $result=array('code'=>-1,'msg'=>'الرسالة تحوي كلمات مسيئة'
            );
    
            return $this->respond($result,400);
            exit;
            }  
        }
     
        $data=['email'=>$email,'title'=>$message_title,'message_text'=>$message_text];
        $result=$model->send_request($data);
        if($result){
            $result=array('code'=>1,'msg'=>'success'
        );

        return $this->respond($result,200);
        }
        else{
            $result=array('code'=>-1,'msg'=>'fail'
        );

        return $this->respond($result,400);
        }
    }
    else{
        $result=array('code'=>-1,'msg'=>'Method must be POST',
        );
        return $this->respond($result,400);
    }}
    public function Contact_us(){

		if($this->request->getMethod()=='get'){
			$check = new Check(); // Create an instance
			$result=$check->check();
		
			if($result['code']==1){
			$model=new Contact_usModel();
			$result=$model->get_contactus();
			
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
        public function GetContactus(){

		if($this->request->getMethod()=='get'){
			$check = new Check(); // Create an instance
			$result=$check->check();
		
			if($result['code']==1){
			      $page=$this->request->getVar('page');
              
                $limit=$this->request->getVar('limit');
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
			$model=new Contact_usModel();
			$result=$model->get_contact_us($limit,$page);
			
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
    public function GetBlacklist(){
        if($this->request->getMethod()=='get'){
			$check = new Check(); // Create an instance
			$result=$check->check();
		
			if($result['code']==1){
				
			$model=new Contact_usModel();
			$result=$model->get_blacklist();
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
    public function EditBlacklist(){
	
	
        if($this->request->getMethod()=='post'){
            $check = new Check(); // Create an instance
            $result=$check->check();
        
            if($result['code']==1){
           
                    $text=$this->request->getVar('text');
               
                if(!$text){
                    $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل النص ');
                  return $this->respond($result,400);
                  exit;
                }
              
        
                $data=array('text'=>$text);
    
            $model=new Contact_usModel();
            $update=$model->edit_blacklist($data);
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
        public function ReplyContactus(){
      

    if($this->request->getMethod()=='post'){
        $check = new Check(); // Create an instance
        $result=$check->check();
    
        if($result['code']==1){
            $id=$this->request->getVar('id');
     
            $reply=$this->request->getVar('reply');
            if(!$id){
                $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  رقم التعرفة ');
              return $this->respond($result,400);
              exit;
            }
          
            if(!$reply){
                $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  الرد  ');
              return $this->respond($result,400);
              exit;
            }
        $model=new Contact_usModel();
        $data=array('id'=>$id,'reply'=>$reply);
        $result=$model->add_reply($data);
      
        if($result==1){
    
        $data=array('code'=>1,'msg'=>'success','data'=>[]);
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
$data=array('code'=>-1,'msg'=>'Method must be POST','data'=>[]);
return	$this->respond($data, 200);
}


}
}