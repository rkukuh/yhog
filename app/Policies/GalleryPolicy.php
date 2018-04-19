<?php

namespace App\Policies;

use App\User;
use App\Models\Gallery;
use Illuminate\Auth\Access\HandlesAuthorization;

class GalleryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the gallery.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Gallery  $gallery
     * @return mixed
     */
    public function view(User $user, Gallery $gallery)
    {
        //
    }

    /**
     * Determine whether the user can create galleries.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the gallery.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Gallery  $gallery
     * @return mixed
     */
    public function update(User $user, Gallery $gallery)
    {
        //
    }

    /**
     * Determine whether the user can delete the gallery.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Gallery  $gallery
     * @return mixed
     */
    public function delete(User $user, Gallery $gallery)
    {
        //
    }
}
