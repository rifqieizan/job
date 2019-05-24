<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\UserJob;

class jobs extends Model
{
    protected $fillable = [
        'name', 'description', 'placement','category','status','salary'
    ];
    
    public function users()
    {
        return $this->belongsTo('App\Users','user_id');
    }

    public static function insertUserJob($attributes)
    {
        $userJob = new UserJob();
        $userJob->user_id = $attributes['user_id'];
        $userJob->job_id  = $attributes['job_id'];
        $userJob->save();

        return true;
    }
}
