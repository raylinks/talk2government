<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class party extends Model
{
    protected $guarded = ['id'];

    public function userDetail()
    {
        return $this->hasOne('App\userDetail');
    }


    
}
