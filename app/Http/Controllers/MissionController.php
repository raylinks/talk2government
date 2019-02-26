<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mission;
use App\Http\Requests\MissionFormRequest;
use Auth;
use Session;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $id = 1;
        $missions = mission::all();
        return view('politicians.missions.mission', compact('missions', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(MissionFormRequest $request) {
        $mission = new mission(array(
            'user_id'  => Auth::user()->id,
            'content' => $request->get('content')
        ));
        $mission->save();
        $this->displayMessages('success','Your Mission Statement has been created successfully!');
        return redirect('/mission');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id) {
        $missions = mission::whereId($id)->firstOrFail();
        return view('politicians.missions.mission_update', compact('missions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update($id, MissionFormRequest $request) {
        $mission = mission::whereId($id)->firstOrFail();
        $mission->content = $request->get('content');
        $mission->save();
        $this->displayMessages('success','Mission Update Successful!');
        return redirect(action('MissionController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $mission = mission::whereId($id)->firstOrFail();
        $mission->delete();
        $this->displayMessages('success','Mission Deleted Successfully!');
        return redirect(action('MissionController@index'));
    }

    function displayMessages($title, $message)
    {
        Session::flash($title,$message);
    }
}
