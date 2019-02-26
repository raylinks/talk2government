<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\VoteeDetails;
use App\User;
use App\EndUserDetail;
use App\Vote_me;
use App\position;
use App\FederalConstituency;
use App\senatorialDistrict;
use App\State;
use App\stateDetail;
use App\party;
use App\manifesto;
use App\mission;
use App\vision;
use App\lcda;
use App\userDetail;
use App\Campaign;
use App\donation;
use App\Talktome;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Achievement;

class AuthController extends BaseController
{

    public function getAll()
    {
        $categories = position::all();
        $fedconstituency = FederalConstituency::all();
        $states = State::all();
        $parties = party::all();
        $lcda = lcda::all();
        $userdetails = userDetail::all();
        $senatorial = senatorialDistrict::all();
        $results = [];
        $results['categories'] = $categories;
        $results['fedconstituency'] = $fedconstituency;
        $results['states'] = $states;
        $results['parties'] = $parties;
        $results['lcda'] = $lcda;
        $results['userdetails'] = $userdetails;
        $results['senatorial'] = $senatorial;
        //  $results = DB::table('users')
        //      ->join('user_details', 'users.id', '=', 'user_details.user_id')
        //      ->join('parties', 'parties.id', '=', 'user_details.party_id')
        //      ->join('state_details', 'state_details.id', '=', 'user_details.state_detail_id')
        //      ->join('positions', 'positions.id', '=', 'state_details.position_id')
        //      ->join('states', 'states.id', '=', 'state_details.state_id')
        //      ->select('users.id as uid','user_details.*','parties.name as party','positions.name as position','states.name as state')->get();
        return $this->generateJSON('success', 200, null, $results);
    }
    
    public  function postTalk(Request $request)
    {
        $talktome= new Talktome();
        $talktome ->message = $request->input('message');
        $talktome->image =$request->input('image');
        $talktome->politician_id =$request->input('politician_id');
        $talktome->enduser_id =$request->input('enduser_id');
        $talktome->save();


        return $this->generateJSON('success', 200, null, 'Registration Successfully!!');
    }

    public function regVotee(Request $request)
    {

        $this->validate($request,[
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required|not_in:0'
        ]);


        $reg = new VoteeDetails();
        $reg->fullname = $request->input('fullname');
        $reg->email = $request->input('email');
        $reg->password = bcrypt($request['password']);
        $reg->gender = $request->input('gender');
        $reg->lga = $request->input('lga');
        $reg->resident_id->input('resident_id');
        $reg->resident_reg_id->input('resident_reg_id');
        $reg->party_id = $request->input('party_id');
        $reg->state_id = $request->input('state_id');
        $reg->phone = $request->input('phone');
        $reg->profile = $request->input('profile');
        $reg->save();

        //  \Log::info($request->all());


        return $this->generateJSON('success', 200, null, 'Registration Successfully!!');

    }
    
    /*
        
        @params
        Position ID : $request->aspirant_id
        State ID : $request->state
        Party ID : $request->party
        Lcda ID : $request->lcda
        Senatorial District: $request->district
        Federal constituency : $request->federal
        
    
    */
    
