<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class InfoModel extends Model
{
    public function get_info(){
        $db = \Config\Database::connect();
        $builder = $db->table('system_info');
        $builder->select('copyright,phone,logo');
        $query   = $builder->get();  
        return $query->getRow();
    }
    public function edit_info($data){
        $db = \Config\Database::connect();
        $builder = $db->table('system_info');
        $builder->update($data);
       return $db->affectedRows();
    }
}