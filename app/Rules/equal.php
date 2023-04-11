<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class equal implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(public $toCompare)
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
        return $this->toCompare === $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'SELF The validation error message.';
    }
}
