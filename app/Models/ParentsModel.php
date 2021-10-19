<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ParentsModel extends Model
{



    public function get_parents($limit, $page, $key, $user = null)
    {
        $db = \Config\Database::connect();

        $date = date('Y-m-d');
        $page = ($page - 1) * $limit;
        $builder = $db->table('users');
        $builder->where('role', 3);

        if ($user != null) {
            $builder->where('city', $user->city );
            $builder->where('area', $user->area );
        }
       
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }


    public function edit_parent($data, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('id', $id);
        $builder->where('role', 3);
        $builder->update($data);
        return $db->affectedRows();
    }

    public function delete_parents($ids)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->whereIn('id', $ids);
        $builder->where('role', 3);
        $builder->delete();
        return $db->affectedRows();
    }

    
    public function parents_search($key)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('`id`, CONCAT(username, " | ", email, " | ", phone) AS text');
        $builder->where('role', 3);
        $builder->groupStart();
        $builder->like('username', $key );
        $builder->orlike('email', $key);
        $builder->orlike('phone', $key);
        $builder->groupEnd();
        $query   = $builder->get();
        return $query->getResult();
    }

}
