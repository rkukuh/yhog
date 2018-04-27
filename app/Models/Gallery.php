<?php

namespace App\Models;

use App\Traits\Taggable;
use App\Traits\Blameable;
use App\Traits\Imageable;
use App\Traits\Publishable;
use App\Traits\Categorizable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use Taggable;
    use Blameable;
    use Imageable;
    use Publishable;
    use Categorizable;

    use SoftDeletes;

    protected $fillable = [
        'creator_id',

        'event_id',
        'title',
        'description',
        
        'published_at',
    ];

    protected $dates = [
        'deleted_at',
        'published_at',
    ];


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-One: A gallery can be attached to an event
     *
     * This function will retrieve the event of a gallery.
     * See: Event's gallery() method
     *
     * @return mixed
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }


    /***************************************** ACCESSOR ******************************************/

    public function getTitleLimitedAttribute()
    {
        if (strlen($this->title) >= 40) {

            echo substr($this->title, 0, 40) . '...';

            return;
        }

        return $this->title;
    }
}
