<?php

namespace App\Controllers;

class PartnerView extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function home()
    {
        return view('partner/home');
    }


    public function partnersOffers()
    {
        return view('partner/basic-info/offers');
    }


    public function messagingSystemManagers()
    {
        return view('partner/technical-support/system-managers-messaging');
    }


    public function messagingSchoolManagement()
    {
        return view('partner/technical-support/school-managment-messaging');
    }


    public function messagingParents()
    {
        return view('partner/technical-support/parents-messaging');
    }


    public function viewTicket($seg6)
    {
        return view('partner/technical-support/parent-tickets', ['id' => $seg6]);
    }

    public function viewSchoolTicket($seg6)
    {
        return view('partner/technical-support/school-tickets', ['id' => $seg6]);
    }

    public function viewPartnerTicket($seg6)
    {
        return view('partner/partners/tickets', ['id' => $seg6]);
    }






    // public function examsTables()
    // {
    //     return view('partner/school-management/exams-tables');
    // }


    // public function globalTable()
    // {
    //     return view('partner/school-management/global-table');
    // }


    // public function questionnaires()
    // {
    //     return view('partner/school-management/questionnaires');
    // }


    // public function forms()
    // {
    //     return view('partner/school-management/forms');
    // }


    // public function schoolNotifications()
    // {
    //     return view('partner/school-management/notifications');
    // }


    // public function partnersSupport()
    // {
    //     // dd($this->session->userdata('item'));
    //     return view('partner/partners/support');
    // }


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
