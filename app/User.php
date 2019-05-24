<?php

namespace App;

use App\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address','birth', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function jobs()
    {
        return $this->hasMany('App\Jobs','user_id');
    }

    public static function getNotification()
    {
        $userId = Auth::user()->id;
        $files = DB::table('files')->select('description as name','status',DB::raw("'CV' as type"))->where('user_id',$userId);
        $results = DB::table('user_jobs')
                        ->join('jobs','jobs.id','=','user_jobs.job_id')
                        ->select('jobs.name','user_jobs.status',DB::raw("'Job Request' as type"))
                        ->where('user_id',$userId)->union($files)->get();
        
        return $results;
    }

    // public function authorizeRoles($roles)
    // {
    //     if (is_array($roles)) {
    //     return $this->hasAnyRole($roles) ||
    //     abort(401, 'This action is unauthorized.');
    //     }
    //     return $this->hasRole($role) ||
    //     abort(401, 'This action is unauthorized.');
    // }

    // public function hasAnyRole($roles)
    // {
    //     return null !== $this->roles()->whereIn('name',$roles)->first();
    // }
    // public function hasAnyRole($roles)
    // {
    // return null !== $this->roles()->whereIn('name',$roles)->first();
    // }

    // public function hasRole($role)
    // {
    //     return null !== $this->roles()->where('name',$role)->first();
    // }
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
            abort(401, 'This action is unauthorized.');
            }
            return $this->hasRole($roles) ||
                abort(401, 'This action is unauthorized.');
    }
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
}
