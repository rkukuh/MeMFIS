<?php

namespace App\Models;

use App\MemfisModel;
use App\Scopes\OrderByColumn;
use App\Models\Pivots\EmployeeLicense;
use Illuminate\Database\Eloquent\Builder;

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

    /******************************************* SCOPE *******************************************/

    /**
     * Scope a query to only include license of General License.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfGeneralLicense(Builder $query)
    {
        return $query->where('code', 'general-license');
    }

    /**
     * Scope a query to only include license of AME License.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfAMELDGCA(Builder $query)
    {
        return $query->where('code', 'amel-dgca');
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
                    ->withPivot(
                        'number',
                        'issued_at',
                        'valid_until',
                        'revoke_at'
                    )
                    ->withTimestamps();
    }
}
