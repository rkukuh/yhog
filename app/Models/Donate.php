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
        'response',
    ];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'response' => 'array',
    ];


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
        return $this->belongsTo(Donation::class)
                    ->withTrashed();
    }


    /***************************************** ACCESSOR ******************************************/

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getAmountFormattedAttribute()
    {
        echo number_format($this->amount) . 
             ' <small class="text-muted">' . $this->currency . '</small>';
    }

    public function getInvoiceUrlAttribute()
    {
        echo '<a href="' . $this->response['invoice_url'] . '" target="_blank">' .
                '<span class="">' . $this->response['status'] . '</span>' .
             '</a>';
    }
}
