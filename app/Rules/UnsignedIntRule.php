<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UnsignedIntRule implements Rule
{
    protected $minValue = 0;
    protected $attribute;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($minValue, $attribute)
    {
        $this->minValue = $minValue;
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
        return is_numeric($value) && is_int((int)$value) && $value > $this->minValue && preg_match('[^0-9\s]', $value) === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "$this->attribute không hợp lệ";
    }
}
