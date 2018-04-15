<?php

namespace App\Models;

use App\User;
use App\Traits\Taggable;
use App\Traits\Imageable;
use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use Taggable;
    use Imageable;
    use SoftDeletes;
    use Categorizable;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'target',
        'location',
        'video_url',
        'end_at',
    ];

    protected $dates = [
        'end_at',
        'deleted_at',
    ];


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A creator may create zero or many donation.
     *
     * This function will retrieve the author of an donation.
     * See: User' donations() method for the inverse
     *
     * @return mixed
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /***************************************** ACCESSOR ******************************************/

    public function getLocationFormattedAttribute()
    {
        if ($this->location) {

            echo nl2br($this->location);
            return;
        }

        echo '<i class="fa fa-map-marker text-red"></i> ' .
                '<i class="fa fa-question-circle-o text-blue"></i>';
    }

    public function getTargetFormattedAttribute()
    {
        if ($this->target) {

            echo number_format($this->target);

            return;
        }
        else {
            
            echo '<span style="font-size: 20px;">∞</span> <br>' . 
                    '<small class="text-muted">(continuous)</small>';
        }
    }

    public function getCreatedAtFormattedAttribute()
    {
        echo $this->created_at->diffForHumans() . '<br>' .
                '<small class="text-muted">' .
                    $this->created_at->format('d-M-Y') .
                '</small>';
    }
}
