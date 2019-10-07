<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OvertimeTimesRule implements Rule
{
    protected $start_time;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($start_time)
    {
        $this->start_time = $start_time;
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
        return $value > $this->start_time;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'the End time must be higher than the Start time';
    }
}
