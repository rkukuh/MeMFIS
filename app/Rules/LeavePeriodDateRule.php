<?php

namespace App\Rules;

use App\Models\LeavePeriod;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Validation\Rule;

class LeavePeriodDateRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->attribute = "period_end";
        $this->start = null;
        
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
        $status = true; 

        if($attribute == "period_start"){
            $this->attribute = $attribute; 
            $this->start = LeavePeriod::whereDate('period_start','<', $value)->whereDate('period_end','>', $value)->get();

            if(sizeof($this->start) > 0){ 
                $status = false; 
            }

        }else{
            $this->attribute = $attribute; 
            $this->start = LeavePeriod::whereDate('period_start','<', $value)->whereDate('period_end','<', $value)->get();

            if(sizeof($this->start) > 0){ 
                $status = false; 
            }

        }

        return $status;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'There is already a leave period on that date. ';
    }
}
