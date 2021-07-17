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

	//--------------------------------------------------------------------

}
