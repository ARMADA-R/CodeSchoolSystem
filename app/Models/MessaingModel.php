<?php

namespace App\Models;

use CodeIgniter\Model;

class MessaingModel extends Model
{



    public function add_email($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('messages');
        return $builder->insert($data);
    }
    public function MailArhive($limit, $page, $key)
    {
        $page = ($page - 1) * $limit;

        $db = \Config\Database::connect();
        $builder = $db->table('mail_archive');
        $builder->select('gate_name,messages,discount_point,note,reply,CAST(mail_archive.create_date As Date)date,users.username sender_name,s.username reciver_name');
        $builder->join('users', 'mail_archive.sender_id = users.id');
        $builder->join('users s', 'mail_archive.reciver_id = s.id');
        $builder->orderBy('mail_archive.create_date', 'DESC');

        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }

        return $query->getResult();
    }
    public function add_general_email($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('messages');
        return $builder->insert($data);
    }
    public function get_archive_message_students(
        $school_id,
        $date = null,
        $limit,
        $page,
        $key
    ) {
        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('students');
        $builder->select('students.id, full_name, phone,CAST(messages.create_date As Date) send_date,name message_title,content message_text');
        $builder->join('messages', 'students.school_id = messages.school_id');
        $builder->join('template', 'messages.template_id = template.id');
        $builder->where('students.school_id', $school_id);
        $builder->where('messages.sender_type', 1);
        $builder->orderBy('students.create_date', 'DESC');

        if (!empty($date)) {
            $search_where = "CAST(messages.create_date As Date) = '" . $date . "'";
            $builder->where($search_where);
        }
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }
    public function get_archive_message_teacher($school_id, $date = null, $limit, $page, $key)
    {
        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('teachers');
        $builder->select('teachers.id, full_name, phone,CAST(messages.create_date As Date) send_date,name message_title,content message_text');
        $builder->join('messages', 'teachers.school_id = messages.school_id');
        $builder->join('template', 'messages.template_id = template.id');
        $builder->where('teachers.school_id', $school_id);
        $builder->where('messages.sender_type', 2);
        $builder->orderBy('teachers.create_date', 'DESC');
        if (!empty($date)) {

            $search_where = "CAST(messages.create_date As Date) = '" . $date . "'";
            $builder->where($search_where);
        }
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }
    public function get_archive_message_employee($school_id, $date = null, $limit, $page, $key)
    {
        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('employee.id,employee.name full_name, phone,CAST(messages.create_date As Date) send_date,template.name message_title,content message_text');
        $builder->join('messages', 'employee.school_id = messages.school_id');
        $builder->join('template', 'messages.template_id = template.id');
        $builder->where('employee.school_id', $school_id);
        $builder->where('messages.sender_type', 3);
        $builder->orderBy('employee.create_date', 'DESC');
        if (!empty($date)) {

            $search_where = "CAST(messages.create_date As Date) = '" . $date . "'";
            $builder->where($search_where);
        }
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }

    //overide add_general_email
    // public function add_general_message($data)
    // {
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('sms_messages');
    //     return $builder->insert($data);
    // }

    

}
