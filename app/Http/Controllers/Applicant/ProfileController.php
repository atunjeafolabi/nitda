<?php

namespace App\Http\Controllers\Applicant;

use App\Applicant;
use App\Http\Controllers\Controller;
use App\Lga;
use App\Rules\OldPasswordRule;
use App\State;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    public function index() {
        
    }
    
    public function showEditForm() {
        
        $states = State::all();
        $lgas = Lga::all();
        
        $id = Auth::guard('applicant')->user()->id;
        $applicant = Applicant::find($id)->first();
        
        return view('applicant.profile.edit')->with(['applicant' => $applicant, 'states' => $states, 'lgas' => $lgas]);
    }
    
    public function edit(Request $request) {
        
        $id = Auth::guard('applicant')->user()->id;
        $applicant = Applicant::find($id)->first();
        
        $rules = Applicant::validationRules();
        unset($rules['email']); unset($rules['password']); //remove email and password rules from array
        $this->validate($request, $rules);
        
        $applicant->update($request->all());
        
        session()->flash('success-msg', 'Account Information Updated Successfully');
        
        return redirect()->route('applicant.dashboard');
    }
    
    public function showChangePasswordForm(){
        return view('applicant.profile.changePassword');
    }
    
    public function changePassword(Request $request) {
        
        $guard = 'applicant';
        
        $applicant = Auth::guard($guard)->user();
        
        $this->validate($request, [
            'old_password' => ['required', 'string', 'min:6', new OldPasswordRule($applicant->password)],
            'new_password' => 'required|string|min:6|confirmed',
            'new_password_confirmation' => 'required|string|min:6',
        ]);

        $encryptedPassword = bcrypt($request->new_password);
        
        if($applicant->update(['password' => $encryptedPassword])){
            session()->flash('success-msg', 'Password Changed Successfully');     
        }
        
        return redirect()->route('applicant.dashboard');
    }
}
