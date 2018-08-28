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
}
