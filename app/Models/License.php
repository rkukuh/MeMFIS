<?php

namespace App\Models;

use App\MemfisModel;
use App\Scopes\OrderByColumn;
use App\Models\Pivots\EmployeeLicense;

class License extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'regulator',
    ];

    /******************************************* BOOT ********************************************/

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrderByColumn('name'));
    }

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Many-to-Many: An employee may have zero or many license.
     *
     * This function will retrieve all the employess of a license.
     * See: Employee's licenses() method for the inverse
     *
     * @return mixed
     */
    public function employees()
    {
        return $this->belongsToMany(Employee::class)
                    ->using(EmployeeLicense::class)
                    ->as('licensed_employee')
                    ->withPivot(
                        'code',
                        'issued_at',
                        'valid_until',
                        'revoke_at'
                    )
                    ->withTimestamps();
    }
}
