<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;

class TicketsModel extends Model
{

        public function get_schooladminticket($name = null, $status = null, $date = null, $sender_type = null)
        {

                $db = \Config\Database::connect();
                $builder = $db->table('tickets');
                $builder->select('users.id,school_info.school_name,users.username,school_info.image_url,category,users.email,users.phone,users.city,users.area');
                $builder->join('users', '(tickets.sender_id = users.id)');
                $builder->join('users s', '(tickets.reciver_id = s.id)');
                $builder->join('school_info', '(tickets.sender_id = school_info.school_id)');
                if (!empty($name) && $sender_type == 1) {
                        $builder->like('school_name', $name);
                }
                if (!empty($name) && $sender_type == 2) {
                        $builder->like('school_name', $name);
                }
                if (!empty($name) && $sender_type == 3) {

                        $builder->like('users.username', $name);
                }
                if (strlen($status) != 0) {
                        $builder->where('tickets.status', $status);
                }
                if (!empty($date)) {
                        $search_where = "CAST(tickets.create_date As Date) = '" . $date . "'";
                        $builder->where($search_where);
                }
                $builder->whereIn('users.role', [1, 2]);
                $builder->whereIn('s.role', [1, 2]);
                $builder->distinct();

                $query   = $builder->get();

                return $query->getResult();
        }
        public function get_schooladminticketbyschool($school_id, $sender_type)
        {


                $db = \Config\Database::connect();
                //         $builder = $db->table('tickets');
                //         $builder->select('ticket_text,department,type,prority,reply,max(tickets_reply.id)');
                //         $builder->join('tickets_reply', 'tickets.id = tickets_reply.ticket_id','left');

                //         $builder->where('tickets.sender_id',$school_id);
                //         $builder->where('sender_type', 1);
                //        $builder->orderBy('tickets_reply.create_date','desc');
                //        $query =$db->query('select tickets.id,tickets.status,users.username,department,type,prority,ticket_text,reply FROM tickets left join tickets_reply on tickets.id=tickets_reply.ticket_id left join users on tickets_reply.user_id=users.id where sender_id='.$school_id .' and sender_type='.$sender_type. ' and tickets_reply.id in (select max(id) from tickets_reply group by ticket_id) ');
                // $query   = $builder->get();


                $query = $db->query('select tickets.id,tickets.status,users.username,department,type,prority,ticket_text,reply,CAST(tickets_reply.create_date As Date) date FROM tickets left join tickets_reply on tickets.id=tickets_reply.ticket_id  and tickets_reply.id in (select max(id) from tickets_reply group by ticket_id) left join users on tickets_reply.user_id=users.id where sender_id=' . $school_id . ' and sender_type=' . $sender_type);
                //  $query =$db->query('select tickets.id,tickets.status,users.username,department,type,prority,ticket_text,reply,c.id reply_id FROM tickets left join tickets_reply c ON c.ticket_id = tickets.id AND c.id = (SELECT MAX(c.id) FROM tickets_reply c2 WHERE c2.ticket_id = tickets.id)    left join users on c.user_id=users.id where sender_id='.$school_id .' and sender_type='.$sender_type);
                //  var_dump($query);
                //  exit;
                //        $query=$db->query('Select users.username,a.id, b.* From tickets a left Join( Select 1  From tickets_reply) b On b.ticket_id = a.id left Join  users on b.user_id=users.id  where   (sender_id='.$school_id .' and sender_type='.$sender_type.') ');
                return $query->getResult();
        }
        public function get_schooladminticketreply($ticket_id)
        {


                $db = \Config\Database::connect();
                $builder = $db->table('tickets_reply');
                $builder->select('reply,username,tickets_reply.create_date,role,status');
                $builder->join('users', 'tickets_reply.user_id = users.id');

                $builder->where('tickets_reply.ticket_id', $ticket_id);

                $builder->orderBy('tickets_reply.create_date', 'desc');

                $query   = $builder->get();

                return $query->getResult();
        }
        public function get_ticket($ticket_id)
        {


                $db = \Config\Database::connect();
                $builder = $db->table('tickets');
                $builder->select('ticket_text,department,type,prority,status');


                $builder->where('id', $ticket_id);



                $query   = $builder->get();

                return $query->getRow();
        }
        public function get_last_date($ticket_id)
        {


                $db = \Config\Database::connect();
                $builder = $db->table('tickets');
                $builder->select('ticket_text,department,type,prority');


                $builder->where('id', $ticket_id);



                $query   = $builder->get();

                return $query->getRow();
        }
        public function add_reply($data)
        {


                $db = \Config\Database::connect();
                $builder = $db->table('tickets_reply');
                $builder->insert($data);
                return $db->affectedRows();
        }
        public function closeticket($data, $id)
        {


                $db = \Config\Database::connect();
                $builder = $db->table('tickets');
                $builder->where('id', $id);
                $builder->update($data);
                return $db->affectedRows();
        }
        public function get_parnetadminticket($name = null, $status = null, $date = null, $sender_type, $parnet_id)
        {


                $db = \Config\Database::connect();
                $builder = $db->table('tickets');
                $builder->select('tickets.*,users.id parent_id,users.username,users.email,users.phone,users.city,users.area');
                $builder->join('users', 'tickets.sender_id = users.id');
                // $builder->join('users s', 'tickets.reciver_id = s.id');
                // if (!empty($name) && $sender_type == 2) {
                //         $builder->like('school_name', $name);
                // }
                // if (!empty($name) && $sender_type == 5) {

                //         $builder->like('users.username', $name);
                // }
                // if (strlen($status) != 0) {
                //         $builder->where('tickets.status', $status);
                // }
                // if (!empty($date)) {
                //         $search_where = "CAST(tickets.create_date As Date) = '" . $date . "'";
                //         $builder->where($search_where);
                // }
                // $builder->where('sender_type', $sender_type);
                $builder->distinct();
                $builder->whereIn('users.role', [3]);
                $builder->where('users.id', $parnet_id);

                $query   = $builder->get();

                return $query->getResult();
        }
        public function get_parentsAdminTicket($name = null, $status = null, $date = null, $sender_type = 0)
        {


                $db = \Config\Database::connect();
                $builder = $db->table('tickets');
                $builder->select('users.id parent_id,users.username,users.email,users.phone,users.city,users.area');
                $builder->join('users', 'tickets.sender_id = users.id');
                // $builder->join('users s', 'tickets.reciver_id = s.id','left');

                // if (!empty($name) && $sender_type == 2) {
                //         $builder->like('school_name', $name);
                // }
                // if (!empty($name) && $sender_type == 5) {

                //         $builder->like('users.username', $name);
                // }
                // if (strlen($status) != 0) {
                //         $builder->where('tickets.status', $status);
                // }
                // if (!empty($date)) {
                //         $search_where = "CAST(tickets.create_date As Date) = '" . $date . "'";
                //         $builder->where($search_where);
                // }
                // $builder->where('sender_type', $sender_type);
                // $builder->where('users.id', $parnet_id);
                $builder->distinct();
                $builder->whereIn('users.role', [1, 3]);
                // $builder->whereIn('s.role', [1,3]);
                $query   = $builder->get();

                return $query->getResult();
        }
        public function get_partnersAdminTicket($name = null, $status = null, $date = null, $sender_type = 0)
        {


                $db = \Config\Database::connect();
                $builder = $db->table('tickets');
                $builder->select('users.id,users.username,users.email,users.phone,users.city,users.area');
                $builder->join('users', 'tickets.sender_id = users.id');
                // $builder->join('users s', 'tickets.reciver_id = s.id','left');

                // if (!empty($name) && $sender_type == 2) {
                //         $builder->like('school_name', $name);
                // }
                // if (!empty($name) && $sender_type == 5) {

                //         $builder->like('users.username', $name);
                // }
                // if (strlen($status) != 0) {
                //         $builder->where('tickets.status', $status);
                // }
                // if (!empty($date)) {
                //         $search_where = "CAST(tickets.create_date As Date) = '" . $date . "'";
                //         $builder->where($search_where);
                // }
                // $builder->where('sender_type', $sender_type);
                // $builder->where('users.id', $parnet_id);
                $builder->distinct();
                $builder->whereIn('users.role', [4]);
                // $builder->whereIn('s.role', [1,3]);
                $query   = $builder->get();

                return $query->getResult();
        }
        public function get_parnetschoolticket($name = null, $status = null, $date = null, $sender_type, $parnet_id)
        {


                $db = \Config\Database::connect();
                $builder = $db->table('tickets');
                $builder->select('s.id school_id,school_info.school_name,s.username,school_info.image_url,category,s.email,s.phone,s.city,s.area');
                $builder->join('users', 'tickets.sender_id = users.id AND users.role = 3');
                $builder->join('users s', 'tickets.reciver_id = s.id AND users.role = 3');
                $builder->join('school_info', 's.id = school_info.school_id', '');
                if (!empty($name) && $sender_type == 2) {
                        $builder->like('school_name', $name);
                }
                if (!empty($name) && $sender_type == 3) {

                        $builder->like('users.username', $name);
                }
                if (strlen($status) != 0) {
                        $builder->where('tickets.status', $status);
                }
                if (!empty($date)) {
                        $search_where = "CAST(tickets.create_date As Date) = '" . $date . "'";
                        $builder->where($search_where);
                }
                $builder->where('sender_type', $sender_type);
                $builder->where('users.id', $parnet_id);
                $builder->distinct();

                $query   = $builder->get();

                return $query->getResult();
        }
        public function get_parentschoolicketbyschool($school_id, $parent_id, $sender_type)
        {


                $db = \Config\Database::connect();

                $query = $db->query('select tickets.id,tickets.status,users.username,department,type,prority,ticket_text,reply,CAST(tickets_reply.create_date As Date) date FROM tickets left join tickets_reply on tickets.id=tickets_reply.ticket_id  and tickets_reply.id in (select max(id) from tickets_reply group by ticket_id) left join users on tickets_reply.user_id=users.id where sender_id=' . $parent_id . ' and reciver_id=' . $school_id . ' and sender_type=' . $sender_type);

                return $query->getResult();
        }
        public function getparentadminticketbyid($parent_id, $sender_type, $limit, $page, $ticket_name, $status, $date)
        {


                $db = \Config\Database::connect();

                $sql = 'select tickets.id,tickets.status,users.username,department,type,prority,ticket_text,reply,CAST(tickets_reply.create_date As Date) date FROM tickets left join tickets_reply on tickets.id=tickets_reply.ticket_id  and tickets_reply.id in (select max(id) from tickets_reply group by ticket_id) left join users on tickets_reply.user_id=users.id where sender_id=' . $parent_id . ' and sender_type=' . $sender_type;
                if (!empty($ticket_name)) {

                        $sql .= " and tickets.ticket_text like '%$ticket_name%'";
                }
                if (strlen($status) != 0) {

                        $sql .= " and tickets.status=$status";
                }
                if (!empty($date)) {

                        $sql .= " and CAST(tickets.create_date As Date) = '" . $date . "'";
                }
                $query = $db->query($sql);
                return $query->getResult();
        }
        public function get_parnetpartnerticket($name = null, $status = null, $date = null, $sender_type, $parnet_id)
        {


                $db = \Config\Database::connect();
                $builder = $db->table('tickets');
                $builder->select('s.id partner_id,s.username,s.email,s.phone,s.city,s.area');
                $builder->join('users', 'tickets.sender_id = users.id');
                $builder->join('users s', 'tickets.reciver_id = s.id');

                if (!empty($name) && $sender_type == 2) {
                        $builder->like('school_name', $name);
                }
                if (!empty($name) && $sender_type == 6) {

                        $builder->like('s.username', $name);
                }
                if (strlen($status) != 0) {
                        $builder->where('tickets.status', $status);
                }
                if (!empty($date)) {
                        $search_where = "CAST(tickets.create_date As Date) = '" . $date . "'";
                        $builder->where($search_where);
                }
                $builder->where('sender_type', $sender_type);
                $builder->where('users.id', $parnet_id);
                $builder->distinct();
                $query   = $builder->get();

                return $query->getResult();
        }

