<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donate extends Model
{
    use Blameable;
    use SoftDeletes;

    protected $fillable = [
        'creator_id',

        'donation_id',
        'first_name',
        'last_name',
        'email',
        'currency',
        'amount',
    ];

    protected $dates = ['deleted_at'];


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A donation may have zero or many donates.
     *
     * This function will retrieve a donation of a donate.
     * See: Donation's donates() method for the inverse
     *
     * @return mixed
     */
    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }


    /***************************************** ACCESSOR ******************************************/

    public function getAmountFormattedAttribute()
    {
        return number_format($this->amount);
    }
}
