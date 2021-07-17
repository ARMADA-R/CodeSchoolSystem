<?php namespace App\Controllers;

class AdminView extends BaseController
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
