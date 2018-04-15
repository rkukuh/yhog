<?php

namespace App\Traits;

use App\User;

trait Blameable
{
    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A creator may create zero or many entity.
     *
     * This function will retrieve the creator of a entity.
     * See: User's [entity]s() method for the inverse
     *
     * @return mixed
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
    /***************************************** ACCESSOR ******************************************/

    public function getCreatedAtFormattedAttribute()
    {
        echo $this->created_at->diffForHumans() . '<br>' .
                '<small class="text-muted">' .
                    $this->created_at->format('d-M-Y') .
                '</small>';
    }
}