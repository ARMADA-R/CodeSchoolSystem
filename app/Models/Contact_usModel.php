<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Contact_usModel extends Model
{
  
    public function send_request($data){
        $db      = \Config\Database::connect();
        $builder = $db->table('contact_us');
       return  $builder->insert($data);
    }
    public function get_blacklist(){
        $db = \Config\Database::connect();
        $builder = $db->table('black_list');
        $builder->select('text');
        $query   = $builder->get();  
        return $query->getRow();
    }
    public function get_contactus(){
        $db = \Config\Database::connect();
        $builder = $db->table('contact_us');
        $builder->orderBy('create_date', 'DESC');
        $builder->select('*');
        $query   = $builder->get();  
        return $query->getResult();
    }
        public function get_contact_us($limit,$page){
        $db = \Config\Database::connect();
        $builder = $db->table('contact_us');
        $builder->orderBy('create_date', 'DESC');
        $builder->select('*');
         $query   = $builder->get($limit, $page);
        return $query->getResult();
    }
    public function edit_blacklist($data){
        $db = \Config\Database::connect();
        $builder = $db->table('black_list');
    
        $builder->update($data);
       return $db->affectedRows();
    }
        public function add_reply($data){
        $id=$data['id'];
        unset($data['id']);
        $db = \Config\Database::connect();
        $builder = $db->table('contact_us');
        $builder->where('id',$id);
        return $builder->update($data);
       
    }
}