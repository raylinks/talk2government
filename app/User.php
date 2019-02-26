<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword as ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = ['id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    
    public function userDetail()
    {
        return $this->hasOne('App\userDetail');
    }

    public function EndUserDetail()
    {
        return $this->hasOne('App\EndUserDetail');
    }

    public function addNew($input)
    {
        $check = static::where('facebook_id',$input['facebook_id'])->first();
        if(is_null($check)){
            return static::create($input);
        }
        return $check;
    }
    
}
