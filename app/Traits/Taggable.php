<?php

namespace App\Traits;

use App\Models\Tag;

trait Taggable
{
    /*************************************** RELATIONSHIP ****************************************/

    /**
     * M-M Polymorphic: A entity can have one or many tags.
     * 
     * This function will get all of the tags that are assigned to this entity.
     * See: Tag's [entity]s() method for the inverse
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }


    /***************************************** ACCESSOR ******************************************/

    /**
     * Get list of this entity's tags
     *
     * @return void
     */
    public function getTagListAttribute()
    {
        if ($this->tags->isEmpty()) return '-';
        
        foreach ($this->tags as $tag) {
            echo $tag->name . ', ';
        }
    }
}