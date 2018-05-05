<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use Blameable;
    use SoftDeletes;

    protected $fillable = [
        'creator_id',

        'event_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'quantity',
        'price',
        'response',
    ];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'response' => 'array',
    ];


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
