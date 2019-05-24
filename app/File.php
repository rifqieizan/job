<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    protected $fillable = [
        'description',
        'filename',
        'user_id',
        'status'
    ];
    
    public static function updateStatus($attributes)
    {
        $file = File::find($attributes['file_id']);
        $file->status = $attributes['status'];
        $file->save();
    }

    public static function getData()
    {
        $data = File::join('users','files.user_id','=','users.id')
                     ->select('files.id','users.name','users.email','files.description','files.filename','files.status');
        
        return $data->get();
    }
}

