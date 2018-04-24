<?php

namespace App\Policies;

use App\User;
use App\Models\Banner;
use Illuminate\Auth\Access\HandlesAuthorization;

class BannerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the banner.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Banner  $banner
     * @return mixed
     */
    public function view(User $user, Banner $banner)
    {
        //
    }

    /**
     * Determine whether the user can create banners.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the banner.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Banner  $banner
     * @return mixed
     */
    public function update(User $user, Banner $banner)
    {
        //
    }

    /**
     * Determine whether the user can delete the banner.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Banner  $banner
     * @return mixed
     */
    public function delete(User $user, Banner $banner)
    {
        //
    }
}
