<?php

namespace App\Traits;

use App\User;

trait Publishable
{
    /******************************************* SCOPE *******************************************/

    /**
     * Scope a query to only include popular users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
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
}