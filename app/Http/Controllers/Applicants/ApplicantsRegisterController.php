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

use App\State;
use App\Lga;

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
        return Validator::make($data, Applicant::validationRules());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Applicant
     */
    protected function create(array $data)
    {
        return Applicant::create($data);
    }
    
    public function showRegistrationForm()
    {
        $states = State::all();
        $lgas = Lga::all();

        return view('applicants.register')->with(['states' => $states, 'lgas' => $lgas]);
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

        //Generate Random Email Activation Token and append it to formDataArray
        $this->email_activation_token = str_random(32);
        $formDataArray = $request->all();
        $formDataArray['email_activation_token'] = $this->email_activation_token;
        //encrypt the password
        $formDataArray['password'] = bcrypt($request->password);
        
        $applicant = $this->create($formDataArray);
        
        if($applicant){
            //Successful Registration
            event(new Registered($applicant));
            
            if($this->sendEmailConfirmation($applicant, $this->email_activation_token)){
                $message = 'Registration Successful. Please check your email and click the link sent to you for confirmation';
            }else{
                $message = 'Registration Successful. Unable To Send Email Confirmation Link';
            }
            
            
        }else{
            //Unsuccessful Registration
            $message = 'Unable to Register. Please kindly try again!';
        }
        
        return view('applicants.registration-confirmation')->with(['applicant' => $applicant, 'message' => $message]);
    }
    
    public function sendEmailConfirmation($applicant, $email_activation_token) {
        try {
            Mail::to($applicant->email)->send(new RegistrationConfirmation($applicant,$email_activation_token));
            return true;
        } catch (\Exception $e) {
            return false;
//            echo 'Error - '.$e;
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
                   session()->flash('success-msg', $message);
                }
            }else{
                $message = 'This Email is already Confirmed. Login Below';
                session()->flash('success-msg', $message);
            }
            
        }else{
            $message = 'Invalid Email Activation Token!';
            session()->flash('danger-msg', $message);
        }
        
        return redirect()->route('applicant.login');
    }
}
