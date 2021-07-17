<?php namespace App\Models;

use CodeIgniter\Model;

class TeachersModel extends Model
{
  
    public function get_teachers($school_id,$limit,$page,$key){
        $page=($page-1)*$limit;
        $db = \Config\Database::connect();
        $builder = $db->table('teachers');
        $builder->select('id, full_name, teacher_number, phone, email');
        $builder->where('school_id',$school_id);
        $builder->orderBy('create_date', 'DESC');
        if($key=='all'){
            $query   = $builder->get();
        }
        else{
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }
  
    public function add_teacher($data){
        $db = \Config\Database::connect();
        $builder = $db->table('teachers');
        return $builder->insert($data);
       
    }
    public function edit_teacher($data,$id){
        $db = \Config\Database::connect();
        $builder = $db->table('teachers');
        $builder->where('id',$id);
        $builder->update($data);
       return $db->affectedRows();
    }
    public function get_teachers_by_id($id){
        $db = \Config\Database::connect();
        $builder = $db->table('teachers');
        $builder->select('id, full_name, teacher_number, phone, email');
        $builder->where('id',$id);
        $query   = $builder->get();  
        return $query->getRow();
       
    }
    public function delete_teachers($id){
        $db = \Config\Database::connect();
        $builder = $db->table('teachers');
        $builder->where('id',$id);
         $builder->delete();
         return $db->affectedRows();
       
    }
}