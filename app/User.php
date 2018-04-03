<?php

namespace App;

use App\Scopes\OrderByColumn;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name', 
        'email', 
        'password',
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

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
     * One-to-Many: A user may create zero or many post
     *
     * This function will retrieve the posts created by a user, if any.
     * See: Post' user() method for the inverse
     *
     * @return mixed
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
