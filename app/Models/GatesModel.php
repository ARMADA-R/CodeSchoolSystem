<?php namespace App\Models;

use CodeIgniter\Model;

class GatesModel extends Model
{
  
    public function get_gates($limit,$page,$key){
        $page=($page-1)*$limit;
        $db = \Config\Database::connect();
        $builder = $db->table('gates');
        $builder->select('*');
        $builder->orderBy('create_date', 'DESC');
        if($key=='all'){
            $query   = $builder->get();
        }
        else{
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }
  
    public function add_gate($data){
        $db = \Config\Database::connect();
        $builder = $db->table('gates');
        return $builder->insert($data);
       
    }
    public function edit_gate($data,$id){
        $db = \Config\Database::connect();
        $builder = $db->table('gates');
        $builder->where('id',$id);
        $builder->update($data);
       return $db->affectedRows();
    }
    public function get_gate_by_id($id){
        $db = \Config\Database::connect();
        $builder = $db->table('gates');
        $builder->select('*');
        $builder->where('id',$id);
        $query   = $builder->get();  
        return $query->getRow();
       
    }
    public function delete_gate($id){
        $db = \Config\Database::connect();
        $builder = $db->table('gates');
        $builder->where('id',$id);
         $builder->delete();
         return $db->affectedRows();
       
    }
}