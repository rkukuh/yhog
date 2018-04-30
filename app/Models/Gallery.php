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
     * Many-to-Many: An event may have zero or many gallery.
     *
     * This function will retrieve the events of a gallery.
     * See: Event's galleries() method for the inverse
     *
     * @return mixed
     */
    public function events()
    {
        return $this->belongsToMany(Event::class);
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
