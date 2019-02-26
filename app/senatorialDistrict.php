<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class senatorialDistrict extends Model
{
    protected $guarded = ['id'];

    public function StateDetail()
    {
        return $this->belongsTo('App\stateDetail');
    }
}