        public function getparentpartnerticketbyid($page, $limit, $parent_id, $sender_type, $partner_id)
        {


                $db = \Config\Database::connect();

                $query = $db->query('select tickets.id,tickets.status,users.username,department,type,prority,ticket_text,reply,CAST(tickets_reply.create_date As Date) date FROM tickets left join tickets_reply on tickets.id=tickets_reply.ticket_id  and tickets_reply.id in (select max(id) from tickets_reply group by ticket_id) left join users on tickets_reply.user_id=users.id where sender_id=' . $parent_id . ' and reciver_id=' . $partner_id . ' and sender_type=' . $sender_type);

                return $query->getResult();
        }

        public function get_schooladminticketbyschoolid($school_id, $sender_type, $limit, $page, $ticket = null, $date = null, $status = null)
        {


                $db = \Config\Database::connect();


                $sql = 'select tickets.id,tickets.status,users.username,department,type,prority,ticket_text,reply,CAST(tickets_reply.create_date As Date) date FROM tickets left join tickets_reply on tickets.id=tickets_reply.ticket_id  and tickets_reply.id in (select max(id) from tickets_reply group by ticket_id) left join users on tickets_reply.user_id=users.id where sender_id=' . $school_id . ' and sender_type=' . $sender_type;
                if (!empty($ticket)) {

                        $sql .= " and tickets.ticket_text like '%$ticket%'";
                }
                if (strlen($status) != 0) {

                        $sql .= " and tickets.status=$status";
                }
                if (!empty($date)) {

                        $sql .= " and CAST(tickets.create_date As Date) = '" . $date . "'";
                }
                $query = $db->query($sql);
                //  $query =$db->query('select tickets.id,tickets.status,users.username,department,type,prority,ticket_text,reply,c.id reply_id FROM tickets left join tickets_reply c ON c.ticket_id = tickets.id AND c.id = (SELECT MAX(c.id) FROM tickets_reply c2 WHERE c2.ticket_id = tickets.id)    left join users on c.user_id=users.id where sender_id='.$school_id .' and sender_type='.$sender_type);
                //  var_dump($query);
                //  exit;
                //        $query=$db->query('Select users.username,a.id, b.* From tickets a left Join( Select 1  From tickets_reply) b On b.ticket_id = a.id left Join  users on b.user_id=users.id  where   (sender_id='.$school_id .' and sender_type='.$sender_type.') ');
                return $query->getResult();
        }

