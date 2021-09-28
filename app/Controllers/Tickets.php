<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

use CodeIgniter\API\ResponseTrait;
use App\Models\TicketsModel;
use App\Models\UserModel;
use App\Models\MessaingModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\Check;

class Tickets extends BaseController
{
    use ResponseTrait;
    public function GetAdminSchoolsTickets()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_name = $this->request->getVar('school_name');
                $status = $this->request->getVar('status');
                $date = $this->request->getVar('date');
                $model = new TicketsModel();
                $result = $model->get_schooladminticket($school_name, $status, $date, 1);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }

    public function GetAdminSchoolsTicketsBySchoolId()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');

                if (!$page) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$limit) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                    return $this->respond($result, 400);
                    exit;
                }

                $model = new TicketsModel();
                $a = array();
                $result = $model->get_schooladminticketbyschool($school_id, 1, $limit, $page);
                if (!empty($result)) {
                    $i = 0;
                    foreach ($result as $a) {
                        $r[$i]['id'] = $a->id;
                        if ($a->status == 0) {
                            $r[$i]['status'] = 'مفتوحة';
                        }
                        if ($a->status == 1) {
                            $r[$i]['status'] = 'مغلقة';
                        }
                        $r[$i]['username'] = $a->username;
                        $r[$i]['department'] = $a->department;
                        $r[$i]['type'] = $a->type;
                        $r[$i]['prority'] = $a->prority;
                        $r[$i]['ticket_text'] = $a->ticket_text;
                        $r[$i]['reply'] = $a->reply;
                        $r[$i]['date'] = $a->date;
                        $i++;
                    }
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $r);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetTicketsReply()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $ticket_id = $this->request->getVar('ticket_id');
                if (!$ticket_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  رقم التذكرة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new TicketsModel();
                $result = $model->get_schooladminticketreply($ticket_id);
                $ticket = $model->get_ticket($ticket_id);

                $tickets = array();
                if (!empty($result)) {
                    $role = '';
                    $i = 0;
                    foreach ($result as $item) {
                        $tickets['ticket_text'] = $ticket->ticket_text;
                        $tickets['department'] = $ticket->department;
                        $tickets['type'] = $ticket->type;
                        $tickets['prority'] = $ticket->prority;
                        $tickets['last_date'] = $result[0]->create_date;
                        if ($ticket->status == 0) {
                            $tickets['status'] = 'مفتوحة';
                        }
                        if ($ticket->status == 1) {
                            $tickets['status'] = 'مغلقة';
                        }
                        $tickets['satus_tikcet'] = $ticket->status;
                        if ($item->role == 1) {
                            $role = 'مدير النظام';
                        }
                        if ($item->role == 2) {
                            $role = 'مدرسة';
                        }
                        if ($item->role == 3) {
                            $role = 'ولي أمر';
                        }
                        if ($item->role == 4) {
                            $role = 'شريك نجاح';
                        }
                        $tickets['reply'][] = array('reply' => $item->reply, 'username' => $item->username, 'date' => $item->create_date, 'role' => $role);
                    }
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $tickets);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function ReplyTicket()
    {


        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $ticket_id = $this->request->getVar('ticket_id');
                $user_id = $this->request->getVar('user_id');
                $reply = $this->request->getVar('reply');
                if (!$ticket_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  رقم التذكرة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$user_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل   المستخدم ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$reply) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الرد  ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new TicketsModel();
                $data = array('user_id' => $user_id, 'ticket_id' => $ticket_id, 'reply' => $reply);
                $result = $model->add_reply($data);

                if ($result == 1) {

                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function CloseTicket()
    {


        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $input = $this->request->getRawInput();;
                $id = $this->request->getVar('id');
                $status = $this->request->getVar('status');
                $user_id = $this->request->getVar('user_id');
                if (!$id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  التعرفة');
                    return $this->respond($result, 400);
                    exit;
                }
                if (strlen($status) == 0) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الحالة');
                    return $this->respond($result, 400);
                    exit;
                }
                if (strlen($user_id) == 0) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المستخدم');
                    return $this->respond($result, 400);
                    exit;
                }
                $data = array('status' => $status, 'user_close_ticket' => $user_id);

                $model = new TicketsModel();
                $update = $model->closeticket($data, $id);
                if ($update == 1) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetSchoolsParentsTickets()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_name = $this->request->getVar('school_name');
                $status = $this->request->getVar('status');
                $date = $this->request->getVar('date');
                $model = new TicketsModel();
                $result = $model->get_schooladminticket($school_name, $status, $date, 2);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetSchoolsParentsTicketsBySchoolId()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new TicketsModel();
                $result = $model->get_schooladminticketbyschool($school_id, 2);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetAdminPartnersTicketsById()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $partner_id = $this->request->getVar('partner_id');
                if (!$partner_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الشريك ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new TicketsModel();
                $result = $model->get_schooladminticketbyschool($partner_id, 3);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetPartnersAdminTickets()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $partner_name = $this->request->getVar('partner_name');
                $status = $this->request->getVar('status');
                $date = $this->request->getVar('date');
                $model = new TicketsModel();
                $result = $model->get_schooladminticket($partner_name, $status, $date, 3);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetSchoolPartnersTicketsById()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new TicketsModel();
                $result = $model->get_schooladminticketbyschool($school_id, 4);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetParentAdminTicketsById()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $parent_id = $this->request->getVar('parent_id');
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');

                if (!$page) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$limit) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                    return $this->respond($result, 400);
                    exit;
                }
                $ticket_name = $this->request->getVar('ticket_name');
                $status = $this->request->getVar('status');
                $date = $this->request->getVar('date');
                if (!$parent_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  ولي الأمر ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new TicketsModel();
                $result = $model->getparentadminticketbyid($parent_id, 5, $limit, $page, $ticket_name, $status, $date);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetParentsSchoolsTickets()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_name = $this->request->getVar('school_name');
                $status = $this->request->getVar('status');
                $date = $this->request->getVar('date');
                $parent_id = $this->request->getVar('parent_id');
                if (!$parent_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل ولي الأمر ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new TicketsModel();
                $result = $model->get_parnetschoolticket($school_name, $status, $date, 2, $parent_id);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetParentsSchoolsTicketsBySchoolId()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new TicketsModel();
                $parent_id = $this->request->getVar('parent_id');
                if (!$parent_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل ولي الأمر ');
                    return $this->respond($result, 400);
                    exit;
                }
                $result = $model->get_parentschoolicketbyschool($school_id, $parent_id, 2);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetParentsAdminTickets()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $parent_name = $this->request->getVar('parent_name');
                $status = $this->request->getVar('status');
                $date = $this->request->getVar('date');
                $parent_id = $this->request->getVar('parent_id');
                if (!$parent_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل ولي الأمر ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new TicketsModel();
                $result = $model->get_parnetadminticket($parent_name, $status, $date, 5, $parent_id);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }

    public function GetParentsPartnersTickets()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $partner_name = $this->request->getVar('partner_name');
                $status = $this->request->getVar('status');
                $date = $this->request->getVar('date');
                $parent_id = $this->request->getVar('parent_id');
                if (!$parent_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل ولي الأمر ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new TicketsModel();
                $result = $model->get_parnetpartnerticket($partner_name, $status, $date, 6, $parent_id);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetParentPartnerTicketsById()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $parent_id = $this->request->getVar('parent_id');
                if (!$parent_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  ولي الأمر ');
                    return $this->respond($result, 400);
                    exit;
                }
                $partner_id = $this->request->getVar('partner_id');
                if (!$partner_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل   الشريك ');
                    return $this->respond($result, 400);
                    exit;
                }
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');

                if (!$page) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$limit) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                    return $this->respond($result, 400);
                    exit;
                }
                $model = new TicketsModel();
                $result = $model->getparentpartnerticketbyid($page, $limit, $parent_id, 6, $partner_id);
                if (!empty($result)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetSchoolsAdminTicketsBySchoolId()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');

                if (!$page) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$limit) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                    return $this->respond($result, 400);
                    exit;
                }
                $ticket_name = $this->request->getVar('ticket_name');
                $status = $this->request->getVar('status');
                $date = $this->request->getVar('date');
                $model = new TicketsModel();
                $a = array();
                $result = $model->get_schooladminticketbyschoolid($school_id, 1, $limit, $page, $ticket_name, $date, $status);
                if (!empty($result)) {
                    $i = 0;
                    foreach ($result as $a) {
                        $r[$i]['id'] = $a->id;
                        if ($a->status == 0) {
                            $r[$i]['status'] = 'مفتوحة';
                        }
                        if ($a->status == 1) {
                            $r[$i]['status'] = 'مغلقة';
                        }
                        $r[$i]['username'] = $a->username;
                        $r[$i]['department'] = $a->department;
                        $r[$i]['type'] = $a->type;
                        $r[$i]['prority'] = $a->prority;
                        $r[$i]['ticket_text'] = $a->ticket_text;
                        $r[$i]['reply'] = $a->reply;
                        $r[$i]['date'] = $a->date;
                        $i++;
                    }
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $r);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetSchoolsParentTicketsBySchoolId()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');

                if (!$page) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$limit) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                    return $this->respond($result, 400);
                    exit;
                }
                $parent_name = $this->request->getVar('parent_name');
                $status = $this->request->getVar('status');
                $date = $this->request->getVar('date');
                $model = new TicketsModel();
                $a = array();
                $result = $model->get_schoolparentticketbyschoolid($school_id, 2, $limit, $page, $parent_name, $date, $status);
                if (!empty($result)) {
                    $i = 0;
                    foreach ($result as $a) {
                        $r[$i]['id'] = $a->id;
                        if ($a->status == 0) {
                            $r[$i]['status'] = 'مفتوحة';
                        }
                        if ($a->status == 1) {
                            $r[$i]['status'] = 'مغلقة';
                        }
                        $r[$i]['username'] = $a->username;
                        $r[$i]['email'] = $a->email;
                        $r[$i]['phone'] = $a->phone;
                        $r[$i]['department'] = $a->department;
                        $r[$i]['type'] = $a->type;
                        $r[$i]['prority'] = $a->prority;
                        $r[$i]['ticket_text'] = $a->ticket_text;


                        $i++;
                    }
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $r);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetSchoolParentTicketsByParentId()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $parent_id = $this->request->getVar('parent_id');
                if (!$parent_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  ولي الأمر ');
                    return $this->respond($result, 400);
                    exit;
                }
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');

                if (!$page) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$limit) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                    return $this->respond($result, 400);
                    exit;
                }

                $model = new TicketsModel();
                $a = array();
                $result = $model->get_schoolparentticket($school_id, $parent_id, 2, $limit, $page);
                if (!empty($result)) {
                    $i = 0;
                    foreach ($result as $a) {
                        $r[$i]['id'] = $a->id;
                        if ($a->status == 0) {
                            $r[$i]['status'] = 'مفتوحة';
                        }
                        if ($a->status == 1) {
                            $r[$i]['status'] = 'مغلقة';
                        }
                        $r[$i]['username'] = $a->username;
                        $r[$i]['department'] = $a->department;
                        $r[$i]['type'] = $a->type;
                        $r[$i]['prority'] = $a->prority;
                        $r[$i]['ticket_text'] = $a->ticket_text;
                        $r[$i]['reply'] = $a->reply;
                        $r[$i]['date'] = $a->date;
                        $i++;
                    }
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $r);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetSchoolsPartnersTicketsBySchoolId()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');

                if (!$page) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$limit) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                    return $this->respond($result, 400);
                    exit;
                }
                $partner_name = $this->request->getVar('partner_name');
                $status = $this->request->getVar('status');
                $date = $this->request->getVar('date');
                $model = new TicketsModel();
                $a = array();
                $result = $model->get_schoolpartnerticketbyschoolid($school_id, 4, $limit, $page, $partner_name, $date, $status);
                if (!empty($result)) {
                    $i = 0;
                    foreach ($result as $a) {
                        $r[$i]['id'] = $a->id;
                        if ($a->status == 0) {
                            $r[$i]['status'] = 'مفتوحة';
                        }
                        if ($a->status == 1) {
                            $r[$i]['status'] = 'مغلقة';
                        }
                        $r[$i]['username'] = $a->username;

                        $r[$i]['email'] = $a->username;
                        $r[$i]['phone'] = $a->department;
                        $r[$i]['type'] = $a->type;
                        $r[$i]['prority'] = $a->prority;
                        $r[$i]['ticket_text'] = $a->ticket_text;


                        $i++;
                    }
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $r);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetSchoolPartnersTicketsByPartnerId()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $partner_id = $this->request->getVar('partner_id');
                if (!$partner_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل   الشريك ');
                    return $this->respond($result, 400);
                    exit;
                }
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');

                if (!$page) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$limit) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                    return $this->respond($result, 400);
                    exit;
                }

                $model = new TicketsModel();
                $a = array();
                $result = $model->get_schoolparentticketbyparenttid($school_id, $partner_id, 4, $limit, $page);
                if (!empty($result)) {
                    $i = 0;
                    foreach ($result as $a) {
                        $r[$i]['id'] = $a->id;
                        if ($a->status == 0) {
                            $r[$i]['status'] = 'مفتوحة';
                        }
                        if ($a->status == 1) {
                            $r[$i]['status'] = 'مغلقة';
                        }
                        $r[$i]['username'] = $a->username;
                        $r[$i]['department'] = $a->department;
                        $r[$i]['type'] = $a->type;
                        $r[$i]['prority'] = $a->prority;
                        $r[$i]['ticket_text'] = $a->ticket_text;
                        $r[$i]['reply'] = $a->reply;
                        $r[$i]['date'] = $a->date;
                        $i++;
                    }
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $r);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetPartnersSchoolsTicketsByPartnerId()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $partner_id = $this->request->getVar('partner_id');
                if (!$partner_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الشريك ');
                    return $this->respond($result, 400);
                    exit;
                }
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');

                if (!$page) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$limit) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                    return $this->respond($result, 400);
                    exit;
                }
                $school_name = $this->request->getVar('school_name');
                $status = $this->request->getVar('status');
                $date = $this->request->getVar('date');
                $model = new TicketsModel();
                $a = array();
                $result = $model->get_partnersschoolticket($school_name, $status, $date, 4, $partner_id);
                if (!empty($result)) {

                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetPartnersAdminTicketsBypartnerId()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $partner_id = $this->request->getVar('partner_id');
                if (!$partner_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');

                if (!$page) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$limit) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                    return $this->respond($result, 400);
                    exit;
                }
                $ticket_name = $this->request->getVar('ticket_name');
                $status = $this->request->getVar('status');
                $date = $this->request->getVar('date');
                $model = new TicketsModel();
                $a = array();
                $result = $model->get_schooladminticketbyschoolid($partner_id, 3, $limit, $page, $ticket_name, $date, $status);
                if (!empty($result)) {
                    $i = 0;
                    foreach ($result as $a) {
                        $r[$i]['id'] = $a->id;
                        if ($a->status == 0) {
                            $r[$i]['status'] = 'مفتوحة';
                        }
                        if ($a->status == 1) {
                            $r[$i]['status'] = 'مغلقة';
                        }
                        $r[$i]['username'] = $a->username;
                        $r[$i]['department'] = $a->department;
                        $r[$i]['type'] = $a->type;
                        $r[$i]['prority'] = $a->prority;
                        $r[$i]['ticket_text'] = $a->ticket_text;
                        $r[$i]['reply'] = $a->reply;
                        $r[$i]['date'] = $a->date;
                        $i++;
                    }
                    $data = array('code' => 1, 'msg' => 'success', 'data' => $r);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetPartnersparentsTicketsByPartnerId()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $partner_id = $this->request->getVar('partner_id');
                if (!$partner_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الشريك ');
                    return $this->respond($result, 400);
                    exit;
                }
                $parent_id = $this->request->getVar('parent_id');
                if (!$parent_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  ولي الأمر ');
                    return $this->respond($result, 400);
                    exit;
                }
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');

                if (!$page) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$limit) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                    return $this->respond($result, 400);
                    exit;
                }

                $model = new TicketsModel();
                $a = array();
                $result = $model->get_schoolparentticketbyparenttid($parent_id, $partner_id, 6, $limit, $page);
                if (!empty($result)) {

                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function GetPartnersparentsTickets()
    {


        if ($this->request->getMethod() == 'get') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $partner_id = $this->request->getVar('partner_id');
                if (!$partner_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل  الشريك');
                    return $this->respond($result, 400);
                    exit;
                }
                $page = $this->request->getVar('page');

                $limit = $this->request->getVar('limit');

                if (!$page) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل الصفحة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$limit) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل عدد العناصر ');
                    return $this->respond($result, 400);
                    exit;
                }
                $parent_name = $this->request->getVar('parent_name');
                $status = $this->request->getVar('status');
                $date = $this->request->getVar('date');
                $model = new TicketsModel();
                $a = array();
                $result = $model->get_partnersparentsticket($parent_name, $status, $date, 6, $partner_id);
                if (!empty($result)) {

                    $data = array('code' => 1, 'msg' => 'success', 'data' => $result);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => 1, 'msg' => 'no data found', 'data' => []);
                    return    $this->respond($data, 200);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be GET', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function AddSchoolAdminTicket()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $ticket_text = $this->request->getVar('ticket_text');
                $department = $this->request->getVar('department');
                $type = $this->request->getVar('type');
                $prority = $this->request->getVar('prority');
                $school_id = $this->request->getVar('school_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$ticket_text) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل التذكرة');
                    return $this->respond($result, 400);
                    exit;
                }



                $model = new TicketsModel();
                $data = array('ticket_text' => $ticket_text, 'department' => $department, 'type' => $type, 'prority' => $prority, 'sender_id' => $school_id, 'sender_type' => 1);
                if ($model->add_ticket($data)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function AddParentSchoolTicket()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $ticket_text = $this->request->getVar('ticket_text');
                $department = $this->request->getVar('department');
                $type = $this->request->getVar('type');
                $prority = $this->request->getVar('prority');
                $school_id = $this->request->getVar('school_id');
                $parent_id = $this->request->getVar('parent_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$parent_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل ولي الأمر ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$ticket_text) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل التذكرة');
                    return $this->respond($result, 400);
                    exit;
                }



                $model = new TicketsModel();
                $data = array('ticket_text' => $ticket_text, 'department' => $department, 'type' => $type, 'prority' => $prority, 'sender_id' => $parent_id, 'reciver_id' => $school_id, 'sender_type' => 2);
                if ($model->add_ticket($data)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function AddPartnerAdminTicket()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $ticket_text = $this->request->getVar('ticket_text');
                $department = $this->request->getVar('department');
                $type = $this->request->getVar('type');
                $prority = $this->request->getVar('prority');
                $partner_id = $this->request->getVar('partner_id');

                if (!$partner_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل شريك النجاح ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$ticket_text) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل التذكرة');
                    return $this->respond($result, 400);
                    exit;
                }



                $model = new TicketsModel();
                $data = array('ticket_text' => $ticket_text, 'department' => $department, 'type' => $type, 'prority' => $prority, 'sender_id' => $partner_id, 'sender_type' => 3);
                if ($model->add_ticket($data)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function AddSchoolPartnerTicket()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $ticket_text = $this->request->getVar('ticket_text');
                $department = $this->request->getVar('department');
                $type = $this->request->getVar('type');
                $prority = $this->request->getVar('prority');
                $school_id = $this->request->getVar('school_id');
                $partner_id = $this->request->getVar('partner_id');
                if (!$school_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل المدرسة ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$partner_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل شريك النجاح');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$ticket_text) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل التذكرة');
                    return $this->respond($result, 400);
                    exit;
                }



                $model = new TicketsModel();
                $data = array('ticket_text' => $ticket_text, 'department' => $department, 'type' => $type, 'prority' => $prority, 'sender_id' => $school_id, 'reciver_id' => $partner_id, 'sender_type' => 4);
                if ($model->add_ticket($data)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function AddParentAdminTicket()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $ticket_text = $this->request->getVar('ticket_text');
                $department = $this->request->getVar('department');
                $type = $this->request->getVar('type');
                $prority = $this->request->getVar('prority');
                $parent_id = $this->request->getVar('parent_id');

                if (!$parent_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل ولي الأمر ');
                    return $this->respond($result, 400);
                    exit;
                }

                if (!$ticket_text) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل التذكرة');
                    return $this->respond($result, 400);
                    exit;
                }



                $model = new TicketsModel();
                $data = array('ticket_text' => $ticket_text, 'department' => $department, 'type' => $type, 'prority' => $prority, 'sender_id' => $parent_id, 'sender_type' => 5);
                if ($model->add_ticket($data)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
    public function AddParentPartnersTicket()
    {

        if ($this->request->getMethod() == 'post') {
            $check = new Check(); // Create an instance
            $result = $check->check();

            if ($result['code'] == 1) {
                $ticket_text = $this->request->getVar('ticket_text');
                $department = $this->request->getVar('department');
                $type = $this->request->getVar('type');
                $prority = $this->request->getVar('prority');
                $parent_id = $this->request->getVar('parent_id');
                $partner_id = $this->request->getVar('partner_id');
                if (!$parent_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل ولي الأمر ');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$partner_id) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل شريك النجاح');
                    return $this->respond($result, 400);
                    exit;
                }
                if (!$ticket_text) {
                    $result = array('code' => -1, 'msg' => 'الرجاء إدخال حقل التذكرة');
                    return $this->respond($result, 400);
                    exit;
                }



                $model = new TicketsModel();
                $data = array('ticket_text' => $ticket_text, 'department' => $department, 'type' => $type, 'prority' => $prority, 'sender_id' => $parent_id, 'reciver_id' => $partner_id, 'sender_type' => 6);
                if ($model->add_ticket($data)) {
                    $data = array('code' => 1, 'msg' => 'success', 'data' => []);
                    return    $this->respond($data, 200);
                } else {
                    $data = array('code' => -1, 'msg' => 'fail', 'data' => []);
                    return    $this->respond($data, 400);
                }
            } else {
                $result = array(
                    'code' => $result['code'], 'msg' => $result['messages'],
                );
                return $this->respond($result, 400);
            }
        } else {
            $data = array('code' => -1, 'msg' => 'Method must be POST', 'data' => []);
            return    $this->respond($data, 200);
        }
    }
}
