<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserJob extends Model
{
    protected $fillable = [
        'user_id', 'job_id', 'note','status'
    ];

    public static function getData()
    {
        $data = UserJob::join('users','user_jobs.user_id','=','users.id')
                         ->join('jobs','user_jobs.job_id','=','jobs.id')
                         ->select('user_jobs.id','users.name','users.email','jobs.name as job_name','user_jobs.status','user_jobs.note');
        return $data->get();
    }

    public static function updateData($attributes)
    {
        $userJob = UserJob::find($attributes['job_id']);
        $userJob->status = $attributes['status'];
        $userJob->save();

        return true;
    }
}
