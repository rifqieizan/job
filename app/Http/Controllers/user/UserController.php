<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Jobs;
use App\User;
use App\UserJob;
use App\Http\Controllers\Controller;
use Auth; 
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs=Jobs::where('status','show')->get();

        return view('user.index',compact('jobs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jobRequest(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        
        try{
            $attributes = $request->all();
            $attributes['user_id'] = Auth::user()->id;
                
            //insert into user_jobs
            $job = Jobs::insertUserJob($attributes);
            if($job){
                DB::commit();
                return back()->with('success','Request job has been successfully!');
            }else{
                return back()->with('error','Request job failed!');
            }   
        }catch(\Exception $e){
            DB::rollback();
        }
    }

    public function notification()
    {
        $notifications = User::getNotification();
        return view('user.notification',compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $job=Jobs::leftJoin('user_jobs','user_jobs.job_id','=','jobs.id')->where('jobs.id',$id)->first();
        $job= Jobs::find($id);
        // $job->hasRequest = false;
        
        // if($job->user_id==Auth::user()->id){
        //     $job->hasRequest = true;
        // }

        $status=UserJob::where('status','0');
        

        return view('user.user_job',compact('job','status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
