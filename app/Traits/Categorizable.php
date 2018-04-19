<?php

namespace App\Traits;

use App\Models\Category;

trait Categorizable
{
    /*************************************** RELATIONSHIP ****************************************/

    /**
     * M-M Polymorphic: An entity can have one or many categories.
     * 
     * This function will get all of the categories that are assigned to this entity.
     * See: Category's [entity]s() method for the inverse
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }


    /***************************************** ACCESSOR ******************************************/

    public function getCategoryLinkAttribute()
    {
        if ($this->categories->isEmpty()) return '-';

        echo $this->categories[0]->name;
    }
}