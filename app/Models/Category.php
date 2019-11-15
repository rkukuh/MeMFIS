<?php

namespace App\Models;

use App\MemfisModel;
use Directoryxx\Finac\Model\Coa;
use App\Scopes\OrderByColumn;
use Illuminate\Database\Eloquent\Builder;

class Category extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'of',
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
     * Scope a query to only include category of item.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfItem(Builder $query)
    {
        return $query->where('of', 'item');
    }

    /**
     * Scope a query to only include category of task card EO.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfTaskCardEO(Builder $query)
    {
        return $query->where('of', 'taskcard-eo');
    }

    /*************************************** RELATIONSHIP ****************************************/


    /**
     * Polymorphic: An entity can have zero or many coa.
     *
     * This function will get all category's coa.
     * See: Coa's coa() method for the inverse
     *
     * @return mixed
     */
    public function coa()
    {
        return $this->morphToMany(Coa::class, 'coable')->withPivot('type_id');
    }

    /**
     * M-M Polymorphic: An item can have zero or many categories.
     *
     * This function will get all of the items that are assigned to this category.
     * See: Item's categories() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->morphedByMany(Item::class, 'categorizable');
    }

    /**
     * One-to-Many: A project must have an aircraft
     *
     * This function will retrieve all the projects of an aircraft.
     * See: Project's aircraft() method for the inverse
     *
     * @return mixed
     */
    public function taskcards()
    {
        return $this->hasMany(TaskCard::class);
    }


}
