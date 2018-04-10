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
        'published_at',
        'previewed_at'
    ];

    protected $dates = [
        'deleted_at',
        'published_at',
        'previewed_at'
    ];


    /******************************************* SCOPE *******************************************/

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($post) {

            // Soft delete all post previews, if any
            $post->whereNotNull('previewed_at')->delete();

            // TODO: Force delete preview posts, if any

        });

        // TODO: Use 'deleted' hooks to delete any related image(s)
    }

    
    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: An author may create zero or many post.
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

    /**
     * M-M Polymorphic: A post can have one or many tags.
     * 
     * This function will get all of the tags that are assigned to this post.
     * See: Tag's posts() method for the inverse
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Polymorphic: A post may have one or more images.
     *
     * This function will retrieve the image(s) of a post.
     * See: Image's imageable() method
     *
     * @return mixed
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }


    /***************************************** ACCESSOR ******************************************/

    public function getPublishedAtFormattedAttribute()
    {
        echo ($this->published_at) ? 
                    '<strong class="text-green">YES</strong> <br>' .
                    '<span class="text-muted">' . 
                        $this->published_at->format('d-M-Y') . 
                    '<span>' : 
                    '<strong class="text-red">NO</strong>';
    }

    public function getCreatedAtFormattedAttribute()
    {
        echo $this->created_at->diffForHumans() . '<br>' .
                '<small class="text-muted">' .
                    $this->created_at->format('d-M-Y') .
                '</small>';
    }

    public function getCategoryLinkAttribute()
    {
        if ($this->categories->isEmpty()) return '-';

        echo $this->categories[0]->name;
    }

    public function getTagListAttribute()
    {
        if ($this->tags->isEmpty()) return '-';
        
        foreach ($this->tags as $tag) {
            echo $tag->name . ', ';
        }
    }

    public function getFeaturedImageAttribute()
    {
        return $this->images()->latest()->first();
    }
}
