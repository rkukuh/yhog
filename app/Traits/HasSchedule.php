<?php

namespace App\Traits;

use Carbon\Carbon;

trait HasSchedule
{
    /***************************************** ACCESSOR ******************************************/

    /**
     * Get a start date as a formatted string
     *
     * @return String
     */
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

    /**
     * Get an end date as a formatted string
     *
     * @return String
     */
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


    /***************************************** HELPER ********************************************/

    /**
     * Determine whether an entity schedule is active
     *
     * @return boolean
     */
    public function isActive()
    {
        if ( ! $this->isWaiting() ) return true;

        return false;
    }

    /**
     * Determine whether an entity schedule is waiting for active period
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
     * Determine whether an entity schedule is already ended
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
     * Determine whether an entity schedule has no expire date
     *
     * @return boolean
     */
    public function isEndless()
    {
        if ($this->end_at == null) return true;

        return false;
    }
}