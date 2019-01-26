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
        'manufacturer_id',
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
     * M-M Polymorph: An AMEL content could be aircraft and/or engine.
     *
     * This function will aet all of the Item (engine)'s AMEL.
     * Amel's amelable() method for the inverse
     *
     * @return mixed
     */
    public function amels()
    {
        return $this->morphToMany(Amel::class, 'amelable');
    }

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
     * Many-to-Many: A task card (EO) may have zero or many items.
     *
     * This function will retrieve all the EO Instructions of an item.
     * See: EOInstruction's items() method for the inverse
     *
     * @return mixed
     */
    public function eo_instructions()
    {
        return $this->belongsToMany(TaskCard::class, 'eo_item', 'item_id', 'eo_id')
                    ->withPivot('quantity')
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
     * One-to-Many: A manufacturer can create zero or many items.
     *
     * This function will get a manufacturer of an item.
     */
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    /**
     * Many-to-Many: A project may have one or many item.
     *
     * This function will retrieve all the projects of an item.
     * See: Project's items() method for the inverse
     *
     * @return mixed
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class)
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
     * Many-to-Many: A task card may have zero or many items.
     *
     * This function will retrieve all the task cards of an item.
     * See: TaskCard's items() method for the inverse
     *
     * @return mixed
     */
    public function taskcards()
    {
        return $this->belongsToMany(TaskCard::class, 'item_taskcard', 'item_id', 'taskcard_id')
                    ->withPivot('quantity')
                    ->withTimestamps();
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
     * Many-to-Many: A work package may have one or many item.
     *
     * This function will retrieve all the work packages of an item.
     * See: WorkPackage's items() method for the inverse
     *
     * @return mixed
     */
    public function workpackages()
    {
        return $this->belongsToMany(WorkPackage::class, 'item_workpackage', 'item_id', 'workpackage_id')
                    ->withPivot('quantity')
                    ->withTimestamps();
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
