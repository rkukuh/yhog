<?php

namespace App\Traits;

use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

trait Imageable
{
    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity may have none or more images.
     *
     * This function will retrieve the image(s) of an entity.
     * See: Image's imageable() method
     *
     * @return mixed
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }


    /***************************************** ACCESSOR ******************************************/

    /**
     * Get first image of this entity
     *
     * @return void
     */
    public function getFeaturedImageAttribute()
    {
        return $this->images()->latest()->first();
    }


    /****************************************** HELPER *******************************************/

    /**
     * Associate an image(s) for a model.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest $request
     * @param  \Illuminate\Database\Eloquent\Model; $model
     * @param  Boolean $is_sponsor_image
     * @return void
     */
    public function uploadImages(FormRequest $request, Model $model, $is_sponsor_image = null)
    {
        $path = strtolower(class_basename($model)) . '-' . $model->id;

        foreach ($request['images'] as $file) {

            $fileExtension  = $file['image']->getClientOriginalExtension();
            $fileName       = Carbon::now()->format('Ymdhis') . '-' . mt_rand(100, 999) . '.' . $fileExtension;

            $file['image']->storeAs('public/' . $path, $fileName);

            // Persist file(s) to database, and associate them with this model
            $model->images()->create([
                'path' => $path . '/' . $fileName,
                'size' => $file['image']->getSize(),
                'mime' => $file['image']->getMimeType(),
                'is_sponsor_image' => $is_sponsor_image,
            ]);
        }
    }

    /**
     * Associate a sponsor image for a Partner.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest $request
     * @param  \Illuminate\Database\Eloquent\Model; $model
     * @return void
     */
    public function uploadSponsorImage(FormRequest $request, Model $model)
    {
        $path = strtolower(class_basename($model)) . '-' . $model->id;

        foreach ($request['sponsor_images'] as $file) {

            $fileExtension  = $file['image']->getClientOriginalExtension();
            $fileName       =  'sponsor-' . mt_rand(1000, 9999) . '.' . $fileExtension;

            $file['image']->storeAs('public/' . $path, $fileName);

            // Persist file(s) to database, and associate them with this model
            $model->images()->create([
                'path' => $path . '/' . $fileName,
                'size' => $file['image']->getSize(),
                'mime' => $file['image']->getMimeType(),
                'is_sponsor_image' => true,
            ]);
        }
    }

    /**
     * Associate an Ad Unit for a Partner.
     *
     * @param  \Illuminate\Http\UploadedFile $file
     * @param  \Illuminate\Database\Eloquent\Model; $model
     * @return void
     */
    public function uploadAdUnit(UploadedFile $file, Model $model)
    {
        $path = strtolower(class_basename($model)) . '-' . $model->id;

        $fileExtension  = $file->getClientOriginalExtension();
        $fileName       =  'ad_unit-' . mt_rand(1000, 9999) . '.' . $fileExtension;

        $file->storeAs('public/' . $path, $fileName);

        // Persist file(s) to database, and associate them with this model
        $model->images()->create([
            'path' => $path . '/' . $fileName,
            'size' => $file->getSize(),
            'mime' => $file->getMimeType(),
        ]);
    }
}