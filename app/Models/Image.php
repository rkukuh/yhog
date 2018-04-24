<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'imageable_id',
        'imageable_type',
        'path',
        'size',
        'mime',
        'is_sponsor_image',
    ];
    
    protected $dates = ['deleted_at'];


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An image could be owned by any other entities.
     *
     * This function will get all of the owning imageable models.
     * See: [ENTITY]'s images() method for the inverse
     *
     * @return mixed
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
