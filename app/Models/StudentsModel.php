<?php namespace App\Models;

use CodeIgniter\Model;

class StudentsModel extends Model
{
  
    public function get_students($school_id,$limit,$page,$key){
        $page=($page-1)*$limit;
        $db = \Config\Database::connect();
        $builder = $db->table('students');
        $builder->select('students.id, email parent_email,full_name, student_number, students.phone, classes.name class_name,semaster.name semaster_name, classes.id class_id,semaster.id semaster_id');
        $builder->join('classes', 'students.class_id = classes.id');
        $builder->join('semaster', 'students.semestar_id = semaster.id');
        // $builder->join('users', 'students.parent_id = users.id','left');
        $builder->join('users', 'students.phone = users.phone','left');
        $builder->where('school_id',$school_id);
      
        $builder->orderBy('students.create_date', 'DESC');
        if($key=='all'){
            $query   = $builder->get();
        }
        else{
            $query   = $builder->get($limit, $page);
           
        }
        return $query->getResult();
    }
    public function get_students_count($school_id){
        
        $db = \Config\Database::connect();
        $builder = $db->table('students');
        $builder->select('count(students.id)count');
      
        $builder->where('school_id',$school_id);
        $builder->groupBy("school_id");
            $query   = $builder->get();
        
        return $query->getRow();
    }
    public function add_student($data){
        $db = \Config\Database::connect();
        $builder = $db->table('students');
       $builder->insert($data);
       return $db->insertID();
       
    }
    public function edit_student($data,$id){
        $db = \Config\Database::connect();
        $builder = $db->table('students');
        $builder->where('id',$id);
        $builder->update($data);
       return $db->affectedRows();
    }
    public function get_student_by_id($id){
        $db = \Config\Database::connect();
        $builder = $db->table('students');
        $builder->select('students.id, full_name, student_number, phone,classes.name class_name,semaster.name semaster_name');
        $builder->join('classes', 'students.class_id = classes.id');
        $builder->join('semaster', 'students.semestar_id = semaster.id');
        $builder->where('students.id',$id);
        $query   = $builder->get();  
        return $query->getRow();
       
    }
   
    public function get_students_by_phone($phone){
        $db = \Config\Database::connect();
        $builder = $db->table('students');
        $builder->select('*');
        $builder->where('students.phone',$phone);
        // $builder->where('students.phone','IS NOT NULL');
        $query = $builder->get();  
        return $query->getResult();
       
    }


    public function delete_students($ids){
        $db = \Config\Database::connect();
        $builder = $db->table('students');
        $builder->whereIn('id',$ids);
         $builder->delete();
         return $db->affectedRows();
       
    }
    public function get_student_name_by_id($id){
        $db = \Config\Database::connect();
        $builder = $db->table('students');
        $builder->select(' full_name');
        $builder->where('id',$id);
        $query   = $builder->get();  
        return $query->getRow();
       
    }

}