        public function getSchoolAdminTicketBySchoolId($school_id)
        {
                $db = \Config\Database::connect();
                $builder = $db->table('tickets');
                $builder->select(' tickets.id,tickets.status,department,
                type,prority,ticket_text,reply,CAST(tickets_reply.create_date As Date) date,
                 users.id as user_id, school_info.school_id,school_info.school_name,users.username,
                 school_info.image_url,category,users.email,users.phone,users.city,users.area');
                $builder->join('users', 'tickets.sender_id = users.id');
                $builder->join('users s', 'tickets.reciver_id = s.id');
                $builder->join('school_info', '(tickets.sender_id = school_info.school_id OR tickets.reciver_id = school_info.school_id)');
                $builder->join('tickets_reply ', ' (tickets.id=tickets_reply.ticket_id  and tickets_reply.id in (select max(id) from tickets_reply group by ticket_id))', 'left');

                $builder->whereIn('sender_type', [1, 2]);
                $builder->whereIn('users.role', [1, 2]);
                $builder->whereIn('s.role', [1, 2]);
                $builder->where('school_info.school_id', $school_id);

                $query   = $builder->get();

                return $query->getResult();
        }

        public function get_schoolparentticketbyschoolid($school_id, $sender_type, $limit, $page, $parent_name = null, $date = null, $status = null)
        {
                $db = \Config\Database::connect();
                $builder = $db->table('tickets');
                $builder->select('users.id,users.email,users.phone,users.username');
                $builder->join('users', 'tickets.sender_id = users.id');
                $builder->where('reciver_id', $school_id);
                $builder->where('sender_type', $sender_type);

                if (!empty($parent_name)) {
                        $builder->like('users.username', $parent_name);
                }

                if (strlen($status) != 0) {
                        $builder->where('tickets.status', $status);
                }

                if (!empty($date)) {
                        $search_where = "CAST(tickets.create_date As Date) = '" . $date . "'";
                        $builder->where($search_where);
                }

                $builder->distinct();
                $query = $builder->get();

                return $query->getResult();



                $db = \Config\Database::connect();
                $sql = 'select users.id,users.email,users.phone,users.username,department,type,prority,ticket_text,tickets.status FROM tickets  
                join users on tickets.sender_id=users.id 
                where reciver_id=' . $school_id . ' and sender_type=' . $sender_type;
                if (!empty($parent_name)) {
                        $sql .= " and users.username like '%$parent_name%'";
                }
                if (strlen($status) != 0) {
                        $sql .= " and tickets.status=$status";
                }
                if (!empty($date)) {

                        $sql .= " and CAST(tickets.create_date As Date) = '" . $date . "'";
                }
                $query = $db->query($sql);
                return $query->getResult();
        }
        public function get_schoolparentticketbyparenttid($school_id, $parent_id, $sender_type, $limit, $page, $ticket = null, $date = null, $status = null)
        {


                $db = \Config\Database::connect();


                $sql = 'select tickets.id,tickets.status,users.username,department,type,prority,ticket_text,reply,CAST(tickets_reply.create_date As Date) date FROM tickets left join tickets_reply on tickets.id=tickets_reply.ticket_id  and tickets_reply.id in (select max(id) from tickets_reply group by ticket_id) left join users on tickets_reply.user_id=users.id where sender_id=' . $school_id . ' and reciver_id=' . $parent_id . ' and sender_type=' . $sender_type;

                $query = $db->query($sql);
                //  $query =$db->query('select tickets.id,tickets.status,users.username,department,type,prority,ticket_text,reply,c.id reply_id FROM tickets left join tickets_reply c ON c.ticket_id = tickets.id AND c.id = (SELECT MAX(c.id) FROM tickets_reply c2 WHERE c2.ticket_id = tickets.id)    left join users on c.user_id=users.id where sender_id='.$school_id .' and sender_type='.$sender_type);
                //  var_dump($query);
                //  exit;
                //        $query=$db->query('Select users.username,a.id, b.* From tickets a left Join( Select 1  From tickets_reply) b On b.ticket_id = a.id left Join  users on b.user_id=users.id  where   (sender_id='.$school_id .' and sender_type='.$sender_type.') ');
                return $query->getResult();
        }
        public function get_schoolparentticket($school_id, $parent_id, $sender_type, $limit, $page, $ticket = null, $date = null, $status = null)
        {


                $db = \Config\Database::connect();


                $sql = 'select tickets.id,tickets.status,users.username,department,type,prority,ticket_text,reply,CAST(tickets_reply.create_date As Date) date FROM tickets 
                left join tickets_reply on tickets.id=tickets_reply.ticket_id  and tickets_reply.id in (select max(id) from tickets_reply group by ticket_id) left join users on tickets_reply.user_id=users.id where sender_id=' . $parent_id . ' and reciver_id=' . $school_id . ' and sender_type=' . $sender_type;

                $query = $db->query($sql);
                //  $query =$db->query('select tickets.id,tickets.status,users.username,department,type,prority,ticket_text,reply,c.id reply_id FROM tickets left join tickets_reply c ON c.ticket_id = tickets.id AND c.id = (SELECT MAX(c.id) FROM tickets_reply c2 WHERE c2.ticket_id = tickets.id)    left join users on c.user_id=users.id where sender_id='.$school_id .' and sender_type='.$sender_type);
                //  var_dump($query);
                //  exit;
                //        $query=$db->query('Select users.username,a.id, b.* From tickets a left Join( Select 1  From tickets_reply) b On b.ticket_id = a.id left Join  users on b.user_id=users.id  where   (sender_id='.$school_id .' and sender_type='.$sender_type.') ');
                return $query->getResult();
        }
        public function get_partnersschoolticket($name = null, $status = null, $date = null, $sender_type, $partner_id)
        {


                $db = \Config\Database::connect();
                $builder = $db->table('tickets');
                $builder->select('users.id school_id,school_info.school_name,users.username,school_info.image_url,category,users.email,users.phone,users.city,users.area');
                $builder->join('users', 'tickets.sender_id = users.id');
                $builder->join('users s', 'tickets.reciver_id = s.id');
                $builder->join('school_info', 's.id = school_info.school_id', '');
                if (!empty($name) && $sender_type == 4) {
                        $builder->like('school_name', $name);
                }
                if (!empty($name) && $sender_type == 6) {
                        $builder->like('users.username', $name);
                }

                if (strlen($status) != 0) {
                        $builder->where('tickets.status', $status);
                }
                if (!empty($date)) {
                        $search_where = "CAST(tickets.create_date As Date) = '" . $date . "'";
                        $builder->where($search_where);
                }
                $builder->where('sender_type', $sender_type);
                $builder->where('s.id', $partner_id);

                $query   = $builder->get();

                return $query->getResult();
        }
        public function get_partnersparentsticket($name = null, $status = null, $date = null, $sender_type, $partner_id)
        {


                $db = \Config\Database::connect();
                $builder = $db->table('tickets');
                $builder->select('users.id parent_id,users.username,users.email,users.phone,users.city,users.area');
                $builder->join('users', 'tickets.sender_id = users.id');
                $builder->join('users s', 'tickets.reciver_id = s.id');

                if (!empty($name) && $sender_type == 4) {
                        $builder->like('school_name', $name);
                }
                if (!empty($name) && $sender_type == 6) {
                        $builder->like('users.username', $name);
                }

                if (strlen($status) != 0) {
                        $builder->where('tickets.status', $status);
                }
                if (!empty($date)) {
                        $search_where = "CAST(tickets.create_date As Date) = '" . $date . "'";
                        $builder->where($search_where);
                }
                $builder->where('sender_type', $sender_type);
                $builder->where('s.id', $partner_id);
                $builder->distinct();
                $query   = $builder->get();

                return $query->getResult();
        }
        public function get_schoolpartnerticketbyschoolid($school_id, $sender_type, $limit, $page, $parent_name = null, $date = null, $status = null)
        {



                $db = \Config\Database::connect();


                $sql = 'select s.id,users.email,users.phone,users.username,department,type,prority,ticket_text,tickets.status FROM tickets  join users on tickets.sender_id=users.id join users s on tickets.reciver_id=s.id where sender_id=' . $school_id . ' and sender_type=' . $sender_type;
                if (!empty($parent_name)) {

                        $sql .= " and users.username like '%$parent_name%'";
                }
                if (strlen($status) != 0) {

                        $sql .= " and tickets.status=$status";
                }
                if (!empty($date)) {

                        $sql .= " and CAST(tickets.create_date As Date) = '" . $date . "'";
                }
                $query = $db->query($sql);
                return $query->getResult();
        }
        public function add_ticket($data)
        {
                $db = \Config\Database::connect();
                $builder = $db->table('tickets');
                return $builder->insert($data);
        }
}
