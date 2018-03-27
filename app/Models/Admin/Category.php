<?php

namespace App\Models\Admin;

use \App\Scopes\OrderByColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        '_of'
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

    /**
     * Scope a query to only include category of blog.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfBlog($query)
    {
        return $query->where('_of', 'blog');
    }

    /**
     * Scope a query to only include category of event.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfEvent($query)
    {
        return $query->where('_of', 'event');
    }

    /**
     * Scope a query to only include category of partner.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfPartner($query)
    {
        return $query->where('_of', 'partner');
    }

    /**
     * Scope a query to only include category of donation.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfDonation($query)
    {
        return $query->where('_of', 'donation');
    }


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many (self-join): A category may have none or many sub-categories.
     *
     * This function will retrieve the sub-categories of a category, if any.
     * See: Category's parent() method for the inverse
     *
     * @return mixed
     */
    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * One-to-Many (self-join): A category may have none or many sub-categories.
     *
     * This function will retrieve the parent of a sub-categories.
     * See: Category's childs() method for the inverse
     *
     * @return mixed
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')
                    ->withTrashed();
    }
}
