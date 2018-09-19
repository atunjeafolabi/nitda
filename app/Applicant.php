<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ApplicantResetPasswordNotification;

class Applicant extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'othername', 'sex', 'origin_lga', 'origin_state', 'dob', 'phone', 'address_of_residence', 'lga_of_residence', 'state_of_residence', 'email', 'password', 'email_activation_token', 'confirmed_at', 'status',
    ];
    
    public $guards = 'applicant';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_activation_token',
    ];
    public function getFullNameAttribute()
    {
         return	$this->firstname.' '.$this->lastname;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ApplicantResetPasswordNotification($token));
    }

    public static function validationRules() {
        return [
            'firstname' => 'required|alpha_dash|max:255',
            'lastname' => 'required|alpha_dash|max:255',
            'othername' => 'nullable|alpha_dash|max:255',
            'sex'   => 'required',
            'lga_of_residence' => 'required',
            'state_of_residence' => 'required',
            'origin_state' => 'required',
            'origin_lga' => 'required',
            'dob' => 'required',
            'phone' => 'required|numeric|digits:11',
            'address_of_residence' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:applicants',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
    public function stateOfResidence()
    {
        return $this->belongsTo('App\State', 'state_of_residence');
    }
    
    public function lgaOfResidence()
    {
        return $this->belongsTo('App\Lga', 'lga_of_residence');
    }
    
    public function stateOfOrigin()
    {
        return $this->belongsTo('App\State', 'origin_state');
    }    
    
    public function lgaOfOrigin()
    {
        return $this->belongsTo('App\Lga', 'origin_lga');
    }

    public function oLevelRecords()
    {
        return $this->hasMany('App\OLevelRecord', 'applicants_id');
    }
}
