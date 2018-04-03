<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'excerpt',
        'body',
        'meta_description',
        'published_at',
        'previewed_at'
    ];

    protected $dates = [
        'deleted_at',
        'published_at',
        'previewed_at'
    ];


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: An author may create zero or many post
     *
     * This function will retrieve the author of a post.
     * See: User' posts() method for the inverse
     *
     * @return mixed
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

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
