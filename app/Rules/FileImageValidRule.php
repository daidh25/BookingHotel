<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FileImageValidRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    private function isValidImage($file)
    {
        // dd($file->getSize() <= 1024 * 1024);
        return $file->isValid() && in_array($file->extension(), ['jpg', 'jpeg', 'png', 'gif', 'bmp']) && $file->getSize() <= (1024 * 1024 * 1024 * 1024);
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
        foreach ($value as $file) {
            // Check if each file is an image with valid extensions
            if (!$this->isValidImage($file)) {
                // dd($file->getClientOriginalName());
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ảnh không đúng định dạng hoặc quá kích thước cho phép (1MB)';
    }
}
