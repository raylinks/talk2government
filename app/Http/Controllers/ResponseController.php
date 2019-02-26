<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResponseFormRequest;
use App\Report;

class ResponseController extends Controller
{
     public function show(){
        $reports = Report::all();
        return view('reports', compact('reports'));
    }
//    public function time(ResponseFormRequest $request){
//        $f_date = $request->get('f_date');
//        $l_date = $request->get('l_date');
//        $reports = Report::all()->sortKeysDesc($f_date,$l_date);
//        return view('responsetime');
//    }
}
