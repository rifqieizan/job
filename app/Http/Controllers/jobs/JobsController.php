<?php

namespace App\Http\Controllers\jobs;


use App\Jobs;
use App\User;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Jobs::all();
        return view('jobs.dashboard',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Jobs::create($request->all());
        Session::flash("notice", "jobs created successfully");
        return redirect()->route("jobs.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $job=Jobs::find($id);
        return view('jobs.show',compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $job=Jobs::find($id);
        return view('jobs.edit',compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $job=Jobs::find($id);

        if (isset($request->status)) {
            # code...
            
            $job->status='show';
            $job->save();
            return redirect()->route('jobs.index');
        }else{
            $job->status='hide';
            $job->save();
            return redirect()->route('jobs.index');
        }
        $job->save();

        // $job=Jobs::find($id);
        // if ($job->status='hide') {
        //     # code...
        //     $job->status='show';
        // }else{
        //     $job->status='hide';
        // }
        // $job=save();

        Jobs::find($id)->update($request->all());
        Session::flash('notice', 'sucesfully updated');
        return redirect()->route('jobs.index');
        
    }

    public function change_status()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jobs::destroy($id);
        Session::flash("notice","sucessfuly deleted");
        return redirect()->route('jobs.index');

    }

    public function user()
    {
        $users=User::all();
        return view('jobs.user',compact('users'));
    }
}
