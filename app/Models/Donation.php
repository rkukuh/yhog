<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',

        'title',
        'target',
        'location',
        'end_at',

        'video_url',
        'excerpt',
        'description',
    ];

    protected $dates = [
        'deleted_at',
        'end_at'
    ];
}
