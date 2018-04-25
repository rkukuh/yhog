<?php

namespace App\Models;

use App\Traits\Imageable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use Imageable;
    use SoftDeletes;

    protected $fillable = [
        'partner_id',
        'url',
        'activated_at',
    ];

    protected $dates = [
        'activated_at',
        'deleted_at',
    ];


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A partner may have zero or many advertisements.
     *
     * This function will retrieve the partner of an advertisement.
     * See: Partner's advertisements() method for the inverse
     *
     * @return mixed
     */
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
