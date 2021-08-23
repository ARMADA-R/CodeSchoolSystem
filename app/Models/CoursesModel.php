<?php namespace App\Models;

use CodeIgniter\Model;

class CoursesModel extends Model
{
  
    public function get_courses($school_id,$limit,$page,$key){
        $page=($page-1)*$limit;
        $db = \Config\Database::connect();
        $builder = $db->table('courses');
        $builder->select('courses.id, level, division, student_name,student_number,phone');
        // $builder->join('students','courses.user_id=students.id');
        $builder->where('courses.school_id',$school_id);
        $builder->orderBy('courses.create_date', 'DESC');
        if($key=='all'){
            $query   = $builder->get();
        }
        else{
            $query   = $builder->get($limit, $page);
        } 
        return $query->getResult();
    }
  
    public function add_course($data){
        $db = \Config\Database::connect();
        $builder = $db->table('courses');
        return $builder->insert($data);
       
    }
    public function edit_course($data,$id){
        $db = \Config\Database::connect();
        $builder = $db->table('courses');
        $builder->where('id',$id);
        $builder->update($data);
       return $db->affectedRows();
    }
    public function get_course_by_id($id){
        $db = \Config\Database::connect();
        $builder = $db->table('courses');
        $builder->select('courses.id, level, division, user_id');
        $builder->where('id',$id);
        $query   = $builder->get();  
        return $query->getRow();
       
    }
    public function delete_course($id){
        $db = \Config\Database::connect();
        $builder = $db->table('courses');
        $builder->whereIn('id',$id);
         $builder->delete();
         return $db->affectedRows();
       
    }
}