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


    /***************************************** ACCESSOR ******************************************/

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->diffForHumans() . '<br>' .
                '<small class="text-muted">' .
                    $this->created_at->format('d-M-Y') .
                '</small>';
    }

    public function getCategoryListAttribute()
    {
        if ($this->categories->isEmpty()) return '-';

        foreach ($this->categories as $category) {
            echo '<a href="#">' . $category->name . '</a>, ';
        }
    }

    public function getTagListAttribute()
    {
        if ($this->tags->isEmpty()) return '-';
        
        foreach ($this->tags as $tag) {
            echo '<a href="#">' . $tag->name . '</a>, ';
        }
    }

    public function getLocationFormattedAttribute()
    {
        if ($this->location) {
            return $this->location;
        }

        return '<i class="fa fa-map-marker text-red"></i> ' .
                '<i class="fa fa-question-circle-o text-blue"></i>';
    }

    public function getPriceFormattedAttribute()
    {
        if ($this->price) {

            echo number_format($this->price);

            if ($this->early_bird_price) {

                echo ' <small class="label label-default">normal</small> <br>';

                return number_format($this->early_bird_price).
                        ' <small class="label label-warning">early</small>';
            }
        }
        else {
            
            return '<div class="label label-success">FREE</div>';
        }
    }

    public function getFeaturedImageAttribute()
    {
        return $this->images()->latest()->first();
    }
}
