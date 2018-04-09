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
     * One-to-Many: An author may create zero or many post
     *
     * This function will retrieve the posts created by an author, if any.
     * See: Post' author() method for the inverse
     *
     * @return mixed
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * One-to-Many: An author may create zero or many partner
     *
     * This function will retrieve the partners created by an author, if any.
     * See: Partner' author() method for the inverse
     *
     * @return mixed
     */
    public function partners()
    {
        return $this->hasMany(Partner::class);
    }

    /**
     * One-to-Many: A creator may create zero or many event
     *
     * This function will retrieve the events created by a creator, if any.
     * See: Event' creator() method for the inverse
     *
     * @return mixed
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
