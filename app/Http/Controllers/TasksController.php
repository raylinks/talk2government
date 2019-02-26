<?php

namespace App\Http\Controllers;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\TaskFormRequest;
use App\Task;

class TasksController extends BaseController {

    public function chart( Request $request) {
        $result = \DB::table('vote_mes')->get();
        return response()->json($result);
    }

    public function home() {
        return view('politicians.home');
        // $total = 1;
        // $yes = 1;
        // $no = 1;
        // $total = \DB::table('vote_mes')->get()->count();
        // $yes = \DB::table('vote_mes')->get()->where('value', 'yes')->count();
        // $no = \DB::table('vote_mes')->get()->where('value', 'no')->count();
        // if ($total == 0 || $yes == 0 || $no == 0) {
        //     $total = 1;
        //     $yes = 1;
        //     $no = 1;
        //     $yes_per = ($yes / $total) * 100;
        //     $no_per = ($no / $total) * 100;
        //     return view('home', compact('yes_per', 'no_per'));
        // } else {
        //     $yes_per = ($yes / $total) * 100;
        //     $no_per = ($no / $total) * 100;
            // return view('home', compact('yes_per', 'no_per'));
        // }
    }



    public function index() {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function show($slug) {
//        $tasks = Post::whereSlug($slug)->firstOrFail();
        $tasks = $post->comments()->get();
        return view('blogs.show', compact('post', 'comments'));
    }

    public function edit($slug) {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        return view('tickets.edit', compact('ticket'));
    }

    public function update($slug, TicketFormRequest $request) {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $ticket->title = $request->get('title');
        $ticket->content = $request->get('content');
        if ($request->get('status') != null) {
            $ticket->status = 0;
        } else {
            $ticket->status = 1;
        } $ticket->save();
        return redirect(action('TicketsController@edit', $ticket->slug))->with('status', 'The ticket ' . $slug . ' has been updated!');
    }

    public function destroy($slug) {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $ticket->delete();
        return redirect('/tickets')->with('status', 'The ticket ' . $slug . ' has been deleted!');
    }

}
