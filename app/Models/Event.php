<?php

namespace App\Models;

use App\User;
use App\Traits\Taggable;
use App\Traits\Imageable;
use App\Traits\HasSchedule;
use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use Taggable;
    use Imageable;
    use SoftDeletes;
    use HasSchedule;
    use Categorizable;

    protected $fillable = [
        'user_id',
        
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
     * One-to-Many: A creator may create zero or many event.
     *
     * This function will retrieve the author of an event.
     * See: User' events() method for the inverse
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

    public function getSizeFormattedAttribute()
    {
        if ($this->size) {
            
            echo number_format($this->size) . 
                    ' <small class="text-muted">people</small>';
            return;
        }

        echo '<div class="badge">no limit</div>';
    }

    public function getCreatedAtFormattedAttribute()
    {
        echo $this->created_at->diffForHumans() . '<br>' .
                '<small class="text-muted">' .
                    $this->created_at->format('d-M-Y') .
                '</small>';
    }
}
