<?php

namespace App\Http\Controllers;

use App\FederalConstituency;
use App\lcda;
use App\party;
use App\position;
use App\senatorialDistrict;
use App\State;
use App\manifesto;
use App\vision;
use App\mission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\billing;
use App\userDetail;
use Illuminate\Http\Request;
use App\User;
use App\stateDetail;
use App\Transaction;
use App\Newsletter;
use App\PaymentDetail;
use Session;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index()
    {
        $id = 1;
        $politicians = User::all()->where('priviledge', 1)->sortByDesc('created_at');
    	return view('admin.index', compact('politicians','id'));
    }

    public function deactivate($id)
    {
       $user = User::find($id);
       $user->is_activated = 0;
       $user->save();
    }

    public function toActivate($id)
    {
        $user = User::find($id);
        $billings = billing::all();
        return view('admin.selectPlan',compact('user','billings'));
    }

    public function sendActivate($id, Request $request)
    {
        $user = User::find($id);
        $user_email = $user->email;
        $user_name = $user->userDetail->lastname.' ' . $user->userDetail->firstname;
        $admin = User::all()->where('priviledge',0)->first();
        $admin_email = $admin->email;
        $billing = billing::all()->where('id',$request->plan)->first();

        $data = array(
            'name' =>$user->userDetail->lastname. ' ' . $user->userDetail->firstname,
            'email' => $user->email,
            'plan_id' => $billing->id,
            'user_id' => $user->id,
            'plan' => $billing->name,
            'duration' => $billing->duration,
            'price' => $billing->price
        );

        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.activation', $data, function($message) use($admin_email,$user_email,$user_name){
            $message
                ->from($admin_email,'support.talk2gov@raoatech.com')
                ->to($user_email, $user_name)
                ->subject('Talk2Gov Account Activation');
        });


        $this->displayMessages('success','Notification sent successfully!!');
        return redirect('/admin/index');
    }

    public function showPayment($user_id, $plan_id)
    {
        $user = User::find($user_id);
        $plan = billing::find($plan_id);
        return view('admin.billing.pay', compact('user','plan'));
    }

    public function savePayment(Request $request)
    {
        try{
           
            $check = Transaction::all()->where('user_id', $request->user_id)->first();
            if($check == null)
            {
            $transaction = new Transaction();
            $transaction::create([
                'transact_id' => $request->transact_id,
                'status' => $request->status,
                'user_id' => $request->user_id,
                'day_count' => 0,
                'cron_status' => 'ACTIVATED',
                'billing_id' => $request->plan_id,
                'payin_time' => $request->payin_time
            ]);
            $user = User::find($request->user_id);
            $user->is_active = 1;
            PaymentDetail::create([
                    'user_id' => $request->user_id,
                    'billing_id' => $request->plan_id,
                    'payin_time' => $request->payin_time
            ]);
            $user->save();
            $data = array(
                'politicianName' => $user->userDetail->lastname. ' '. $user->userDetail->firstname,
                'email' => $user->userDetail->email,
                'subject' => 'Politician Account Payment Notification',
               );

            $politician_email = $user->email;
            $politician_name = $user->userDetail->lastname. ' '. $user->userDetail->firstname;
            $subject = 'Politician Account Payment Notification';


            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('emails.userPaymentNotification', $data, function($message) use($politician_email,$politician_name,$subject){
                $message
                    ->from($politician_email,$politician_name)
                    ->to('info@raoatech.com', 'support@talk2gov.com')
                    ->subject($subject);
            });

                return  response()->json(['success'=>'Payment successfull']);
                
            }else{
                $check->transact_id = $request->transact_id;
                $check->status = $request->status;
                $check->day_count = 0;
                $check->cron_status = 'ACTIVATED';
                $check->billing_id = $request->plan_id;
                $check->payin_time = $request->payin_time;

                $user = User::find($request->user_id);
                $user->is_active = 1;
    
                    PaymentDetail::create([
                        'user_id' => $request->user_id,
                        'billing_id' => $request->plan_id,
                        'payin_time' => $request->payin_time
                    ]);
                    $user->save();
                    $check->save();
                    $data = array(
                        'politicianName' => $user->userDetail->lastname. ' '. $user->userDetail->firstname,
                        'email' => $user->userDetail->email,
                        'subject' => 'Politician Account Payment Notification',
                       );
        
                    $politician_email = $user->email;
                    $politician_name = $user->userDetail->lastname. ' '. $user->userDetail->firstname;
                    $subject = 'Politician Account Payment Notification';
        
        
                    $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
                    $beautymail->send('emails.userPaymentNotification', $data, function($message) use($politician_email,$politician_name,$subject){
                        $message
                            ->from($politician_email,$politician_name)
                            ->to('info@raoatech.com', 'support@talk2gov.com')
                            ->subject($subject);
                    });

                    return  response()->json(['success'=>'Payment successfull']);
            }
        }catch(\Exception $e){
            return   response()->json(['error'=> $e]);
        }
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect('/admin/login');
    }

    public function showResetForm()
    {
        return view('admin.auth.email');
    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $admin = User::all()->where('email',$request->email)->first();
        if($admin == null)
        {
            $this->displayMessages('error',"Super Admin not found!");
            return redirect('/admin/login');
        }else{
            if($admin->priviledge == 1 || $admin->priviledge == 2){
                $this->displayMessages('error',"Only Super Admin Can Login Here! Kindly use the correct login to continue");
                return redirect('/admin/login');
            }
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $this->displayMessages('success','Login successful!');
            return redirect('/admin/index');
        }
        else{
            $this->displayMessages('error',"Credentials doesn't match our records! Kindly check and try again!");
            return redirect('/admin/login');
        }
    }

    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'priviledge' => 0,
            'is_active' => 1
        ]);
        $this->displayMessages('success','Super Admin Created Successfully!');
        return redirect(action('AdminController@showLoginForm'));

    }
    
    public function createUser()
    {
        $states = State::all();
        $parties = party::all();
        $positions = position::all();
        $senatorialDistricts = senatorialDistrict::all();
        $federalConsts = FederalConstituency::all();
        $lcdas = lcda::all();
        return view('admin.createUser', compact('states','parties','positions','senatorialDistricts','federalConsts','lcdas'));
    }

    public function saveUser(Request $request)
    {
        $createUser =  User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'priviledge' => 1,
            'is_active' => 0
        ]);
        $state = stateDetail::create([
            'user_detail_id' => $createUser->id,
            'state_id' => $request->state_id,
            'position_id' => $request->position_id,
            'senatorial_district_id' => $request->senatorialDist_id,
            'federal_constituency_id' => $request->federalConst_id,
            'lcda_id' => $request->lcda_id
        ]);
        if($request->picture == null){
            $users = userDetail::create([
                'user_id' => $createUser->id,
                'title' => $request->title,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'middlename' => $request->middlename,
                'email' => $request->email,
                'party_id' => $request->party_id,
                'state_detail_id' => $state->id,
                'profile' => $request->profile
            ]);
        }else{
            $photoName = time().'.'.$request->picture->getClientOriginalExtension();
            $request->picture->move(public_path('images/uploads'), $photoName);
            $users = userDetail::create([
                'user_id' => $createUser->id,
                'title' => $request->title,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'middlename' => $request->middlename,
                'email' => $request->email,
                'party_id' => $request->party_id,
                'state_detail_id' => $state->id,
                'profile' => $request->profile,
                'picture' => $photoName
            ]);
        }

        $manifesto = manifesto::create([
            'user_id' => $createUser->id,
            'content' => $request->get('manifesto')
        ]);

        $mission = mission::create([
            'user_id' => $createUser->id,
            'content' => $request->get('mission')
        ]);

        $vision = vision::create([
            'user_id' => $createUser->id,
            'content' => $request->get('vision')
        ]);

        $this->displayMessages('success','User created Successfully!');
        return redirect(action('AdminController@index'));
    }


    public function userEdit($id)
    {
        $user = User::find($id);
        // $stateDetail = stateDetail::all()->where('user_detail_id',$user->id)->first();
        return view('admin.editUser',compact('user'));
    }

    public function userUpdate($id, Request $request)
    {
        $user = userDetail::all()->where('user_id', $id)->first();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->middlename = $request->middlename;
        $user->email = $request->email;
        $user->sub_code = $request->sub_code;
        $user->save();
        $this->displayMessages('success','User Updated Successfully!');
        return redirect(action('AdminController@index'));
    }
    public function newslettersSubscribers()
    {
        $id = 1;
        $news = Newsletter::all();
        return view('admin.newsletterSubscribers', compact('news','id'));
    }
    public function billing()
    {
        $id = 1;
        $billings = billing::all();
        return view('admin.billing.index',compact('billings','id'));
    }

    public function createBilling()
    {
        return view('admin.billing.create');
    }

    public function createBill(Request $request)
    {
        billing::create([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration
        ]);
        $this->displayMessages('success','Bill Created Successfully!');
        return redirect(action('AdminController@billing'));
    }

    public function editBilling($id)
    {
        $bill = billing::find($id);
        return view('admin.billing.edit', compact('bill'));
    }

    public function updateBilling($id, Request $request)
    {
        $bill = billing::find($id);
        $bill->name = $request->name;
        $bill->duration = $request->duration;
        $bill->price = $request->price;
        $bill->save();
        $this->displayMessages('success','Bill Updated Successfully!');
        return redirect(action('AdminController@billing'));
    }

    public function deleteBilling($id)
    {
        $bill = billing::find($id);
        $bill->delete();
        $this->displayMessages('success','Bill Deleted Successfully!');
        return redirect(action('AdminController@billing'));
    }


    function displayMessages($title, $message)
    {
        Session::flash($title,$message);
    }


}
