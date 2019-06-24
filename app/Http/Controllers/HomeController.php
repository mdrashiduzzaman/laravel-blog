<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_users = user::all();
        return view('home', compact('all_users'));
    }
    public function contactMessageView(){
        $contactmessage = Contact::all();
        return view('contactView.view', compact('contactmessage'));
    }

   
}