    public function search(Request $request) {
        
        if($request->aspirant_id == 1){
            
            if($request->aspirant_id != null && $request->party == null) {
                
                $results = userDetail::all()->where('position_id', "=", $request->aspirant_id);
                
                if(count($results) == 0) {
                    return $this->generateJSON('error', 400, "No match", null );
                }else {
                    return $this->generateJSON('success', 200, null, $results);  
                }
                
            }else if($request->aspirant_id != null && $request->party != null){
                
                $results = userDetail::all()->where('position_id', "=", $request->aspirant_id)->where('party_id', '=', $request->party);
                
                if(count($results) == 0) {
                    return $this->generateJSON('error', 400, "No match", null );
                }else {
                    return $this->generateJSON('success', 200, null, $results);  
                }
            }
            
        }else if($request->aspirant_id == 2) {
            
            if($request->aspirant_id  != null && $request->state == null && $request->party == null) {
                
                $results = userDetail::all()->where('position_id', "=", $request->aspirant_id);
                
                if(count($results) == 0) {
                    return $this->generateJSON('error', 400, "No match", null );
                }else{
                     return $this->generateJSON('success', 200, null, $results);
                }
            }else if($request->aspirant_id != null && $request->state != null & $request->party == null) {
                
                $results = userDetail::all()->where('position_id', "=", $request->aspirant_id)->where('state_id', '=', $request->state);
                
                if(count($results) == 0) {
                    return $this->generateJSON('error', 400, "No match", null );
                }else{
                     return $this->generateJSON('success', 200, null, $results);
                }
                
            }else if($request->aspirant_id != null && $request->state != null && $request->party != null) {
                
                 $results = userDetail::all()->where('position_id', "=", $request->aspirant_id)->where('state_id', '=', $request->state)->where('party_id', '=', $request->party);
                
                if(count($results) == 0) {
                    return $this->generateJSON('error', 400, "No match", null );
                }else{
                     return $this->generateJSON('success', 200, null, $results);
                }
                
            }else if($request->aspirant_id != null && $request->state == null && $request->party != null) {
                
                $results = userDetail::all()->where('position_id', "=", $request->aspirant_id)->where('party_id', '=', $request->party);
                
                if(count($results) == 0) {
                    return $this->generateJSON('error', 400, "No match", null );
                }else{
                     return $this->generateJSON('success', 200, null, $results);
                }
                
            }
        }else if($request->aspirant_id == 3){
            
            if($request->aspirant_id != null && $request->state != null && $request->district == null && $request->party == null) {
                
                 $results = userDetail::all()->where('position_id', "=", $request->aspirant_id)->where('state_id', '=', $request->state);
                
                if(count($results) == 0) {
                    return $this->generateJSON('error', 400, "No match", null );
                }else{
                     return $this->generateJSON('success', 200, null, $results);
                }
            }else if($request->aspirant_id != null && $request->state != null && $request->district != null && $request->party == null){
                
                 $results = userDetail::all()->where('position_id', "=", $request->aspirant_id)->where('state_id', '=', $request->state)->where('senatorial_district_id', '=', $request->district);
                
                if(count($results) == 0) {
                    return $this->generateJSON('error', 400, "No match", null );
                }else{
                     return $this->generateJSON('success', 200, null, $results);
                }
                
            }else if($request->aspirant_id != null && $request->state != null && $request->district != null && $request->party != null){
                
                $results = userDetail::all()->where('position_id', "=", $request->aspirant_id)->where('state_id', '=', $request->state)->where('senatorial_district_id', '=', $request->district)->where('party_id' ,'=', $request->party);
                
                if(count($results) == 0) {
                    return $this->generateJSON('error', 400, "No match", null );
                }else{
                     return $this->generateJSON('success', 200, null, $results);
                }
            }
            
        }else if($request->aspirant_id == 4) {
             if($request->aspirant_id != null && $request->federal != null && $request->state != null) {
                 
                  
                 $results = userDetail::all()->where('position_id', "=", $request->aspirant_id)->where('state_id', '=', $request->state)->where('federal_constituency_id', '=', $federal);
                
                if(count($results) == 0) {
                    return $this->generateJSON('error', 400, "No match", null );
                }else{
                     return $this->generateJSON('success', 200, null, $results);
                }
                 
             }else if($request->aspirant_id != null && $request->federal != null && $request->party != null && $request->state != null) {
                 
                   $results = userDetail::all()->where('position_id', "=", $request->aspirant_id)->where('federal_constituency_id', '=', $request->federal)->where('party_id', '=', $request->party)->where('state_id', '=', $request->state);
                
                if(count($results) == 0) {
                    return $this->generateJSON('error', 400, "No match", null );
                }else{
                     return $this->generateJSON('success', 200, null, $results);
                }
             }
            
        }else if($request->aspirant_d == 5){
            
            if($request->aspirant_id != null && $request->state == null && $request->party == null && $request->lcda == null) { 
                
                 
                 $results = userDetail::all()->where('position_id', "=", $request->aspirant_id);
                
                if(count($results) == 0) {
                    return $this->generateJSON('error', 400, "No match", null );
                }else{
                     return $this->generateJSON('success', 200, null, $results);
                }
                
            }else if($request->aspirant_id != null && $request->state != null && $request->party != null && $request->lcda != null) { 
                
                  $results = userDetail::all()->where('position_id', "=", $request->aspirant_id)->where('state_id', '=', $request->state)->where('party_id', '=', $request->party)->where('lcda_id','=', $request->lcda);
                
                if(count($results) == 0) {
                    return $this->generateJSON('error', 400, "No match", null );
                }else{
                     return $this->generateJSON('success', 200, null, $results);
                }
            }
        }
        
        // // Check if aspirant ID is defined
        
        // if($request->aspirant_id && $request->party){
            
        // // Query user-details table where Position ID is equal to @param -> aspirant_id and Party ID is equal to @param -> party 
            
        //  $results = userDetail::all()->where('position_id', "=", $request->aspirant_id)->where('party_id', '=', $request->party);
         
         
        // // Generate the response to the returned to the user.
         
        //  return $this->generateJSON('success', 200, null, $results);
         
        // }else if($request->aspirant_id && $request->state && $request->party) {
            
        // $results = userDetail::all()->where('position_id', "=", $request->aspirant_id)->where('party_id', '=', $request->party)->where('state_id', '=', $request->state);
            
        // return $this->generateJSON('success', 200, null, $results);
        // }else if($request->aspirant_id && $request->state && $request->district) {
        //     $results = userDetail::all()->where('position_id', "=", $request->aspirant_id)->where('state_id', '=', $request->state)->where('senatorial_district_id', '=', $request->district);
            
        //     if(count($results) == 0) {
        //         return $this->generateJSON('error', 400, "No match", null );
        //     }else{
        //         return $this->generateJSON('success', 200, null, $results);  
        //     }
        // }else if($request->aspirant_id != null && $request->state != null && $request->party != null && $request->district != null) {
            
        //     $results = userDetail::all()->where('position_id', "=", $request->aspirant_id)->where('state_id', '=', $request->state)->where('party_id', '=', $request->party )->where('senatorial_district_id', '=', $request->district);
            
        //     if(count($results) == 0) {
        //         return $this->generateJSON('error', 400, "No match", null );
        //     }else{
        //         return $this->generateJSON('success', 200, null, $results);  
        //     }
        // }
        
    }



