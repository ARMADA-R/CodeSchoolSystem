<?php namespace App\Models;

use CodeIgniter\Model;

class ServicesModel extends Model
{
  
    public function get_forms($school_id,$limit,$page,$key){
        $page=($page-1)*$limit;
        $school_id=explode(",",$school_id);
        $db = \Config\Database::connect();
        $builder = $db->table('forms');
        $builder->select('id, title, link, hits,status');
        $builder->wherein('school_id',$school_id);
        $builder->orderBy('create_date', 'DESC');
        if($key=='all'){
            $query   = $builder->get();
        }
        else{
            $query   = $builder->get($limit, $page);
        }    
        return $query->getResult();
    }
    public function add_form($data){
        $db = \Config\Database::connect();
        $builder = $db->table('forms');
        return $builder->insert($data);
       
    }
    public function edit_form($data,$id){
        $db = \Config\Database::connect();
        $builder = $db->table('forms');
        $builder->where('id',$id);
      return  $builder->update($data);
    
    }
    public function get_hits($school_id){
        $db = \Config\Database::connect();
        $builder = $db->table('forms');
        $builder->select('hits');
        $builder->where('id',$school_id);
        $query   = $builder->get();  
        return $query->getRow();
    }
    public function upload_image($data){
        $db = \Config\Database::connect();
        $builder = $db->table('upload_image');
        return $builder->insert($data);
       
    }
    public function add_survey($data){
        $db = \Config\Database::connect();
        $builder = $db->table('survey');
         $builder->insert($data);
         return $db->insertID();
       
    }
    public function add_questions($data){
        $db = \Config\Database::connect();
        $builder = $db->table('survey_questions');
         $builder->insert($data);
         return $db->insertID();
       
    }
    public function add_anwser($data){
        $db = \Config\Database::connect();
        $builder = $db->table('survey_anwsers');
         $builder->insert($data);
         return $db->insertID();
       
    }
    public function add_anwser_survey($data){
        $db = \Config\Database::connect();
        $builder = $db->table('anwser_user_survey');
         $builder->insert($data);
         return $db->insertID();
       
    }
    public function get_survey($school_id,$limit,$page,$key){
        $page=($page-1)*$limit;
        $school_id=explode(",",$school_id);

        $db = \Config\Database::connect();
        $builder = $db->table('survey');
        $builder->select('survey.id,title,( SELECT COUNT(*) FROM anwser_user_survey m WHERE survey.id=m.survey_id group by survey_id)count,status');
        // $builder->join('anwser_user_survey', 'survey.id = anwser_user_survey.survey_id','left');
        $builder->wherein('school_id',$school_id);
        // $builder->groupBy("survey_id");
        $builder->orderBy('survey.create_date', 'DESC');
        if($key=='all'){
            $query   = $builder->get();
        }
        else{
            $query   = $builder->get($limit, $page);
        } 
        return $query->getResult();
    }

    public function get_parent_survey($school_id,$limit,$page,$key){
        $page=($page-1)*$limit;
        $db = \Config\Database::connect();
        $builder = $db->table('survey');
        $builder->select('survey.id,title, ( SELECT COUNT(*) FROM anwser_user_survey m WHERE survey.id=m.survey_id group by survey_id)count,status');
       
        $builder->where('school_id',$school_id);
        $builder->where('status',1);
   
        $builder->orderBy('survey.create_date', 'DESC');
        if($key=='all'){
            $query   = $builder->get();
        }
        else{
            $query   = $builder->get($limit, $page);
        } 
        return $query->getResult();
    }
    public function get_surveybyid($survey_id){
        $db = \Config\Database::connect();
        $builder = $db->table('survey');
        $builder->select('survey_questions.id,title,question,answer,survey_anwsers.id anwser_id,survey_questions.id question_id');
        $builder->join('survey_questions', 'survey.id = survey_questions.survey_id','left');
        $builder->join('survey_anwsers', 'survey_questions.id = survey_anwsers.question_id','left');
        $builder->where('survey.id',$survey_id);

        $query   = $builder->get();  
        return $query->getResult();
    }
    public function edit_survey($data,$id){
        $db = \Config\Database::connect();
        $builder = $db->table('survey');
        $builder->where('id',$id);
      return  $builder->update($data);
    
    }
}