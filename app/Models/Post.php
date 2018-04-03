<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * M-M Polymorphic: A post can have one or many categories.
     * 
     * This function will get all of the categories that are assigned to this post.
     * See: Category's posts() method for the inverse
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
}
