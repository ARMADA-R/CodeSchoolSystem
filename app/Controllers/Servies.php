<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

use CodeIgniter\API\ResponseTrait;
use App\Models\ServicesModel;
use App\Models\SchoolModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;

class Servies extends BaseController
{
    use ResponseTrait;

    public function GetForms()
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
                $model = new ServicesModel();
                $result = $model->get_forms($school_id, $limit, $page, $key);
                if (!empty($result)) {
                    $i = 0;
                    foreach ($result as $r) {
                        $forms[$i]['id'] = $r->id;
                        $forms[$i]['title'] = $r->title;
                        $forms[$i]['link'] = $r->link;
                        $forms[$i]['hits'] = $r->hits;
                        $forms[$i]['form_status'] = $r->status;
                        if ($r->status == 0) {
                            $forms[$i]['status'] = 'مفتوحة';
                        }
                        if ($r->status == 1) {
                            $forms[$i]['status'] = 'مغلقة';
                        }
                        $i++;
                    }
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $forms, 'total_count' => count($result));
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function AddForms()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $link = $this->request->getVar('link');
                $title = $this->request->getVar('title');

                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$title) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل العنوان ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$link) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل   الرابط ');
                    return $this->respond($result, 400);
                    exit;
                }

                $service_model = new SchoolModel();
                $service = $service_model->get_service_status_by_school_id($school_id, 5);
                if (empty($service)) {
                    $result = array('code' => -1, 'msg' => 'لا يوجد لديك صالحية لعمل هذه الخدمة يرجى مراسلة مدير النظام');
                    return $this->respond($result, 400);
                    exit;
                }

                $model = new ServicesModel();
                $data = array('school_id' => $school_id, 'title' => $title, 'link' => $link);
                if ($model->add_form($data)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function UpdateFormStatus()
    {


        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $id = $this->request->getVar('id');
                $status = $this->request->getVar('status');
                if (!$id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  التعرفة');
                    return $this->respond($result, 400);
                    exit;
                }
                if (strlen($status) == 0) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الحالة');
                    return $this->respond($result, 400);
                    exit;
                }

                $data = array('status' => $status);

                $model = new ServicesModel();
                $update = $model->edit_form($data, $id);
                if ($update == 1) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function UpdateFormHits()
    {


        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $id = $this->request->getVar('id');

                if (!$id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  التعرفة');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new ServicesModel();
                $hits = $model->get_hits($id);

                $data = array('hits' => $hits->hits + 1);


                $update = $model->edit_form($data, $id);
                if ($update == 1) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function UploadImage()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_id = $this->request->getVar('school_id');

                if (!$school_id) {
                    $data = array('code' => -1, 'msg' => 'Please insert school', 'data' => []);
                    return    $this->respond($data, 400);
                    exit;
                }
                if (empty($_FILES['file']['name'])) {
                    $data = array('code' => -1, 'msg' => 'Please insert image flied', 'data' => []);
                    return    $this->respond($data, 400);
                    exit;
                }

                $model = new ServicesModel();
                $input = $this->validate([
                    'file' => [
                        'uploaded[file]',
                        'mime_in[file,image/jpg,image/jpeg,image/png]',
                        'max_size[file,1024]',
                    ]
                ]);

                if (!$input) {
                    $data = array('code' => -1, 'msg' => 'Choose a valid file', 'data' => []);
                    return    $this->respond($data, 400);
                }
                if ($file = $this->request->getFile('file')) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        // Get file name and extension
                        $name = $file->getName();
                        $ext = $file->getClientExtension();

                        // Get random file name
                        $newName = $file->getRandomName();

                        // Store file in public/uploads/ folder
                        $file->move('./assets/files', $newName);

                        // File path to display preview
                        $filepath = base_url() . "/assets/files/" . $newName;

                        $data = array('school_id' => $school_id, 'image_url' => $filepath);
                        if ($model->upload_image($data)) {
                            $data = array('code' => 1, 'msg' => 'success', 'data' => array('image_url' => $filepath));
                            return    $this->respond($data, 200);
                        } else {
                        }
                        $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                        return    $this->respond($data, 400);
                    }
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetTinyUrl()
    {
        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $url = $this->request->getVar('url');
                $ch = curl_init();
                $timeout = 5;
                curl_setopt($ch, CURLOPT_URL, 'http://tinyurl.com/api-create.php?url=' . $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                $data = curl_exec($ch);
                curl_close($ch);
                $data = array('code' => 1, 'msg' => 'success', 'data' => array('url' => $data));
                return    $this->respond($data, 200);
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    // public function AddSurvey(){

    //     if($this->request->getMethod()=='post'){
    //         $check = new Check(); // Create an instance
    //         $result=$check->check();
    //     var_dump($this->request->getVar());
    //     exit;
    //         if($result['code']==1){
    //     $questions=$this->request->getVar('questions');
    //     $anwsers=$this->request->getVar('anwsers');
    //     $title=$this->request->getVar('title');
    //     $status=$this->request->getVar('status');
    //     $school_id=$this->request->getVar('school_id');

    //     if(!$school_id){
    //         $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل المدرسة ');
    //       return $this->respond($result,400);
    //       exit;
    //     }
    //     if(!$title){
    //         $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل العنوان ');
    //       return $this->respond($result,400);
    //       exit;
    //     }
    //     if(!$questions){
    //         $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل   الأسئلة ');
    //       return $this->respond($result,400);
    //       exit;
    //     }
    //     if(!$anwsers){
    //         $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  الأجوبة ');
    //       return $this->respond($result,400);
    //       exit;
    //     }
    // //    if(count($questions) != count($anwsers)){
    // //     $result=array('code'=>-1,'msg'=>'الرجاء إدخال جواب لكل سؤال');
    // //     return $this->respond($result,400);
    // //     exit;
    // //    }
    //    $service_model=new SchoolModel();
    //    $service=$service_model->get_service_status_by_school_id($school_id,6);
    //    if(empty($service)){
    //        $result=array('code'=>-1,'msg'=>'لا يوجد لديك صالحية لعمل هذه الخدمة يرجى مراسلة مدير النظام');
    //        return $this->respond($result,400);
    //        exit;
    //    }
    //         $model=new ServicesModel();
    //     $data=array('school_id'=>$school_id,'title'=>$title,'status'=>$status);
    //    $save= $model->add_survey($data);
    // if($save>0){
    //     foreach($questions as $key=>$question){
    //         $data2=array('question'=>$question,'survey_id'=>$save);
    //        $save2= $model->add_questions($data2);

    //        $anwsers2=explode(",",$anwsers[$key]);
    //         foreach($anwsers2 as $anwser){


    //             $data3=array('answer'=>$anwser,'question_id'=>$save2);
    //             $model->add_anwser($data3);

    //         }

    //     }
    //     $data=array('code'=>1,'msg'=>'success','data'=>[]);
    //     return	$this->respond($data, 200);
    // }

    //             else{
    //                 $data=array('code'=>-1,'msg'=>'fail','data'=>[]);
    //                 return	$this->respond($data, 400);
    //             }

    //     }
    //     else{
    //         $result=array('code'=>$result['code'],'msg'=>$result['messages'],
    //     );
    //     return $this->respond($result,400);
    //     }
    //     }
    // else{
    // $data=array('code'=>-1,'msg'=>'Method must be POST','data'=>[]);
    // return	$this->respond($data, 200);
    // }
    // }
    public function AddSurvey()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();
            // var_dump($this->request->getVar());
            // exit;
            if ($result['code'] == 1) {
                $questions = $this->request->getVar('questions');
                $anwsers = $this->request->getVar('anwsers');
                $title = $this->request->getVar('title');
                $status = $this->request->getVar('status');
                $school_id = $this->request->getVar('school_id');

                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$title) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل العنوان ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$questions) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل   الأسئلة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$anwsers) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الأجوبة ');
                    return $this->respond($result, 400);
                    exit;
                }
                //    if(count($questions) != count($anwsers)){
                //     $result=array('code'=>-1,'msg'=>'الرجاء إدخال جواب لكل سؤال');
                //     return $this->respond($result,400);
                //     exit;
                //    }
                $service_model = new SchoolModel();
                $service = $service_model->get_service_status_by_school_id($school_id, 3);
                if (empty($service)) {
                    $result = array('code' => -1, 'msg' => 'لا يوجد لديك صالحية لعمل هذه الخدمة يرجى مراسلة مدير النظام');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new ServicesModel();
                $data = array('school_id' => $school_id, 'title' => $title, 'status' => $status);
                $save = $model->add_survey($data);
                if ($save > 0) {
                    $questions = explode(",", $questions);
                    foreach ($questions as $key => $question) {
                        $data2 = array('question' => $question, 'survey_id' => $save);
                        $save2 = $model->add_questions($data2);

                        $anwsers2 = explode(",", $anwsers);
                        $a = explode("|", $anwsers2[$key]);
                        foreach ($a as $anwser) {


                            $data3 = array('answer' => $anwser, 'question_id' => $save2);
                            $model->add_anwser($data3);
                        }
                    }
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetSurvey()
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
                $model = new ServicesModel();
                $result = $model->get_survey($school_id, $limit, $page, $key);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result, 'total_count' => count($result));
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetParentSurvey()
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
                $model = new ServicesModel();
                $result = $model->get_parent_survey($school_id, $limit, $page, $key);
                if (!empty($result)) {
                    $i = 0;
                    foreach ($result as $r) {
                        $survey[$i]['id'] = $r->id;
                        $survey[$i]['title'] = $r->title;
                        $survey[$i]['count'] = $r->count;
                        if ($r->status == 0) {
                            $survey[$i]['status'] = 'مفتوحة';
                        }
                        if ($r->status == 1) {
                            $survey[$i]['status'] = 'مغلقة';
                        }
                        $i++;
                    }
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $survey, 'total_count' => count($result));
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function UpdateSurveyStatus()
    {


        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $id = $this->request->getVar('id');
                $status = $this->request->getVar('status');
                if (!$id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  التعرفة');
                    return $this->respond($result, 400);
                    exit;
                }
                if (strlen($status) == 0) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الحالة');
                    return $this->respond($result, 400);
                    exit;
                }

                $data = array('status' => $status);

                $model = new ServicesModel();
                $update = $model->edit_survey($data, $id);
                if ($update == 1) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetSurveyByID()
    {
        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $survey_id = $this->request->getVar('survey_id');
                if (!$survey_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الاستبيان ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new ServicesModel();
                $result = $model->get_surveybyid($survey_id);
                $id = array();
                $survey = array();
                if (!empty($result)) {
                    $i = 0;
                    foreach ($result as $s) {
                        $id[$i]['id'] = $s->id;
                        $id[$i]['s'] = $s->answer;
                        $id[$i]['anwser_id'] = $s->anwser_id;

                        $i++;
                    }
                    $unique = array_unique($id, SORT_REGULAR);

                    $a = 0;
                    $b = 0;
                    foreach ($result as $r) {
                        $survey[$a]['id'] = $survey_id;
                        $survey[$a]['question'] = $r->question;
                        $survey[$a]['title'] = $r->title;
                        $survey[$a]['question_id'] = $r->question_id;
                        foreach ($unique as $d) {
                            if ($r->id == $d['id']) {

                                $survey[$a]['anwsers'][] = array('anwser_id' => $d['anwser_id'], 'name' => $d['s']);
                            }
                        }

                        $a++;
                    }

                    $unique = array_unique($survey, SORT_REGULAR);
                    $new_survey = array();
                    foreach ($unique as $r) {
                        array_push($new_survey, $r);
                    }
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $new_survey);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function AddAnwsersSurvey()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $questions = $this->request->getVar('questions');
                $anwsers = $this->request->getVar('anwsers');
                $survey_id = $this->request->getVar('survey_id');
                $user_id = $this->request->getVar('user_id');

                if (!$survey_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الاستبيان ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$user_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المستخدم ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$questions) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل   الأسئلة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!is_array($questions)) {
                    $result = array('code' => -1, 'msg' => 'الاجوبة يجب أن تكون مصفوفة');
                    return $this->respond($result, 400);
                    exit;
                }
                // if(!$anwsers){
                //     $result=array('code'=>-1,'msg'=>'الرجاء إدخال حقل  الأجوبة ');
                //   return $this->respond($result,400);
                //   exit;
                // }
                //    if(count($questions) != count($anwsers)){
                //     $result=array('code'=>-1,'msg'=>'الرجاء إدخال جواب لكل سؤال');
                //     return $this->respond($result,400);
                //     exit;
                //    }
                $service_model = new SchoolModel();

                $model = new ServicesModel();



                foreach ($questions as $key => $question) {

                    $a = explode(",", $question);

                    $data2 = array('survey_id' => $survey_id, 'question_id' => $a[0], 'answer_id' => isset($a[1]) && !empty($a[1]) ? $a[1] : '', 'user_id' => $user_id);
                    $save2 = $model->add_anwser_survey($data2);
                }
                $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                return    $this->respond($data, 200);
                // }

                //             else{
                //                 $data=array('code'=>-1,'msg'=>'fail','data'=>[]);
                //                 return	$this->respond($data, 400);
                //             }

            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }














    public function addNewSurvey()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();
            // var_dump($this->request->getVar());
            // exit;
            if ($result['code'] == 1) {

                $title = $this->request->getVar('title');
                $link = $this->request->getVar('link');
                $school_id = $this->request->getVar('school_id');

                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$title) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل العنوان ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$link) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال الرابط');
                    return $this->respond($result, 400);
                    exit;
                }

                $ch = curl_init();
                $timeout = 5;
                curl_setopt($ch, CURLOPT_URL, 'http://tinyurl.com/api-create.php?url=' . $link);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                $tinyUrl = curl_exec($ch);
                curl_close($ch);

                $model = new ServicesModel();
                $data = [
                    'school_id' => $school_id,
                    'title' => $title,
                    'short_link' => $tinyUrl,
                    'long_link' => $link,
                ];

                $save = $model->add_survey($data);

                if ($save > 0) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 400);
        }
    }
}
