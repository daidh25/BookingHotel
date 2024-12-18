<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StringValidRule implements Rule
{
    protected $attribute;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($attribute)
    {
        $this->attribute = $attribute;
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
        return $value != null && mb_strlen($value, 'UTF-8') <= 255 && mb_strlen($value, 'UTF-8') >= 5;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "$this->attribute không hợp lệ!";
    }
}
