<?php

namespace App\Rules;

use App\Constants\Constants;
use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;

class QualifiedParent implements Rule
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
        $relatedCategory = Category::where('parent_id', null)
                            ->where('status', Constants::ACTIVE)
                            ->whereNotNull('deleted_at')
                            ->find($value);

        return $relatedCategory !== null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return [
            'parent_id' => 'The selected parent is not valid or the current category is a parent!'
        ];
    }
}
