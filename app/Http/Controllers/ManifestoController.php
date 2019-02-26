<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manifesto;
use App\Http\Requests\VisionFormRequest;
use Illuminate\Support\Facades\Auth;
use Session;

class ManifestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index() {
        $id = 1;
        $manifestos = manifesto::all()->where('user_id', Auth::user()->id);
        return view('politicians.manifestos.manifestos', compact('manifestos', 'id'));
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
        $manifesto = new manifesto(array(
            'user_id' => Auth::user()->id,
            'content' => $request->get('content')
        ));
        $manifesto->save();
        $this->displayMessages('success','Your Manifestos has been created successfully!');
        return redirect('/manifestos');
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
        $manifestos = manifesto::whereId($id)->firstOrFail();
        return view('politicians.manifestos.manifestos_update', compact('manifestos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update($id, VisionFormRequest $request) {
        $manifestos = manifesto::whereId($id)->firstOrFail();
        $manifestos->content = $request->get('content');
        $manifestos->save();
        $this->displayMessages('success','Manifestos Update Successful!');
        return redirect(action('ManifestoController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id) {
        $manifestos = manifesto::whereId($id)->firstOrFail();
        $manifestos->delete();
        $this->displayMessages('success','Manifestos Deleted Successfully!');
        return redirect(action('ManifestoController@index'));
       }

    function displayMessages($title, $message)
    {
        Session::flash($title,$message);
    }
}
