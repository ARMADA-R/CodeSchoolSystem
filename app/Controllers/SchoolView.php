<?php

namespace App\Controllers;

class SchoolView extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function home()
	{
		return view('school/home');
	}


	public function messageForms()
	{
		return view('school/system-settings/global-messages-forms');
	}


	public function examsTables()
	{
		return view('school/system-settings/exams-tables');
	}


	public function globalTable()
	{
		return view('school/system-settings/global-table');
	}


	public function addCourse()
	{
		return view('school/system-settings/add-course');
	}


	public function linkGates()
	{
		return view('school/system-settings/link-gates');
	}


	public function studentsInfo()
	{
		return view('school/basics info/students-info');
	}



	public function teachersInfo()
	{
		return view('school/basics info/teachers-info');
	}


	public function employeesInfo()
	{
		return view('school/basics info/employees-info');
	}



	public function subjectsInfo()
	{
		return view('school/basics info/subjects-info');
	}




	public function absenceAndTardiness()
	{
		return view('school/notifications/absence-tardiness');
	}




	public function publicMesssages()
	{
		return view('school/notifications/public-messages');
	}




	public function absenceAndTardinessArchive()
	{
		return view('school/archive/absence-tardiness');
	}




	public function publicMesssagesArchive()
	{
		return view('school/archive/public-messages');
	}





	public function parentsResponceArchive()
	{
		return view('school/parents-responce/responce-archive');
	}




	public function systemManagersTichnicalSupportTickets()
	{
		return view('school/technical-support-tickets/system-managers');
	}





	public function parentsTichnicalSupportTickets()
	{
		return view('school/technical-support-tickets/parents');
	}




	public function viewTicket($seg6)
	{
		return view('school/technical-support-tickets/tickets', ['id' => $seg6]);
	}




	public function questionnaires()
	{
		return view('school/services/questionnaires');
	}




	public function addQuestionnaires()
	{
		return view('school/services/add-questionnaires');
	}




	public function forms()
	{
		return view('school/services/forms');
	}




	public function partnersOffers()
	{
		return view('school/partners/offers');
	}



	public function partnersSupport()
	{
		// dd($this->session->userdata('item'));
		return view('school/partners/support');
	}




	public function viewPartnerTicket($seg6)
	{
		return view('school/partners/tickets', ['id' => $seg6]);
	}





	//--------------------------------------------------------------------

}
