<?php

namespace App\Traits;

use Carbon\Carbon;

trait HasDeadline
{
    /***************************************** ACCESSOR ******************************************/

    public function getDeadlineAttribute()
    {
        if ($this->end_at) {

            echo $this->end_at->diffForHumans() . '<br>' .
                '<span class="text-muted">' . $this->end_at->format('d-M-Y') . '</span>';

            return;
        }

        echo '<span class="label label-info">NO TIME LIMIT</span> <br>' .
                '<small class="text-muted">until manually ended</small>';
    }
}