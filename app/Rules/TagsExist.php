<?php

namespace App\Rules;

use App\Constants\Constants;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class TagsExist implements Rule
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
        if (count($value) === 1 && $value[0] == Constants::EMPTY_VALUE) {
            return true;
        }

        if (is_array($value)) {
            foreach ($value as $singleValue) {
                if ($singleValue !== Constants::EMPTY_VALUE) {
                    $exists = DB::table('tags')->where('id', $singleValue)->exists();
                    if (!$exists) {
                        return false;
                    }
                } else {
                    return false;
                }
            }
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'One or more selected tags do not exist!';
    }
}
