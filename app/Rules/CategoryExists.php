<?php

namespace App\Rules;

use App\Constants\Constants;
use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;

class CategoryExists implements Rule
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

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($value == Constants::EMPTY_VALUE) {
            return true;
        }

        return Category::where('id', $value)->where('status', Constants::ACTIVE)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The selected category does not exist!';
    }
}
