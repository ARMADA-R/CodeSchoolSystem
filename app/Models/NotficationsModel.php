<?php namespace App\Models;

use CodeIgniter\Model;

class NotficationsModel extends Model
{
  
    public function get_notficcations($parent_id){
       
        $db = \Config\Database::connect();
        $builder = $db->table('absence_and_lag');
        $builder->select('absence_and_lag.id, message,create_date date');
        $builder->join('students','absence_and_lag.student_id=students.id');
        $builder->where('parent_id',$parent_id);
        $builder->orderBy('absence_and_lag.create_date', 'DESC');
      
            $query   = $builder->get();
      
        return $query->getResult();
    }
    public function add_reply($data){
        $id=$data['id'];
        unset($data['id']);
        $db = \Config\Database::connect();
        $builder = $db->table('absence_and_lag');
        $builder->where('id',$id);
        return $builder->update($data);
       
    }
}