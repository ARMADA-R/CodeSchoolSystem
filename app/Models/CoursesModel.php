<?php

namespace App\Models;

use CodeIgniter\Model;

class CoursesModel extends Model
{

    public function get_courses($school_id, $limit, $page, $key, $division = null, $level = null)
    {
        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('courses');
        $builder->select('courses.id, level, division, student_name,student_number,phone');
        // $builder->join('students','courses.user_id=students.id');
        $builder->where('courses.school_id', $school_id);
        
        if ($division != null) {
            $builder->where('courses.division', $division);
        }

        if ($level != null) {
            $builder->where('courses.level', $level);
        }

        $builder->orderBy('courses.create_date', 'DESC');
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }

    public function add_course($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('courses');
        return $builder->insert($data);
    }
    public function edit_course($data, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('courses');
        $builder->where('id', $id);
        $builder->update($data);
        return $db->affectedRows();
    }

    public function get_course_by_id($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('courses');
        $builder->select('courses.id, level, division, user_id');
        $builder->where('id', $id);
        $query   = $builder->get();
        return $query->getRow();
    }


    public function get_course_if_updated($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('courses');
        $builder->select('courses.id, level, division, user_id');
        $builder->where('id', $id);
        $builder->where('level', 'IS NOT NULL');
        $builder->where('division', 'IS NOT NULL');
        $query   = $builder->get();
        return $query->getRow();
    }


    public function get_school_student_by_number($student_number, $school_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('courses');
        $builder->where('student_number', $student_number);
        $builder->where('school_id', $school_id);
        $query = $builder->get();
        return $query->getRow();
    }

    public function delete_course($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('courses');
        $builder->whereIn('id', $id);
        $builder->delete();
        return $db->affectedRows();
    }
}
