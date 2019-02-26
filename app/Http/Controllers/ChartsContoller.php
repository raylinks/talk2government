<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TaskFormRequest;
use App\Task;

class ChartsContoller extends Controller
{
    //
    public function pie_chart(){
        $result = \DB::table('vote_mes')->get();
        return response()->json($result);
       
    }
}
