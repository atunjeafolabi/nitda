<?php

namespace App\Http\Controllers\Applicants;

use App\Applicant;
use App\Http\Controllers\Controller;
use App\Rules\OldPasswordRule;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    public function index() {
        
    }
    
    public function showEditForm() {
        
        $id = Auth::guard('applicant')->user()->id;
        $applicant = Applicant::find($id)->first();
        
        return view('applicants.profile.edit')->with('applicant', $applicant);
    }
    
    public function edit(Request $request) {
        
        $id = Auth::guard('applicant')->user()->id;
        $applicant = Applicant::find($id)->first();
        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
        ]);
        
        $applicant->update($request->all());
        
        session()->flash('success-msg', 'Account Information Updated Successfully');
        
        return redirect()->route('applicant.dashboard');
    }
    
    public function showChangePasswordForm(){
        return view('applicants.profile.changePassword');
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
