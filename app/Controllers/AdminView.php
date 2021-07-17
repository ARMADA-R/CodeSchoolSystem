<?php namespace App\Controllers;

class SchoolView extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

    public function home()
	{
		return view('admin/home');
	}

	//--------------------------------------------------------------------

}
