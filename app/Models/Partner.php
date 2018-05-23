<?php

namespace App\Models;

use App\Traits\Taggable;
use App\Traits\Blameable;
use App\Traits\Imageable;
use App\Traits\Publishable;
use App\Traits\Categorizable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use Taggable;
    use Blameable;
    use Imageable;
    use Publishable;
    use Categorizable;

    use SoftDeletes;

    protected $fillable = [
        'creator_id',

        'title',
        'body',

        'published_at',
    ];

    protected $dates = [
        'deleted_at',
        'published_at',
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

        static::created(function ($partner) {

            // TODO: Force delete preview partners, if any

        });

        static::deleted(function ($partner) {

            // Remove respective Ad Unit, if any
            $partner->advertisements()->delete();

        });
    }


    /******************************************* SCOPE *******************************************/

    /**
     * Scope a query to only include popular users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    /**
     * Scope a query to only include category of event partner.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfEvent(Builder $query)
    {
        return $query->whereHas('categories', function ($filter) {

            $filter->where('slug', 'event-partner');

        });
    }

    /**
     * Scope a query to only include category of yayasan partner.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfYayasan(Builder $query)
    {
        return $query->whereHas('categories', function ($filter) {

            $filter->where('slug', 'yayasan-partner');

        });
    }


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Many-to-Many: An event may have zero or many partner.
     *
     * This function will retrieve the events of a partner.
     * See: Event's partners() method for the inverse
     *
     * @return mixed
     */
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    /**
     * One-to-Many: A partner may have zero or many advertisements.
     *
     * This function will retrieve the advertisements of a partner.
     * See: Advertisement's partner() method for the inverse
     *
     * @return mixed
     */
    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }
}
