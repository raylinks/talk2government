<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class billing extends Model
{
    protected $guarded = ['id'];

    public function Transaction()
    {
        return $this->hasOne('App\Transaction');
        
    }
    
}
