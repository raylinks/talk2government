<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\Campaign;
use App\FederalConstituency;
use App\Transaction;
use App\manifesto;
use App\party;
use App\position;
use App\senatorialDistrict;
use Session;
use App\EndUserDetail;
use App\lcda;
use App\State;
use App\donation;
use App\userDetail;
use App\User;
use App\mission;
use App\vision;
use App\stateDetail;
use App\Talktome;
use App\Billing;
use App\Newsletter;
use Illuminate\Http\Request;
use App\Http\Requests\EnduserRequest;
use Hash;
use DB;
use Illuminate\Support\Facades\Auth;

class EndusersController extends Controller
{

    function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (\Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof \Illuminate\Support\Collection ? $items : \Illuminate\Support\Collection::make($items);
        return new \Illuminate\Pagination\LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
  
    public function index()
    {
        return view('users.index');
    }

    public function showLoginForm()
    {
        return view('users.login');
    }
    public function talkToUs($id){
        if(Auth::check()) {
            // $user = UserDetail::all()->where('id',$id)->first();
            $user = User::find(Auth::user()->id);
            $politician = User::find($id);
        return view('users.talkToUs',compact('user','politician'));
    }else{
        return redirect('/user/login');
    }
    }

    public function PostTalk($id, Request $request)
    {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ]);
            $slug = uniqid();
            $user = User::find(Auth::user()->id);
            $politician = User::find($id);
            if($request->picture == null){
              $talks =  Talktome::create([
                    'slug' => $slug,
                    // 'name' => $request->name,
                    // 'email' => $request->email,
                    'subject' => $request->subject,
                    'politician_id' => $id,
                    'enduser_id' => Auth::user()->id,
                    'message' => $request->message
                ]);
            }
            else{
                $photoName = time().'.'.$request->picture->getClientOriginalExtension();
                $request->picture->move(public_path('images/uploads'), $photoName);
                $talks = Talktome::create([
                'slug' => $slug,
                // 'name' => $request->name,
                // 'email' => $request->email,
                'subject' => $request->subject,
                'politician_id' => $id,
                'enduser_id' => Auth::user()->id,
                'message' => $request->message,
                'image' => $photoName
            ]);
            }

            $data = array(
                'name' =>$user->EndUserDetail->fullname,
                'email' => $user->EndUserDetail->email,
                'subject' => $request->subject,
                'messag' => $request->message,
                'politicianName' =>  $politician->userDetail->lastname. ' '. $politician->userDetail->firstname,
                'tracking' => $talks->slug
            );

            $politician_email = $politician->email;
            $politician_name = $politician->userDetail->lastname. ' '. $politician->userDetail->firstname;
            $subject = $talks->subject;
            $user_name = $user->endUserDetail->fullname;
            $user_email = $user->email;
    
            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('emails.talktome', $data, function($message) use($politician_email,$user_email,$user_name,$politician_name,$subject){
                $message
                    ->from($user_email,$user_name)
                    ->to($politician_email, $politician_name)
                    ->cc('info@raoatech.com')
                    ->subject($subject);
            });
            
