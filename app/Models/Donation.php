<?php

namespace App\Models;

use App\Traits\Taggable;
use App\Traits\Blameable;
use App\Traits\Imageable;
use App\Traits\Activeable;
use App\Traits\HasDeadline;
use App\Traits\Categorizable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use Taggable;
    use Blameable;
    use Imageable;
    use Activeable;
    use HasDeadline;
    use Categorizable;

    use SoftDeletes;

    protected $fillable = [
        'creator_id',

        'title',
        'description',
        'target',
        'location',
        'video_url',
        'end_at',
        'activated_at',
    ];

    protected $dates = [
        'end_at',
        'activated_at',
        'deleted_at',
    ];


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A donation may have zero or many donates.
     *
     * This function will retrieve the donates of a donation.
     * See: Donate's donation() method for the inverse
     *
     * @return mixed
     */
    public function donates()
    {
        return $this->hasMany(Donate::class);
    }


    /***************************************** ACCESSOR ******************************************/

    public function getDescriptionLimitedAttribute()
    {
        if (strlen($this->description) >= 50) {

            echo substr($this->description, 0, 50) . '...';

            return;
        }

        return $this->description;
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

    public function getLocationFormattedAttribute()
    {
        if ($this->location) {

            echo nl2br($this->location);
            return;
        }

        echo '<i class="fa fa-map-marker text-red"></i> ' .
                '<i class="fa fa-question-circle-o text-blue"></i>';
    }
}
