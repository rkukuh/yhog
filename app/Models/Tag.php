<?php

namespace App\Models;

use \App\Scopes\OrderByColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    protected $dates = ['deleted_at'];


    /******************************************* SCOPE *******************************************/

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrderByColumn('name'));
    }


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * M-M Polymorphic: A post can have one or many tags.
     * 
     * This function will get all of the posts that are assigned to this tag.
     * See: Post's tags() method for the inverse
     */
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    /**
     * M-M Polymorphic: A partner can have one or many tags.
     * 
     * This function will get all of the partners that are assigned to this tag.
     * See: Partner's tags() method for the inverse
     */
    public function partners()
    {
        return $this->morphedByMany(Partner::class, 'taggable');
    }
}