            $this->displayMessages('success', 'Your message has successfully delivered');
            return redirect('/user/meet');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|min:6'
        ]);

        $user = User::all()->where('email',$request->email)->first();
        if($user == null)
        {
            $this->displayMessages('error',"User not found!");
            return redirect('/user/login');
        }else{
            if($user->priviledge == 1){
                $this->displayMessages('error',"Politician cannot login here! Kindly use the admin login to continue");
                return redirect('/user/login');
            }
        }


        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $this->displayMessages('success','Login successful!');
            return redirect('/user/index');
        }
        else{
            $this->displayMessages('error',"Credentials doesn't match our records! Kindly check and try again!");
            return redirect('/user/login');
        }
    }

    public function talk2leader()
    {
        return view('users.talk2leader');
    }

      public function tktleader()
    {
        return view('users.tktleader');
    }

     public function talk()
    {
        return view('users.talk');
    }

     public function register()
    {
        $states = State::all();
        $lcdas = lcda::all();
        return view('users.register',compact('states','lcdas'));
    }

    public function create(EnduserRequest $request)
    {
        try{
            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'priviledge' => 2,
                'is_active' => 1
            ]);

            $user = User::all()->last();

            EndUserDetail::create([
                'user_id' => $user->id,
                'fullname' => $request->fullname,
                'email' => $request->email,
                'state_id' => $request->state_id,
                'state_lga' => $request->state_lga,
                'residence_id' => $request->residence_id,
                'residence_lga' => $request->residence_lga,
                'gender' => $request->gender
            ]);
        }catch (\Exception $e)
        {
            $this->displayMessages('error','Error creating user. Kindly retry!');
            return redirect(action('EndusersController@register'));
        }
        $this->displayMessages('success','User created successfully!');
        return redirect(action('EndusersController@login'));
    }
    public function meet()
    {
        $states = State::all();
        $parties = party::all();
        $politicians = User::all()->where('priviledge',1)->sortByDesc('email');
        $politicians = $this->paginate($politicians,15);
        $politicians->withPath('/user/meet');
        return view('users.meet', compact('politicians','states','parties'));
    }

    public function fetchstateDetails($id)
    {
    $lcdas = lcda::select('id','name')->where('state_id',$id)->get();
    $federal_constituencies = FederalConstituency::select('id','name')->where('state_id',$id)->get();
    $senatorial_districts = senatorialDistrict::select('id','name')->where('state_id',$id)->get();
    $parties = party::select('id','name')->get();
    $result['lcdas'] = $lcdas;
    $result['feds'] = $federal_constituencies;
    $result['sens'] = $senatorial_districts;
    $result['parties'] = $parties;
    return  response()->json(['success' => $result]);
    }
    public function  userMessage(){
        return view('users.userMessage');
    }
    public function postMessage(Request $request){
     $data = array(
            'name' =>$request->name,
            'email' => $request->email,
            'messag' => $request->messag,
            'phone' => $request->phone
        );

        $email = $request->email;
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.userMessage', $data, function($message) use($email){
            $message
                ->from($email,'support.talk2gov@raoatech.com')
                ->to('info@raoatech.com');
        });
        $this->displayMessages('success', "Your message has successfully delivered. We will get back to you shortly. However, if you don't get any response from us within 10hrs, kindly call us on 08063200000");
        return redirect('/user/meet');
    }
    public function userDonate(){
        return view('users.donate');
    }

    public function postDonate(Request $request)
    {
        donation::create([

            'name' => $request->name,
            'email' => $request->email,
            'amount' => $request->amount,
            'transact_id' =>$request->transact_id,
            'status' => $request->status
        ]);
        return  response()->json(['success'=>'Payment successfull']);
    }




    public function donatePay(){
        return view('users.donatePay');
    }
        
    public function searchAndNewsletter(Request $request)
    {

        if($request->submit == 'search')
        {
            $states = State::all();
            $parties = party::all();
            if($request->aspirant_id == null)
            {
                $politicians = userDetail::all();
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                $this->displayMessages('error', 'search criteria cannot be empty');
                return view('users.meet', compact('politicians','states','parties')); 
            }
            if($request->aspirant_id == 'president' && $request->party_id == null)
            {
                $politicians = userDetail::all()->where('position_id', "=", 1);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties')); 
            }else if($request->aspirant_id == 'president' && $request->party_id != null)
            {
                $politicians = userDetail::all()->where('position_id', "=", 1)
                ->where('party_id', $request->party_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties')); 
            }
            else if($request->aspirant_id == 'state' && $request->party_id == null) 
            {
                if($request->state_id == null) 
                {
                $politicians = userDetail::all()->where('position_id', "!=", 1);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }else if($request->state_id != null && $request->category == null) 
                {
                $politicians = userDetail::all()->where('state_id', "=", $request->state_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }
                #Senatorial District Search
                else if($request->state_id == null && $request->category == 1 && $request->sen_id == null) 
                {
                $politicians = userDetail::all()->where('position_id', "=", 3);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }else if($request->state_id != null && $request->category == 1 && $request->sen_id == null) 
                {
                $politicians = userDetail::all()->where('position_id', "=", 3)->where('state_id',$request->state_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }else if($request->state_id != null && $request->category == 1 && $request->sen_id != null) 
                {
                $politicians = userDetail::all()->where('position_id', "=", 3)
                ->where('senatorial_district_id', $request->sen_id)->where('state_id',$request->state_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));                    
                }
                #Federal Constituency Search
                else if($request->state_id == null && $request->category == 2 && $request->sen_id == null) 
                {
                $politicians = userDetail::all()->where('position_id', "=", 4);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }
                else if($request->state_id != null && $request->category == 2 && $request->sen_id == null) 
                {
                $politicians = userDetail::all()->where('position_id', "=", 4)->where('state_id',$request->state_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }else if($request->state_id != null && $request->category == 1 && $request->sen_id != null) 
                {
                $politicians = userDetail::all()->where('position_id', "=", 4)
                ->where('senatorial_district_id', $request->sen_id)->where('state_id',$request->state_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));                    
                }
                #Governor Search
                else if($request->state_id == null && $request->category == 3 ) 
                {
                $politicians = userDetail::all()->where('position_id', "=", 2);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }
                else if($request->state_id != null && $request->category == 3) 
                {
                $politicians = userDetail::all()->where('position_id', "=", 2)->where('state_id',$request->state_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }
                #State Assembly
                else if($request->state_id == null && $request->category == 4 ) 
                {
                $politicians = userDetail::all();
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }
                else if($request->state_id != null && $request->category == 3) 
                {
                $politicians = userDetail::all();
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }
                }
            else if($request->aspirant_id == 'state' && $request->party_id != null) 
            {
                if($request->state_id == null) 
                {
                $politicians = userDetail::all()->where('position_id', "!=", 1)->where('party_id',$request->party_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }else if($request->state_id != null && $request->category == null) 
                {
                $politicians = userDetail::all()->where('state_id', "=", $request->state_id)->where('party_id',$request->party_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }
                #Senatorial District Search
                else if($request->state_id == null && $request->category == 1 && $request->sen_id == null) 
                {
                $politicians = userDetail::all()->where('position_id', "=", 3)->where('party_id',$request->party_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }else if($request->state_id != null && $request->category == 1 && $request->sen_id == null) 
                {
                $politicians = userDetail::all()->where('position_id', "=", 3)->where('state_id',$request->state_id)->where('party_id',$request->party_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }else if($request->state_id != null && $request->category == 1 && $request->sen_id != null) 
                {
                $politicians = userDetail::all()->where('position_id', "=", 3)
                ->where('senatorial_district_id', $request->sen_id)->where('state_id',$request->state_id)->where('party_id',$request->party_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));                    
                }
                #Federal Constituency Search
                else if($request->state_id == null && $request->category == 2 && $request->sen_id == null) 
                {
                $politicians = userDetail::all()->where('position_id', "=", 4)->where('party_id',$request->party_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }
                else if($request->state_id != null && $request->category == 2 && $request->sen_id == null) 
                {
                $politicians = userDetail::all()->where('position_id', "=", 4)->where('state_id',$request->state_id)->where('party_id',$request->party_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }else if($request->state_id != null && $request->category == 1 && $request->sen_id != null) 
                {
                $politicians = userDetail::all()->where('position_id', "=", 4)->where('party_id',$request->party_id)
                ->where('senatorial_district_id', $request->sen_id)->where('state_id',$request->state_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));                    
                }
                #Governor Search
                else if($request->state_id == null && $request->category == 3 ) 
                {
                $politicians = userDetail::all()->where('position_id', "=", 2)->where('party_id',$request->party_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }
                else if($request->state_id != null && $request->category == 3) 
                {
                $politicians = userDetail::all()->where('position_id', "=", 2)->where('party_id',$request->party_id)->where('state_id',$request->state_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }
                #State Assembly
                else if($request->state_id == null && $request->category == 4 ) 
                {
                $politicians = userDetail::all()->where('party_id',$request->party_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }
                else if($request->state_id != null && $request->category == 3) 
                {
                $politicians = userDetail::all()->where('party_id',$request->party_id);
                $politicians = $this->paginate($politicians,15);
                $politicians->withPath('/user/meet');
                return view('users.meet', compact('politicians','states','parties'));
                }
        }

        }elseif($request->submit == 'newsletter')
        { 
            
            try{
                
            Newsletter::create([
                'email' => $request->email
            ]);
    
            $this->displayMessages('success', 'Thanks for subscribing for our newsletter!');
            return redirect('/user/index');
        }catch(\Exception $e)
        {
            $this->displayMessages('error', 'Email already registered for newsletter. Thanks!');
            return redirect('/user/index');
        }
        }        
    }

     public function more($id)
    {
        $user = User::find($id);
        $iid = 1;
        $id2 = 1;
        $campaign = Campaign::all()->where('user_id', $id);
        $manifestos = manifesto::all()->where('user_id', $id)->first();
        $mission = mission::all()->where('user_id',$id)->first();
        $vision = vision::all()->where('user_id',$id)->first();
        $achievements = Achievement::all()->where('user_id',$id);
        return view('users.more',compact('user','mission','vision','manifestos' ,'achievements','iid','campaign','id2'));
    }

    public function store(Request $request)
    {
    
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
       
    }

    public function destroy($id)
    {
        
    }

    public function showPayment($politician_id)
    {
        $user = User::find($politician_id);
        return view('users.pay', compact('user'));
    }

    public function savePayment(Request $request)
    {
        try
        {
            $donation = new donation();
            $donation::create([
                'transact_id' => $request->transact_id,
                'user_id' => $request->user_id,
                'politician_id' => $request->politician_id,
                'status' => $request->status,
                'amount' => $request->amount,
            ]);
            return  response()->json(['success'=>'Payment successfull']);
            
            }catch(\Exception $e){
             return   response()->json(['error'=> $e]);
        }
    }

    function displayMessages($title, $message)
    {
        Session::flash($title,$message);
    }
}
