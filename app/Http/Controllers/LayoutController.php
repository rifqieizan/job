<?php

namespace App\Http\Controllers;

use App\Jobs;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index()
    {
        $jobs=Jobs::where('status','show')->get();

        return view('guest', compact('jobs'));
    }

    public function detail($id)
    {

        $job=Jobs::find($id);
        return view('guest');

    }
}
