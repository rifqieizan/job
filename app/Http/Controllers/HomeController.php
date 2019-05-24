<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
       
    //     // $this->middleware('role:manager,employee');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->hasRole('admin')) {
            # code...
            return redirect('admin');
        }elseif($request->user()->hasRole('user')){
            return redirect('user');
        }
        return view('home');
    }

    public function view()
    {
        return view('view');
    }
}
