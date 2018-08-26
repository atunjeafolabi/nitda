<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OldPasswordRule implements Rule
{
    private $old_password;
    
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($old_password)
    {
        $this->old_password = $old_password;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Check if Old Password is correct
        return Hash::check($value, $this->old_password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Incorrect :attribute.';
    }
}
