<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'creator_id',

        'donation_id',
        'amount',
    ];

    protected $dates = ['deleted_at'];
}
