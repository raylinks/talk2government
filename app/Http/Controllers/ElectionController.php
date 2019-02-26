<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\VisionFormRequest;
use App\Http\Requests\ComplainsFormRequest;
use App\vision;
use App\mission;
use App\manifesto;
use App\complains;
use App\payment;
use App\User;
use App\vote_me;
use Illuminate\Support\Facades\Mail;
//use Maatwebsite\Excel\Facades\Excel;

class ElectionController extends BaseController {
  
    public function donation() 
    {
        $id = 1;
        $donations = payment::all()->sortByDesc('date');
        return view('donations', compact('donations', 'id'));
    }
    
    public function donation_p(Request $request) 
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $id = 1;
        $donations = payment::whereBetween('date', [$from, $to])->get();
        return view('donations', compact('donations', 'id'));
    }
    
    
    
    public function payment_api(Request $request)
    {
        $payment = new payment;
        try {
            $payment->create($request->all());
            return $this->generateJSON('success', 200, null, 'Payment created successfully!!');
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->generateJSON('error', 500, $e->errorInfo[2], null);
        }
    }
    
   
    
    
    public function voteme_api(Request $request) 
    {
        $voteme = new vote_me;
        try {
            $voteme->create($request->all());
            return $this->generateJSON('success', 200, null, $voteme);
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->generateJSON('error', 500, $e->errorInfo[2], null);
        }
    }

    public function complain_api(ComplainsFormRequest $request)
     {
        try {
            $slug = uniqid();
            $name = $request->get('name');
            $email = $request->get('email');
            $complain = $request->get('complain');
            $complains = new complains(array(
                'slug' => $slug,
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'state' => $request->get('state'),
                'picture' => $request->get('picture'),
                'lga' => $request->get('lga'),
                'complain' => $request->get('complain')
            ));

            $complains->save();
            if ($complains) {
                $data = array(
                    'slug' => $slug,
                    'name' => $name,
                    'complain' => $complain
                );
                
             Mail::send('emails.complains', $data, function ($message) use($email) {
            $message->from('emmantoksjr@gmail.com', 'Raoatech');
            $message->to($email)->subject('Senatapp - Talk To Me Ticket');
            });
         
            return $this->generateJSON('success', 200, null, 'Talk To Me Added Successfully and a notification has been sent to your email. ');
            } else {

                return $this->generateJSON('error', 400, 'Error adding Talk To Me!!', null);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->generateJSON('error', 500, $e->errorInfo[2], null);
        }
    }


    public function manifestos_api() 
    {
        $manifestos = manifesto::all()->toArray();
        return $this->generateJSON('success', 200, null, $manifestos);
    }

    public function user_api() 
    {
        $user = User::all()->toArray();
        return $this->generateJSON('success', 200, null, $user);
    }


    
    public function vision_api() 
    {
        $visions = vision::all()->toArray();
        return $this->generateJSON('success', 200, null, $visions);
    }

    public function mission_api() 
    {

        $missions = mission::all()->toArray();
        return $this->generateJSON('success', 200, null, $missions);
    }
}
