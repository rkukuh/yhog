<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: An event may have zero or many participant.
     *
     * This function will retrieve the event of a participant.
     * See: Event's participants() method for the inverse
     *
     * @return mixed
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
