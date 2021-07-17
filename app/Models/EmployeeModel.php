<?php namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
  
    public function get_employee($school_id,$limit,$page,$key){
        $page=($page-1)*$limit;
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('id, name, phone');
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
  
    public function add_employee($data){
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        return $builder->insert($data);
       
    }
    public function edit_employee($data,$id){
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->where('id',$id);
        $builder->update($data);
       return $db->affectedRows();
    }
    public function get_employee_by_id($id){
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('id, name, phone');
        $builder->where('id',$id);
        $query   = $builder->get();  
        return $query->getRow();
       
    }
      public function delete_employee($id){
        $db = \Config\Database::connect();
          $id=explode(",",$id);
        $builder = $db->table('employee');
        $builder->wherein('id',$id);
         $builder->delete();
         return $db->affectedRows();
       
    }
 
}