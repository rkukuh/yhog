<?php

namespace App\Models;

use App\Traits\Taggable;
use App\Traits\Imageable;
use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use Taggable;
    use Imageable;
    use SoftDeletes;
    use Categorizable;

    protected $dates = ['deleted_at'];
}
