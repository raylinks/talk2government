<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded =['id'];
    /* protected $fillable = ['transact_id', 'amount', 'currency',  'day_count',
        'monthly_returns', 'balance', 'bal_after_30days', 'users_plan',
         'payment_mode', 'user_id', 'rate', 'total'];*/

         public function billing()
         {
            return $this->belongsTo('App\billing');
            
         }
}
