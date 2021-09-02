<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use DateTime;

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
    public function get_user_username($username)
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('users');
        $builder->select('username,id');
        $builder->where('username', $username);

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
        $builder->orWhere('username', $email);
        $builder->where('password', md5($password));
        $query   = $builder->get();

        return $query->getRow();
    }
    public function resetpassword($email, $password)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('email', $email);
        $builder->update(['password' => md5($password)]);
        return  $db->affectedRows();
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

        $builder->join('students', 'users.id = students.parent_id');
        $builder->where('email', $email);
        $builder->where('role', 3);
        $query   = $builder->get();
        return $query->getResult();
    }
    public function setResetPasswordCredentials($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('reset_passwords');
        $builder->where('email', $data['email']);
        $query   = $builder->get();
        $res = $query->getResult();

        if ($res) {

            $builder->where('email', $data['email']);
            $data["create_date"] = $this->getCurrentDatabaseDateTime();

            return $builder->update($data);
        }

        return $builder->insert($data);
    }


    public function getCurrentDatabaseDateTime()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT CURRENT_TIMESTAMP FROM `users`');
        $currentTime = $query->getResult();
        return $currentTime[0]->CURRENT_TIMESTAMP;
    }


    public function getResetPasswordCredentials($email)
    {
        $db = \Config\Database::connect();

        $builder = $db->table('reset_passwords');

        $builder->where('email', $email);
        $builder->where('create_date >', $email);
        $query   = $builder->get();

        return $query->getResult();
    }

       
    public function delete_resetPassword_record($email)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('reset_passwords');
        $builder->where('email', $email);
        $builder->delete();
        return $db->affectedRows();
    }
    
}
