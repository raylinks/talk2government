<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileFormRequest;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\AchievementsFormRequest;
use App\User;
use App\mission;
use App\vision;
use App\Achievement;
use App\Talktome;
use App\complains;
use Auth;
use Session;

class PagesController extends BaseController {

    public function home()
    {
        return view('home');
    }

    public function charts() {
        return view('charts');
    }
    public function a_pie() {
        $result = \DB::table('votees')->get();
        return response()->json($result);
    }

    public function setup() {
        return view('auth.setup');
    }

    Public function complains() 
    {
        $id = 1;
        $complains = Talktome::all()->where('politician_id',Auth::user()->id);
        return view('politicians.complains', compact('complains', 'id'));
    }
    
    Public function complains_p(Request $request) {
        $from = $request->get('from');
        $to = $request->get('to');
        $complains = Talktome::whereBetween('created_at', [$from, $to])->get();
        $id = 1;
        return view('complains', compact('complains', 'id'));
    }
    


    public function report() {
        return view('reports');
    }

    function displayMessages($title, $message)
    {
        Session::flash($title,$message);
    }

}
