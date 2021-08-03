<?php

namespace App\Controllers;

class ParentsView extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function home()
    {
        return view('parents/home');
    }


    public function examsTables()
    {
        return view('parents/school-management/exams-tables');
    }


    public function globalTable()
    {
        return view('parents/school-management/global-table');
    }


    public function questionnaires()
    {
        return view('parents/school-management/questionnaires');
    }


    public function forms()
    {
        return view('parents/school-management/forms');
    }


    public function schoolNotifications()
    {
        return view('parents/school-management/notifications');
    }





    public function messagingSystemManagers()
    {
        return view('parents/technical-support/system-managers-messaging');
    }


    public function messagingSchoolManagement()
    {
        return view('parents/technical-support/school-managment-messaging');
    }



    public function partnersOffers()
    {
        return view('parents/partners/offers');
    }


    public function viewTicket($seg6)
    {
        return view('parents/technical-support/tickets', ['id' => $seg6]);
    }



    public function partnersSupport()
    {
        // dd($this->session->userdata('item'));
        return view('parents/partners/support');
    }




    public function viewPartnerTicket($seg6)
    {
        return view('parents/partners/tickets', ['id' => $seg6]);
    }









    // public function messageForms()
    // {
    // 	return view('parents/system-settings/global-messages-forms');
    // }


    // public function studentsInfo()
    // {
    //     return view('parents/basics info/students-info');
    // }



    // public function teachersInfo()
    // {
    //     return view('parents/basics info/teachers-info');
    // }


    // public function employeesInfo()
    // {
    //     return view('parents/basics info/employees-info');
    // }



    // public function subjectsInfo()
    // {
    //     return view('parents/basics info/subjects-info');
    // }




    // public function absenceAndTardiness()
    // {
    //     return view('parents/notifications/absence-tardiness');
    // }








    // public function absenceAndTardinessArchive()
    // {
    //     return view('parents/archive/absence-tardiness');
    // }




    // public function publicMesssagesArchive()
    // {
    //     return view('parents/archive/public-messages');
    // }





    // public function parentsResponceArchive()
    // {
    //     return view('parents/parents-responce/responce-archive');
    // }




    // public function systemManagersTichnicalSupportTickets()
    // {
    //     return view('parents/technical-support-tickets/ss');
    // }





    // public function parentsTichnicalSupportTickets()
    // {
    //     return view('parents/technical-support-tickets/parents');
    // }









    // public function addQuestionnaires()
    // {
    //     return view('parents/services/add-questionnaires');
    // }












    //--------------------------------------------------------------------

}
