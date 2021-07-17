<?php namespace App\Controllers;
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");
use CodeIgniter\API\ResponseTrait;
use App\Models\NotficationsModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;
class Notifactions extends BaseController
{ use ResponseTrait;

    public function GetNotifications(){

		if($this->request->getMethod()=='get'){
			$check = new Check(); // Create an instance
			$result=$check->check();
		
			if($result['code']==1){
				$parent_id= $this->request->getVar('parent_id');
				
				
					if(!$parent_id){
						$result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل ولي الأمر ');
					  return $this->respond($result,400);
					  exit;
					}
			
				
			$model=new NotficationsModel();
			$result=$model->get_notficcations($parent_id);
			if(!empty($result)){
                $notificatios=array();
                $i=0;
                foreach($result as $r){
                    $notificatios[$i]['notification_number']=$i+1;
                    $notificatios[$i]['id']=$r->id;
                    $notificatios[$i]['message']=$r->message;
                    $notificatios[$i]['date']=$r->date;
                    $i++;
                }
			$data=array('code'=>1,'msg'=>'success','data'=>$notificatios);
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

public function ReplyParent(){
      

    if($this->request->getMethod()=='post'){
        $check = new Check(); // Create an instance
        $result=$check->check();
    
        if($result['code']==1){
            $id=$this->request->getVar('id');
            $parent_id=$this->request->getVar('parent_id');
            $reply=$this->request->getVar('reply');
            if(!$id){
                $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  رقم التعرفة ');
              return $this->respond($result,400);
              exit;
            }
            if(!$parent_id){
                $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل   ولي الأمر ');
              return $this->respond($result,400);
              exit;
            }
            if(!$reply){
                $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  الرد  ');
              return $this->respond($result,400);
              exit;
            }
        $model=new NotficationsModel();
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