<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';

    protected $allowedFields = ['id', 'email', 'phone'];
    public function get_user_email($email)
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('users');
        $builder->select('email,id');
        $builder->where('email', $email);

        $query   = $builder->get();
        return $query->getRow();
    }
    public function add_user($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->insert($data);
        return  $db->insertID();
    }
    public function login($email, $password)
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('users');
        $builder->select('email,role,id,username');
        $builder->where('email', $email);
        $builder->where('password', md5($password));
        $query   = $builder->get();
        return $query->getRow();
    }
    public function resetpassword($email, $password)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('email', $email);
        $builder->update($password);
        return  $db->affectedRows();;
    }
    public function get_user_role($user_id)
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('users');
        $builder->select('role');
        $builder->where('id', $user_id);

        $query   = $builder->get();
        return $query->getRow();
    }
    public function get_user_parent($email)
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('users');
        $builder->select('email,id');
        $builder->where('email', $email);
        $builder->where('role', 3);
        $query   = $builder->get();
        return $query->getRow();
    }
    public function get_parent_school($email)
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('users');
        $builder->select('school_id');
        $builder->join('students', 'users.id = students.parent_id');
        $builder->where('email', $email);
        $builder->where('role', 3);
        $query   = $builder->get();
        return $query->getResult();
    }
}
