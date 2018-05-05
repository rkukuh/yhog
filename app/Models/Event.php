<?php

namespace App\Models;

use App\Traits\Taggable;
use App\Traits\Imageable;
use App\Traits\Blameable;
use App\Traits\HasSchedule;
use App\Traits\Categorizable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use Taggable;
    use Imageable;
    use Blameable;
    use HasSchedule;
    use Categorizable;

    use SoftDeletes;

    protected $fillable = [
        'creator_id',
        
        'name',
        'size',
        'location',
        'description',
        
        'price',
        'early_bird_price',
        'early_bird_price_end_at',

        'start_at',
        'end_at',
    ];

    protected $dates = [
        'deleted_at',
        'start_at',
        'end_at',
        'early_bird_price_end_at',
    ];


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Many-to-Many: An event may have zero or many partner.
     *
     * This function will retrieve the partners of an event.
     * See: Partner's events() method for the inverse
     *
     * @return mixed
     */
    public function partners()
    {
        return $this->belongsToMany(Partner::class);
    }

    /**
     * Many-to-Many: An event may have zero or many gallery.
     *
     * This function will retrieve the galleries of an event.
     * See: Gallery's events() method for the inverse
     *
     * @return mixed
     */
    public function galleries()
    {
        return $this->belongsToMany(Gallery::class);
    }

    /**
     * One-to-Many: An event may have zero or many participant.
     *
     * This function will retrieve the galleries of an event.
     * See: Participant's event() method for the inverse
     *
     * @return mixed
     */
    public function participants()
    {
        return $this->hasMany(Participant::class);
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

    public function getDescriptionLimitedAttribute()
    {
        if (strlen($this->description) >= 250) {

            echo substr($this->description, 0, 250) . '...';

            return;
        }

        return $this->description;
    }

    public function getPriceFormattedAttribute()
    {
        if ($this->price) {

            if ($this->early_bird_price) {

                echo number_format($this->early_bird_price) .
                        ' <small class="label label-info">early</small> <br>';

            }

            echo number_format($this->price);

            if ($this->early_bird_price) {

                echo ' <small class="label label-default">normal</small>';
            }
            else {

                echo '<br> <small class="text-muted">(no early bird price)</small>';
            }
        }
        else {

            echo '<div class="label label-success">FREE</div>';
        }
    }

    public function getNormalOrEarlybirdPriceAttribute()
    {
        $output = '';

        if ($this->price) {

            if ($this->early_bird_price) {

                $output .= $this->early_bird_price;
            }
            else {

                $output .= $this->price;
            }

        }
        else {

            $output .= 0;
        }

        return $output;
    }

    public function getSizeFormattedAttribute()
    {
        if ($this->size) {
            
            echo '<small>limit:</small> ' .
                 number_format($this->size) . 
                 ' <small class="text-muted">people</small>';
        }
        else {

            echo '<div class="badge">no limit</div>';
        }

        echo '<br><br>';

        echo number_format($this->participants()->count()) . 
             ' <small>registered</small> ';
    }
}