    public function reg_api(Request $request)
    {
        
        try{
        $user_created_last = User::create([
            'email' => $request->email,
            'priviledge' => 2,
            'is_active' => 1
            ]);
    
        $reg = new EndUserDetail();
        $reg->user_id =$user_created_last->id;
        $reg->fullname =$request->fullname;
        $reg->state_id =$request->state_id;
        $reg->email = $request->email;
        $reg->state_lga =$request->state_lga;
        $reg->residence_id =$request->residence_id;
        $reg->residence_lga =$request->residence_lga;
        $reg->gender = $request->gender;
        $reg->save();

        return $this->generateJSON('success', 200, null, 'Registration Successfully!!');
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    // houston, we have a duplicate entry problem
                    return $this->generateJSON('error', 400,  "Email already exist try using another one" , null);
                }
        }
    }
    
     
     


    public function register(Request $request)
    {
        $v_slug = uniqid();
        $validator = Validator::make($request->all(), [
            
            'v_slug' => $v_slug,
            'name' => 'required',
            'email' => 'required|email',
            'state' => 'required',
            'constituency' => 'required',
            'password' => 'required',
            'sex' => 'required'
//          'c_password' => 'required|same:password',

        ]);
        if($validator->fails()){
            return $this->generateJSON('error', 400, 'Registration Error!!', null);
        }


        $input = $request->all();

        $input['password'] = Hash::make($input['password']);
         $input['v_slug'] = $v_slug;
        $user = VoteeDetails::create($input);

        $success['token'] =  $user->createToken('MyApp')->accessToken;

        $success['name'] =  $user->name;

        return $this->generateJSON('success', 200, null, 'Registration Successfully!!');

    }
    
     public function Login(Request $request) 
    {      
        
        $user = User::all()->where('email', $request->username)->first();
        
        // $password = Hash::make($request->input('password'));
        
        
        if($user == null) {
            
           return $this->generateJSON('error', 401, "User doesn't Exist", null);
            
        }else{

            
            // if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
                
                $details = EndUserDetail::all()->where('email', $request->username)->first();
                  
                return $this->generateJSON('success', 200, "Login successful.", $details);
            
            // }else{
                
            //     return $this->generateJSON('error', 401, "Invalid credentials. The user credentials were incorrect.", null);
                
            // }
     
        
        
}
        
        

        // $tokenRequest = $request->create('/oauth/token', 'POST', $request->all());
        // $request->request->add([
        
        //   "client_id"     => 1,
        //   "client_secret" => 'iPiC51wKZI50RqrBOPHW1iKvaqO5pTj0aQukVrNG',
        //   "grant_type"    => 'personal_access',
        //   "scope"          => '*',
        // ]);

        // $response = Route::dispatch($tokenRequest);

        // $json = (array) json_decode($response->getContent());

        // if(array_key_exists('error', $json))
        // {
        //     return $this->generateJSON('error', 401, "Invalid credentials. The user credentials were incorrect.", null);
        // }
        // else
        // {
        //   (array)$json['enduserdetail'] = EndUserDetail::all()->where('email','=',$request['username'])->first();
           
        //     return $this->generateJSON('success', 200, "Login successful.", $json);
        // }

    }
    
    
    
    
    public function profile(Request $request){
        
        
        $profile = EndUserDetail::all()->where('user_id', $request->id)->first();
        
        return $this->generateJSON('success', 200, null, $profile);
        
    }
    
    public function updateProfile(Request $request) {
        
        try{
        
         $profile = EndUserDetail::all()->where('user_id', $request->id)->first();
        
        $user = User::all()->where('id', "=", $request->id)->first();
        
        $user->email = $request->email;
        
        $profile->fullname= $request->fullname;
        $profile->email = $request->email;
        $profile->residence_id = $request->residence_id;
        $profile->residence_lga = $request->residence_lga;
        $profile->state_id = $request->state_id;
        $profile->state_lga = $request->state_lga;
         $user->save();
        $profile->update();
       
        return $this->generateJSON('success', 200, null, "Profile updated successfully");
    
        }catch(\Illuminate\Database\QueryException $e){
          $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    // houston, we have a duplicate entry problem
                    return $this->generateJSON('error', 400,  "Email already exist try using another one" , null);
                }
        }
        
       
    }

    public function confirm( Request $request)
    {
        $email =  $request->email;
       try {
           $result = User::all()->where('email', '=', $email)->first();
           
        if($result != '' || $result != null){
          return $this->generateJSON('success', 200, null, 'Successful Validation'); 
        }else{
            return $this->generateJSON('error', 400, 'Invalid User', null); 
        }
    		
    	} catch (\Illuminate\Database\QueryException $e) {
    		return $this->generateJSON('error', 500, $e->errorInfo[2], null);
    	}
    }
    
    public function reset(Request $request) {
        $password = Hash::make($request->input('password'));
        $email =  $request->email;
        try {
        $votee = User::all()->where('email', '=', $email)->first();
        $votee->password = $password;
        $votee->save();
        return $this->generateJSON('success', 200, null, ["new"=> $votee->password, "type" => $password]);
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


    public function manifestos_api(Request $request)
    {
        $manifestos = manifesto::all()->where('user_id', $request->id )->toArray();
        return $this->generateJSON('success', 200, null, $manifestos);
    }

    public function user_api()
    {
        $user = User::all()->toArray();
        return $this->generateJSON('success', 200, null, $user);
    }



    public function vision_api(Request $request)
    {
        $visions = vision::all()->where('user_id', $request->id)->first();
        return $this->generateJSON('success', 200, null, $visions);
    }

    public function mission_api()
    {

        $missions = mission::all()->toArray();
        return $this->generateJSON('success', 200, null, $missions);
    }
    
    public function campaign_api(Request $request) {
        
        $campaign = Campaign::all()->where('user_id', $request->id)->toArray();
        return $this->generateJSON('success', 200, null, $campaign);
    }
    
    public function achievements_api(Request $request) {
        
        $achieve = Achievement::all()->where('user_id', $request->id)->toArray();
        return $this->generateJSON('success', 200, null, $achieve); 
    }
    
    public function donation(Request $request) {
        
        try{
            
            $donate = new donation();
            
            $donate->transact_id = $request->reference;
            $donate->user_id = $request->user_id;
            $donate->politician_id = $request->politician_id;
            $donate->status = $request->status;
            $donate->amount = $request->amount;
            
            $donate->save();
            
        return $this->generateJSON('success', 200, null, "Donation made successfully"); 
            
        }catch(\Illuminate\Database\QueryException $e){
            return $this->generateJSON('error', 500, $e->errorInfo[2], null);
        }
            
    }
    
}
