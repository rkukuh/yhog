<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use App\Traits\Imageable;
use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Taggable;

class Donation extends Model
{
    use Taggable;
    use Imageable;
    use SoftDeletes;
    use Categorizable;

    protected $fillable = [
        'user_id',

        'title',
        'target',
        'location',
        'start_at',
        'end_at',

        'video_url',
        'excerpt',
        'description',
    ];

    protected $dates = [
        'end_at',
        'start_at',
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

    public function getStartAtFormattedAttribute()
    {
        if ($this->hasEnded()) {

            echo '<span class="label label-warning">ENDED</span> <br>' .
                    '<span class="text-muted">' .
                        $this->start_at->format('d-M-Y') .
                    '</span>';

            return;
        }

        $output = '';

        if ($this->isWaiting()) {

            $output = '<span class="label label-default">WAITING</span> <br>';
            $output .= '<small>' . $this->start_at->diffForHumans() . '</small>';
        }

        if ($this->isActive()) {

            $output = '<span class="label label-success">ACTIVE</span>';
        }

        $output .= '<br>' .
                    '<span class="text-muted">' .
                        $this->start_at->format('d-M-Y') .
                    '</span>';

        echo $output;
    }

    public function getEndAtFormattedAttribute()
    {
        if ($this->isEndless()) {

            echo '<span class="label label-info">ENDLESS</span> <br> ' .
                    '<small class="text-muted">until manually ended</small>';

            return;
        }

        if ($this->hasEnded()) {

            $output = '<span class="label label-warning">ENDED</span>';
        }
        else {

            $output = '<span class="label label-default">WAITING</span> <br>';
            $output .= '<small>' . $this->end_at->diffForHumans() . '</small>';
        }

        $output .=  '<br>' .
                    '<span class="text-muted">' .
                        $this->end_at->format('d-M-Y') .
                    '</span>';

        echo $output;
    }

    public function getCreatedAtFormattedAttribute()
    {
        echo $this->created_at->diffForHumans() . '<br>' .
                '<small class="text-muted">' .
                    $this->created_at->format('d-M-Y') .
                '</small>';
    }


    /***************************************** HELPER ********************************************/

    /**
     * Determine whether an event is active
     *
     * @return boolean
     */
    public function isActive()
    {
        if ( ! $this->isWaiting() ) return true;

        return false;
    }

    /**
     * Determine whether an event is waiting for active period
     *
     * @return boolean
     */
    public function isWaiting()
    {
        $now = Carbon::now();

        if ($now->diffInDays($this->start_at, false) > 0) {

            return true;
        }

        return false;
    }

    /**
     * Determine whether an event is already ended
     *
     * @return boolean
     */
    public function hasEnded()
    {
        if ($this->end_at != null
            && Carbon::now() > $this->end_at) {

            return true;
        }

        return false;
    }

    /**
     * Determine whether an event has no expire date
     *
     * @return boolean
     */
    public function isEndless()
    {
        if ($this->end_at == null) return true;

        return false;
    }
}
