<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class OvertimeDateRule implements Rule
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
        $timestamp_now = Carbon::now("Asia/Jakarta");
        $date_now = $timestamp_now->format("Y-m-d");
        $to_carbon = Carbon::parse($value,"Asia/Jakarta");
        $difference = $to_carbon->diffInDays($date_now);
        return $difference <=7;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The date difference can only be H +7 or H -7';
    }
}
