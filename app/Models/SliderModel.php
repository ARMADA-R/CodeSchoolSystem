<?php namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    protected $table      = 'sliders';
    protected $primaryKey = 'id';


    protected $allowedFields = ['image_url', 'text'];
    public function get_slider(){
        $db = \Config\Database::connect();
        $builder = $db->table('sliders');
        $builder->select('id,concat("'.base_url().'/schools/assets/files/",sliders.image_url)image_url,text');
        $builder->orderBy('create_date', 'DESC');
        $query   = $builder->get();  
        return $query->getResult();
    }
  
    public function add_slider($data){
        $db = \Config\Database::connect();
        $builder = $db->table('sliders');
        return $builder->insert($data);
       
    }
    public function edit_slider($data,$id){
        $db = \Config\Database::connect();
        $builder = $db->table('sliders');
        $builder->where('id',$id);
        $builder->update($data);
       return $db->affectedRows();
    }
    public function get_slider_by_id($id){
        $db = \Config\Database::connect();
        $builder = $db->table('sliders');
        $builder->select('image_url');
        $builder->where('id',$id);
        $query   = $builder->get();  
        return $query->getRow();
       
    }
    public function delete_slider($id){
        $db = \Config\Database::connect();
        $builder = $db->table('sliders');
        $builder->where('id',$id);
         $builder->delete();
         return $db->affectedRows();
       
    }
    
}