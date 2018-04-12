<?php

namespace App\Models;

use App\User;
use App\Traits\Taggable;
use App\Traits\Imageable;
use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use Taggable;
    use Imageable;
    use SoftDeletes;
    use Categorizable;

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
     * One-to-Many: A creator may create zero or many partner.
     *
     * This function will retrieve the creator of a partner.
     * See: User' partners() method for the inverse
     *
     * @return mixed
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
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
}
