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
}
