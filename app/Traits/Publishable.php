<?php

namespace App\Traits;

use App\User;

trait Publishable
{
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
}