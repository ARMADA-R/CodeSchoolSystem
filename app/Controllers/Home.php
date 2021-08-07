<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('home');
	}

	
	public function showLoginForm()
	{
		return view('login');
	}


	public function showRegisterForm()
	{
		return view('register');
	}

	//--------------------------------------------------------------------

}
