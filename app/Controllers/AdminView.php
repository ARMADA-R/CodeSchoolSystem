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
	  public function filter()
    {
        return view('admin/filter');
    }
	public function ticket()
    {
        return view('admin/ticket');
    }

	
	public function parent()
    {
        return view('admin/parent');
    }
public function partner()
    {
        return view('admin/partner');
    }
	public function schooledit($seg6)
    {
        return view('admin/schooledit',['id' => $seg6]);
    }
    public function adminemail()
    {
        return view('admin/adminemail');
        
    }
    public function user()
    {
        return view('admin/user');
        
    }
    public function mangeschool()
    {
        return view('admin/mangeschool');
        
    }
    public function callus()
    {
        return view('admin/callus');
        
    }


    public function gets()
    {
        return view('admin/gets');
        
    }
    public function viewticket()
    {
        return view('admin/viewticket');
        
    }
    public function problem()
    {
        return view('admin/problem');
        
    }
    public function tebel()
    {
        return view('admin/tebel');
        
    }   
    
	//--------------------------------------------------------------------
    
}
