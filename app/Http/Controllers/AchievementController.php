<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Achievement;
use App\Http\Requests\AchievementsFormRequest;
use Auth;
use Session;

class AchievementController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() 
    {
        $id = 1;
        $achievements = Achievement::all()->where('user_id', Auth::user()->id);
        return view('politicians.achievements.achievements', compact('achievements', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AchievementsFormRequest $request)
    {
        $photoName = time().'.'.$request->picture->getClientOriginalExtension();
        $request->picture->move(public_path('images'), $photoName);
        $achievements = new Achievement(array(
            'user_id' => Auth::user()->id,
            'picture' => $photoName,
            'content' => $request->get('content')
        ));
        $achievements->save();
        $this->displayMessages('success','Your Achievement has been created successfully!');
        return redirect('/achievements');
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
   
    public function edit($id) 
    {
        $achievements = Achievement::whereId($id)->firstOrFail();
        return view('politicians.achievements.achievements_update', compact('achievements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update($id, AchievementsFormRequest $request) 
    {
        $achievemment = Achievement::whereId($id)->firstOrFail();
        if($request->picture == null){

        }else{
            $photoName = time().'.'.$request->picture->getClientOriginalExtension();
            $request->picture->move(public_path('images'), $photoName);
            $achievemment->picture = $photoName;
        }
        
        $achievemment->content = $request->get('content');
        $achievemment->save();
        $this->displayMessages('success','Achievements Update Successful!');        
        return redirect(action('AchievementController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        $achievement = Achievement::whereId($id)->firstOrFail();
        $achievement->delete();
        $this->displayMessages('success','Achievements Deleted Successfully!'); 
        return redirect(action('AchievementController@index'));
    }

    public function achievements_api() {
        $achievements = Achievement::all();
        return $this->generateJSON('success', 200, null, $achievements);
    }

    function displayMessages($title, $message)
    {
        Session::flash($title,$message);
    }
}
