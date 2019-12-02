<?php

namespace App\Models;

use App\MemfisModel;
use Spatie\Tags\HasTags;
use Spatie\MediaLibrary\Models\Media;
use App\Models\Pivots\PurchaseOrderItem;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Service extends MemfisModel implements HasMedia
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
        'is_ppn',
        'ppn_amount',
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
     *
     * @return mixed
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    /***************************************** ACCESSOR ******************************************/

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
