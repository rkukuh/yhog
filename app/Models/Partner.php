<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
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

        static::created(function ($partner) {

            // Soft delete all partner previews, if any
            $partner->whereNotNull('previewed_at')->delete();

            // TODO: Force delete preview partners, if any

        });

        // TODO: Use 'deleted' hooks to delete any related image(s)
    }


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: An author may create zero or many partner.
     *
     * This function will retrieve the author of a partner.
     * See: User' partners() method for the inverse
     *
     * @return mixed
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * M-M Polymorphic: A partner can have one or many categories.
     * 
     * This function will get all of the categories that are assigned to this partner.
     * See: Category's partners() method for the inverse
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    /**
     * M-M Polymorphic: A partner can have one or many tags.
     * 
     * This function will get all of the tags that are assigned to this partner.
     * See: Tag's partners() method for the inverse
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Polymorphic: A partner may have one or more images.
     *
     * This function will retrieve the image(s) of a partner.
     * See: Image's imageable() method
     *
     * @return mixed
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
