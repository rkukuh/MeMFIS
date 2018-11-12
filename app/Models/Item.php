<?php

namespace App\Models;

use App\MemfisModel;
use Spatie\Tags\HasTags;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Item extends MemfisModel implements HasMedia
{
    use HasTags;
    use HasMediaTrait;

    protected $fillable = [
        'code',
        'name',
        'description',
        'unit_id',
        'barcode',
        'is_stock',
        'is_ppn',
        'ppn_amount',
        'account_code',
    ];

    /***************************************** OVERRIDE *******************************************/

    public function registerMediaCollections()
    {
        $this->addMediaCollection('item')
             ->singleFile();
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
             ->width(45)
             ->height(45);
    }

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * M-M Polymorphic: An item can have zero or many categories.
     *
     * This function will get all of the categories that are assigned to this item.
     * See: Category's items() method for the inverse
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    /**
     * One-Way 1-1: An item must have initial unit.
     *
     * This function will get a unit of a given item.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Many-to-Many: An item may have zero or many unit.
     *
     * This function will retrieve the units of an item.
     * See: Unit's items() method for the inverse
     *
     * @return mixed
     */
    public function units()
    {
        return $this->belongsToMany(Unit::class)
                    ->as('uom')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    /**
     * Many-to-Many: An item may have zero or many storage.
     *
     * This function will retrieve the storages of an item.
     * See: Unit's items() method for the inverse
     *
     * @return mixed
     */
    public function storages()
    {
        return $this->belongsToMany(Storage::class)
                    ->withPivot('min', 'max')
                    ->withTimestamps();
    }

    /**
     * One-to-Many: An item may have zero or one account code (journal).
     *
     * This function will retrieve the account code (journal) of an item.
     * See: Journal's items() method for the inverse
     *
     * @return mixed
     */
    public function journal()
    {
        return $this->belongsTo(Journal::class, 'account_code');
    }

    /**
     * Polymorph: An AMEL content could be aircraft and/or engine.
     *
     * This function will aet all of the Item (engine)'s AMEL.
     * Amel's amelable() method for the inverse
     *
     * @return mixed
     */
    public function amels()
    {
        return $this->morphMany(Amel::class, 'amelable');
    }

    /***************************************** ACCESSOR ******************************************/

    /**
     * Get the item's account code and name.
     *
     * @param  string  $value
     * @return string
     */
    public function getAccountCodeAndNameAttribute($value)
    {
        if (isset($this->journal)) {
            return $this->journal->code.' - '.$this->journal->name;
        }
    }

    /**
     * Get the item's single category.
     *
     * @param  string  $value
     * @return string
     */
    public function getCategoryAttribute($value)
    {
        return optional($this->categories->first());
    }
}
