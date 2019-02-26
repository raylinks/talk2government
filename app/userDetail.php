<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userDetail extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function party()
    {
        return $this->belongsTo('App\party');
    }

    public function position()
    {
        return $this->belongsTo('App\position');
    }

    public function state()
    {
        return $this->belongsTo('App\State');
    }

    public function lcda()
    {
        return $this->belongsTo('App\lcda');
    }

    public function FederalConstituency()
    {
        return $this->belongsTo('App\FederalConstituency');
    }
   
}
