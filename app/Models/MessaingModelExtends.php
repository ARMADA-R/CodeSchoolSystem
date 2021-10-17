<?php

namespace App\Models;

class MessaingModelExtends extends MessaingModel
{

    //overide add_general_email
    public function add_general_message($data) {
        $db = \Config\Database::connect();
        $builder = $db->table('public_messages');
        return $builder->insert($data);
    }

    public function get_students_messages_archive($school_id, $date = null, $limit, $page, $key) {
        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('students');
        $builder->select('public_messages.id as archive_id, public_messages.code, students.id, students.full_name, students.phone,CAST(public_messages.create_date As Date) send_date,public_messages.message, public_messages.send_status');
        $builder->join('public_messages', 'students.id = public_messages.user_id');
        $builder->where('public_messages.school_id', $school_id);
        $builder->where('public_messages.user_type', "students");
        $builder->orderBy('public_messages.create_date', 'DESC');

        if (!empty($date)) {
            $search_where = "CAST(public_messages.create_date As Date) = '" . $date . "'";
            $builder->where($search_where);
        }
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }
    

    public function get_course_students_messages_archive($school_id, $date = null, $limit, $page, $key) {
        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('courses');
        $builder->select('public_messages.id as archive_id, public_messages.code, courses.id, courses.student_name, courses.phone,CAST(public_messages.create_date As Date) send_date,public_messages.message, public_messages.send_status');
        $builder->join('public_messages', 'courses.id = public_messages.user_id');
        $builder->where('public_messages.school_id', $school_id);
        $builder->where('public_messages.user_type', "coursesStudents");
        $builder->orderBy('public_messages.create_date', 'DESC');

        if (!empty($date)) {
            $search_where = "CAST(public_messages.create_date As Date) = '" . $date . "'";
            $builder->where($search_where);
        }
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }
    
    public function get_teacher_messages_archive($school_id, $date = null, $limit, $page, $key) {

        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('teachers');
        $builder->select('public_messages.id as archive_id, public_messages.code, teachers.id, teachers.full_name, teachers.phone,CAST(public_messages.create_date As Date) send_date,public_messages.message, public_messages.send_status');
        $builder->join('public_messages', 'teachers.id = public_messages.user_id');
        $builder->where('public_messages.school_id', $school_id);
        $builder->where('public_messages.user_type', "teachers");
        $builder->orderBy('public_messages.create_date', 'DESC');

        if (!empty($date)) {
            $search_where = "CAST(public_messages.create_date As Date) = '" . $date . "'";
            $builder->where($search_where);
        }
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }
    
    public function get_employee_messages_archive($school_id, $date = null, $limit, $page, $key) {

        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('public_messages.id as archive_id, public_messages.code, employee.id, employee.name, employee.phone,CAST(public_messages.create_date As Date) send_date,public_messages.message, public_messages.send_status');
        $builder->join('public_messages', 'employee.id = public_messages.user_id');
        $builder->where('public_messages.school_id', $school_id);
        $builder->where('public_messages.user_type', "employees");
        $builder->orderBy('public_messages.create_date', 'DESC');

        if (!empty($date)) {
            $search_where = "CAST(public_messages.create_date As Date) = '" . $date . "'";
            $builder->where($search_where);
        }
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }
}
