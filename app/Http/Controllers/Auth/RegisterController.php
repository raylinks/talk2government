<?php

namespace App\Http\Controllers\Auth;

use App\Mail\UserRegistration;
use Illuminate\Support\Facades\Mail;
use Session;
use App\User;
use App\userDetail;
use App\stateDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/auth/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'party_id' => 'required',
            'image' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $createUser =  User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'priviledge' => 1,
            'is_active' => 0
            ]);
            $photoName = time().'.'.$data['image']->getClientOriginalExtension();
            $data['image']->move(public_path('/images/credentials'), $photoName);


            if($data['aspirant_id'] = 'president'){
                $position = 1;
            }elseif($data['sen_id'] != 0){
                $position = 3;
            }elseif($data['fed_id'] != 0){
                $position = 4;
            }elseif($data['lcda_id'] != 0){
                $position = 5;
            }else{
                $position = 2;
            }

            $users = userDetail::create([
                'user_id' => $createUser->id,
                'title' => $data['title'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'middlename' => $data['middlename'],
                'email' => $data['email'],
                'party_id' => $data['party_id'],
                'state_id' => $data['state_id'],
                'position_id' => $position,
                'senatorial_district_id' => $data['sen_id'],
                'federal_constituency_id' => $data['fed_id'],
                'lcda_id' => $data['lcda_id'],
                'image' => $photoName,
                'profile' => $data['profile']
            ]);

            #This is the mail Aspect of the app(Beauty Mail)
            
            $admin = User::all()->where('priviledge', 0)->first();
            $admin_email = $admin->email;
            $user_email = $data['email'];
            $user_name = $data['lastname'];

        $data = array(
            'firstname' => $data['firstname'],
            'lastname' =>  $data['lastname'],
            'email' => $data['email'],
        );

        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.registerNotification', $data, function($message) use($admin_email,$user_email,$user_name){
            $message
            
                ->from('raoatech@gmail.com','support.talk2gov@raoatech.com')
                ->to('info@raoatech.com')
                ->subject('New Politician Just Registered! Kindly activate to continue!');
        });
            $this->displayMessages('success','User created Successfully!');
            return $createUser;
    }

    function displayMessages($title, $message)
    {
        Session::flash($title,$message);
    }
}
