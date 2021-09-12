<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class SupportModel extends Model
{
    public function get_support(){
        $db = \Config\Database::connect();
        $builder = $db->table('support');
        $builder->select('*');
        $query   = $builder->get();  
        return $query->getResult();
    }

    public function add_support($data){
        $db = \Config\Database::connect();
        $builder = $db->table('support');
        $builder->insert($data);
       return $db->insertID();
    }

    public function edit_support($data, $id){
        $db = \Config\Database::connect();
        $builder = $db->table('support');
        $builder->where('id',$id);
        $builder->update($data);
       return $db->affectedRows();
    }

    public function delete_support($ids){
        $db = \Config\Database::connect();
        $builder = $db->table('support');
        $builder->whereIn('id',$ids);
         $builder->delete();
         return $db->affectedRows();
    }
}