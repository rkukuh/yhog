<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        
        'name',
        'size',
        'location',
        'description',
        
        'price',
        'early_bird_price',
        'early_bird_price_end_at',

        'start_at',
        'end_at',
        'total_hours',
    ];

    protected $dates = [
        'deleted_at',
        'start_at',
        'end_at',
        'early_bird_price_end_at'
    ];


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A creator may create zero or many event.
     *
     * This function will retrieve the author of an event.
     * See: User' events() method for the inverse
     *
     * @return mixed
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * M-M Polymorphic: An event can have one or many categories.
     * 
     * This function will get all of the categories that are assigned to this event.
     * See: Category's events() method for the inverse
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    /**
     * M-M Polymorphic: An event can have one or many tags.
     * 
     * This function will get all of the tags that are assigned to this event.
     * See: Tag's events() method for the inverse
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Polymorphic: An event may have one or more images.
     *
     * This function will retrieve the image(s) of an event.
     * See: Image's imageable() method
     *
     * @return mixed
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
