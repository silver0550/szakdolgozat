<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Password implements Rule
{

    protected $capitalLetter = false;
    protected $hasNumber = false;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        foreach (str_split($value) as $char){

            if($char === strtoupper($char) && !intval($char)) {$this->capitalLetter = true;}
            
            if(intval($char)) {$this->hasNumber = true;}
        }

        return $this->capitalLetter && $this->hasNumber;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The password is Invalid';
    }
}
