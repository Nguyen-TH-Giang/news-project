<?php

namespace App\Rules;

use App\Constants\Constants;
use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;

class QualifiedParent implements Rule
{
    protected $id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
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
        // If parent_id is null, it's valid (no parent)
        if ($value == Constants::EMPTY_VALUE || $value === null) {
            return true;
        }

        $relatedCategory = Category::where('status', Constants::ACTIVE)
            ->whereNull('deleted_at')
            ->whereNull('parent_id')
            ->where('id', '!=', $this->id)
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
