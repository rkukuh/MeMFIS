<?php

namespace App;

/** Traits **/
use App\Traits\UuidKey;
use App\Traits\Timestampable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/** Relationship **/
use Spatie\MediaLibrary\Models\Media;

/** Scopes, Interfaces, Facades, Helpers  **/
use App\Models\Employee;
use App\Scopes\OrderByColumn;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Auditable, HasMedia
{
    use UuidKey;
    use HasRoles;
    use Notifiable;
    use SoftDeletes;
    use Timestampable;
    use HasMediaTrait;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'id',
        'password',
        'remember_token',
    ];

    protected $dates = ['deleted_at'];

    /***************************************** OVERRIDE *******************************************/

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('avatar')
             ->singleFile();
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
             ->width(25)
             ->height(25);
    }

    /******************************************* BOOT ********************************************/

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrderByColumn('name'));
    }

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-One: An Employee have one User account.
     *
     * This function will retrieve an Employee of a given User account.
     * See: Employee's user() method for the inverse
     *
     * @return mixed
     */
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    /**************************************** ACCESSOR *******************************************/

    /**
     * Get first role of this user
     *
     * @return void
     */
    public function getRoleAttribute()
    {
        if ($this->hasRole('admin'))
            return 'Admin';
    }
}
