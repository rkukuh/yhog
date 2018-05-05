<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Many-to-Many: An event may have zero or many participant.
     *
     * This function will retrieve the events of a participant.
     * See: Event's participants() method for the inverse
     *
     * @return mixed
     */
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
