<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Transaction;

class MonthlySubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature =  'MonthlyReturns:monthlyreturns';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the transactions activated after 30 days';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $today = Carbon::now(new \ DateTimeZone('Africa/Lagos'));
        $transactions = Transaction::all();
        foreach($transactions as $transaction)
        {
        $dura =     $transaction->billing->duration;
         Transaction::where("payin_time >=  SUBDATE (NOW(), INTERVAL $dura  DAY ")->where('status', 'ACTIVATED')->where('billing_id', "$transaction->billing_id")->update(['day_count' => DB::raw('day_count + 1')]);
         Transaction::where('day_count','==',  "$transaction->day_count" )->update(['status' => 'NOT ACTIVATED', 'payin_time' => '' ]);
        }
        return $this->info('transaction successful');
        // Transaction::where('status_date >=  SUBDATE (NOW(), INTERVAL 30 DAY)')->where('status', 'ACTIVATED')->where('user_plan', 'Premium Plan')->update(['day_count' => DB::raw('day_count + 1')]);
        // Transaction::where('status_date >=  SUBDATE (NOW(), INTERVAL 30 DAY)')->where('status', 'ACTIVATED')->where('user_plan', 'other Plan')->update(['day_count' => DB::raw('day_count + 1')]);
    }
}
