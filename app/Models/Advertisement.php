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
    ];

    protected $dates = ['deleted_at'];
}
