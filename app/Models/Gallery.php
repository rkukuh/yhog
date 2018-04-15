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


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A creator may create zero or many gallery.
     *
     * This function will retrieve the creator of a gallery.
     * See: User' galleries() method for the inverse
     *
     * @return mixed
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
