<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use DB;
use Auth;

class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
       
        // $this->middleware('role:admin');
        // $this->middleware('role:manager,employee');
    }

    public function index()
    {
        $files = File::where('user_id',Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(5);
         return view('user.file', compact('files'));
    }

    public function form()
    {
        return view('user.form');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'description'=>'nullable|max:100',
            'file'=>'required|file|max:2000'
        ]);
        
        $uploadedFile=$request->file('file');
        $path=$uploadedFile->store('public/files');

        $file=File::create([
            'description'=>$request->description ?? $uploadedFile->getClientOriginalName(),
            'filename'=>$path,'user_id'=>Auth::user()->id
        ]);
        
        return redirect()
        ->back()
        // -withSuccess(sprintf('File % has been uploaded.'.$file->description));
        ->with('success','File % has been uploaded');

    }

    public function send(Request $request)
    {
        DB::beginTransaction();

        try {
            $attributes = $request->all();
            
            File::updateStatus($attributes);
            DB::commit();
            return back()->with('success','Send CV has been successfully!');
        }catch(\Exception $e){
            DB::rollback();
        }

        return back()->with('error','Send CV failed!');
    }
}
