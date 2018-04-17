<?php

namespace App\Models;

use App\Traits\Taggable;
use App\Traits\Blameable;
use App\Traits\Imageable;
use App\Traits\Publishable;
use App\Traits\Categorizable;

use Illuminate\Database\Eloquent\Model;
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
        'excerpt',
        'body',

        'published_at',
    ];

    protected $dates = [
        'deleted_at',
        'published_at',
    ];


    /******************************************* SCOPE *******************************************/

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

        // TODO: Use 'deleted' hooks to delete any related image(s)
    }


    /***************************************** ACCESSOR ******************************************/

    public function getExcerptLimitedAttribute()
    {
        if (strlen($this->excerpt) >= 50) {

            echo substr($this->excerpt, 0, 50) . '...';

            return;
        }

        return $this->excerpt;
    }
}
