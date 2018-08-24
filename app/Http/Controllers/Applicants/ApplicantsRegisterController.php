<?php

namespace App\Http\Controllers\Applicants;

use App\Applicant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationConfirmation;
use Carbon\Carbon;

class ApplicantsRegisterController extends Controller
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
    protected $redirectTo = '/home';
    
    protected $guard = 'applicant';
    
    private $email_activation_token;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('applicant');
//    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
//            TODO:$email_activation_token = generate_unique_token();
        $this->email_activation_token = str_random(32);
        
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:applicants',
            'password' => 'required|string|min:6|confirmed',
            'email_activation_token' => $this->email_activation_token,
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
        return Applicant::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_activation_token' => $this->email_activation_token,
        ]);
    }
    public function showRegistrationForm()
    {
        return view('applicants.register');
    }
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        
        $applicant = $this->create($request->all());
        
        if($applicant){
            //Successful Registration
            event(new Registered($applicant));
            $this->sendEmailConfirmation($applicant, $this->email_activation_token);
            $message = 'Registration Successful. Please check your email and click the link sent to you for confirmation';
        }else{
            //Unsuccessful Registration
            $message = 'Unable to Register. Please kindly try again!';
        }
        
        return view('applicants.registration-confirmation')->with(['applicant' => $applicant, 'message' => $message]);
    }
    
    public function sendEmailConfirmation($applicant, $email_activation_token) {
        try {
            Mail::to($applicant->email)->send(new RegistrationConfirmation($applicant,$email_activation_token));
//            echo 'Mail send successfully';
        } catch (\Exception $e) {
            echo 'Error - '.$e;
        }
    }
    
    public function verifyEmail($email_activation_token) {
        
        $applicant = Applicant::where(['email_activation_token' => $email_activation_token])->first();
        
        if($applicant){
            
            if($applicant->status == 0){
                $applicant->confirmed_at = Carbon::now();
                $applicant->status = 1;

                if($applicant->save()){
                   $message = 'Congrats! Email Confirmed Successfully. You can now Login';
                }
            }else{
                $message = 'This Email is already Confirmed. Login Below';
            }
            
        }else{
            $message = 'Invalid Email Activation Token!';
        }
        
        session()->flash('verify_email_status', $message);
        
        return redirect()->route('applicant.login');
    }
}
