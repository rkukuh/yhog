<?php

namespace App\Models;

use App\Traits\Taggable;
use App\Traits\Blameable;
use App\Traits\Imageable;
use App\Traits\HasDeadline;
use App\Traits\Categorizable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use Taggable;
    use Blameable;
    use Imageable;
    use HasDeadline;
    use Categorizable;

    use SoftDeletes;

    protected $fillable = [
        'creator_id',

        'title',
        'description',
        'target',
        'location',
        'video_url',
        'end_at',
    ];

    protected $dates = [
        'end_at',
        'deleted_at',
    ];


    /***************************************** ACCESSOR ******************************************/

    public function getDescriptionLimitedAttribute()
    {
        if (strlen($this->description) >= 50) {

            echo substr($this->description, 0, 50) . '...';

            return;
        }

        return $this->description;
    }

    public function getTargetFormattedAttribute()
    {
        if ($this->target) {

            echo number_format($this->target);

            return;
        }
        else {
            
            echo '<span style="font-size: 20px;">∞</span> <br>' . 
                    '<small class="text-muted">(continuous)</small>';
        }
    }

    public function getLocationFormattedAttribute()
    {
        if ($this->location) {

            echo nl2br($this->location);
            return;
        }

        echo '<i class="fa fa-map-marker text-red"></i> ' .
                '<i class="fa fa-question-circle-o text-blue"></i>';
    }
}
