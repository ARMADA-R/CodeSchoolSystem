<?php namespace App\Controllers;

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



	//--------------------------------------------------------------------

}
