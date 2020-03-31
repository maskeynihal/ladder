<?php

namespace maskeynihal\ladder\Rules;

use Illuminate\Contracts\Validation\Rule;
use maskeynihal\ladder\Hierarchy;

class CannotBeOwnParentRule implements Rule
{
    private $title;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($title)
    {
        $this->title = $title;
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
        $hierarchy  = Hierarchy::where('title', $this->title)->first();
        
        if($value == optional($hierarchy)->hierarchy_id){
            return false;
        }else{
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
        return "Can't assign parent to itself";
    }
}
