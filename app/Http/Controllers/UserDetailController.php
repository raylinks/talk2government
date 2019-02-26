<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Session;
use App\User;
use App\mission;
use App\vision;
use App\userDetail;
use App\Http\Requests\ProfileFormRequest;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = DB::table('users')
             ->join('user_details', 'users.id', '=', 'user_details.user_id')
             ->join('parties', 'parties.id', '=', 'user_details.party_id')
             ->join('positions', 'positions.id', '=', 'user_details.position_id')
            //  ->join('states', 'states.id', '=', 'user_details.state_id')
             ->select('parties.name as party','user_details.*', 'positions.name as position')
             ->where('users.id', Auth::user()->id)
             ->first();
        $politician = user::find(Auth::user()->id);
        $missions = mission::all();
        $visions = vision::all();
        return view('politicians.profiles.profile', compact('missions', 'visions', 'politician','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\userDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function show(userDetail $userDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\userDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $politician = user::find($id);
        return view('politicians.profiles.profile_edit',compact('politician'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\userDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update($id, ProfileFormRequest $request)
    {
        $user = User::find($id);
        if($request->picture == null){

        }else{
            $photoName = time().'.'.$request->picture->getClientOriginalExtension();
            $request->picture->move(public_path('images'), $photoName);
            $user->userDetail->picture = $photoName;
        }
        $user->userDetail->title = $request->get('title');
        $user->userDetail->middlename = $request->get('middlename');
        $user->userDetail->email = $request->get('email');
        $user->userDetail->firstname = $request->get('firstname');
        $user->userDetail->lastname = $request->get('lastname');
        $user->userDetail->profile = $request->get('profile');

        // $user->state = $request->g et('state');
        // $user->country = $request->get('country');
        $user->userDetail->save();
        $this->displayMessages('success','Account Update Successful!');
        return redirect(action('UserDetailController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\userDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(userDetail $userDetail)
    {
        //
    }

    function displayMessages($title, $message)
    {
        Session::flash($title,$message);
    }
}

