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

    public function info()
	{
		return view('admin/info');
	}

    public function slider()
    {
        return view('admin/home');
    }
	//--------------------------------------------------------------------

}
