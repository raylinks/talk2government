<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\vision;
use Illuminate\Http\Request;
use App\Http\Requests\VisionFormRequest;

class VisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index() {
        $id = 1;
        $visions = vision::all();
        return view('politicians.visions.vision', compact('visions', 'id'));
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
    public function store(VisionFormRequest $request) {
        $vision = new vision(array(
            'user_id' => Auth::user()->id,
            'content' => $request->get('content')
        ));
        $vision->save();
        $this->displayMessages('success','Your Vision Statement has been created successfully!');
        return redirect('/vision');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function show(vision $vision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vision  $vision
     * @return \Illuminate\Http\Response
     */
   
      public function edit($id) {
        $visions = vision::whereId($id)->firstOrFail();
        return view('politicians.visions.vision_update', compact('visions'));
       }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vision  $vision
     * @return \Illuminate\Http\Response
     */
   
    public function update($id, VisionFormRequest $request) {
        $vision = vision::whereId($id)->firstOrFail();
        $vision->content = $request->get('content');
        $vision->save();
        $this->displayMessages('success','Vision Update Successful!');
        return redirect(action('VisionController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vision  $vision
     * @return \Illuminate\Http\Response
     */
    
     public function destroy($id) {
        $vision = vision::whereId($id)->firstOrFail();
        $vision->delete();
        $this->displayMessages('success','Vision Deleted Successfully!');
        return redirect(action('VisionController@index'));
    }

    function displayMessages($title, $message)
    {
        Session::flash($title,$message);
    }
}
