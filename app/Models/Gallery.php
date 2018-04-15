<?php

namespace App\Models;

use App\Traits\Taggable;
use App\Traits\Imageable;
use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use Taggable;
    use Imageable;
    use SoftDeletes;
    use Categorizable;

    protected $dates = ['deleted_at'];


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A creator may create zero or many gallery.
     *
     * This function will retrieve the creator of a gallery.
     * See: User' galleries() method for the inverse
     *
     * @return mixed
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /***************************************** ACCESSOR ******************************************/

    public function getPublishedAtFormattedAttribute()
    {
        echo ($this->published_at) ? 
                    '<strong class="text-green">YES</strong> <br>' .
                    '<span class="text-muted">' . 
                        $this->published_at->format('d-M-Y') . 
                    '<span>' : 
                    '<strong class="text-red">NO</strong>';
    }

    public function getCreatedAtFormattedAttribute()
    {
        echo $this->created_at->diffForHumans() . '<br>' .
                '<small class="text-muted">' .
                    $this->created_at->format('d-M-Y') .
                '</small>';
    }
}
