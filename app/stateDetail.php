<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stateDetail extends Model
{
    protected $guarded = ['id'];

    public function state()
    {
        return $this->belongsTo('App\State');
    }

    public function userDetail()
    {
        return $this->belongsTo('App\userDetail');
    }
//    public function FederalConstituency()
//    {
////        return $this->hasManyThrough('App\FederalConstituency', 'App\stateDetail');
//        return $this->hasOne('App\FederalConstituency');
//    }

//
//    public function senatorialDistrict()
//    {
//        return $this->hasMany('App\senatorialDistrict');
//    }
//
//    public function lcda()
//    {
//        return $this->hasMany('App\lcda');
//    }
}
