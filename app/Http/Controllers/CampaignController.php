<?php

namespace App\Http\Controllers;

use Session;
use App\Campaign;
use App\Http\Requests\CampaignRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = 1;
        //->take() is used to take a number from db
        $tasks = Campaign::all()->sortByDesc('date');
        return view('politicians.campagnes.campagnes', compact('tasks', 'id'));
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
    public function store(CampaignRequest $request)
    {
        $campaign = new Campaign(array(
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'location' => $request->get('location'),
            'user_id' => Auth::user()->id,
        ));
        $campaign->save();
        $this->displayMessages('success','Your schedule has been created successfully!');
        return redirect('/campagnes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks = Campaign::whereId($id)->firstOrFail();
        return view('politicians.campagnes.campagnes_update', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update($id, CampaignRequest $request)
    {
        $task = Campaign::whereId($id)->firstOrFail();
        $task->date = $request->get('date');
        $task->time = $request->get('time');
        $task->location = $request->get('location');
        $task->save();
        $this->displayMessages('success','Campaign Update Successful!');
        return redirect(action('CampaignController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campagnes = Campaign::whereId($id)->firstOrFail();
        $campagnes->delete();
        $this->displayMessages('success','Campaign Deleted Successfully!');
        return redirect(action('CampaignController@index'));
    }

    public function campagnes_api() {
        $campagnes = Campaign::all()->toArray();
        return $this->generateJSON('success', 200, null, $campagnes);
    }

    function displayMessages($title, $message)
    {
        Session::flash($title,$message);
    }
}
