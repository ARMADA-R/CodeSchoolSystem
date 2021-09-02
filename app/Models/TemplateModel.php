<?php namespace App\Models;

use CodeIgniter\Model;

class TemplateModel extends Model
{
  
    public function get_template($limit,$page,$key, $school_id){
        $page=($page-1)*$limit;
        $db = \Config\Database::connect();
        $builder = $db->table('template');
        $builder->select('id, name, content, letters_number,message_number,sender_type');
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
  
    public function add_template($data){
        $db = \Config\Database::connect();
        $builder = $db->table('template');
        return $builder->insert($data);
       
    }
    public function edit_template($data,$id){
        $db = \Config\Database::connect();
        $builder = $db->table('template');
        $builder->where('id',$id);
        $builder->update($data);
       return $db->affectedRows();
    }
    public function get_template_by_id($id){
        $db = \Config\Database::connect();
        $builder = $db->table('template');
        $builder->select('id, name, content, letters_number,message_number');
        $builder->where('id',$id);
        $query   = $builder->get();  
        return $query->getRow();
       
    }
    public function delete_template($id){
        $db = \Config\Database::connect();
        $builder = $db->table('template');
        $builder->where('id',$id);
         $builder->delete();
         return $db->affectedRows();
       
    }
}