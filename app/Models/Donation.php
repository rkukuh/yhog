<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
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


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A creator may create zero or many donation.
     *
     * This function will retrieve the author of an donation.
     * See: User' donations() method for the inverse
     *
     * @return mixed
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * M-M Polymorphic: A donation can have one or many categories.
     * 
     * This function will get all of the categories that are assigned to this donation.
     * See: Category's donations() method for the inverse
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    /**
     * M-M Polymorphic: A donation can have one or many tags.
     * 
     * This function will get all of the tags that are assigned to this donation.
     * See: Tag's donations() method for the inverse
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Polymorphic: A donation may have one or more images.
     *
     * This function will retrieve the image(s) of an donation.
     * See: Image's imageable() method
     *
     * @return mixed
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
