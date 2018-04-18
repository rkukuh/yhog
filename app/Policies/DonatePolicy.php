<?php

namespace App\Policies;

use App\User;
use App\Models\Donate;
use Illuminate\Auth\Access\HandlesAuthorization;

class DonatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the donate.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Donate  $donate
     * @return mixed
     */
    public function view(User $user, Donate $donate)
    {
        //
    }

    /**
     * Determine whether the user can create donates.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the donate.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Donate  $donate
     * @return mixed
     */
    public function update(User $user, Donate $donate)
    {
        //
    }

    /**
     * Determine whether the user can delete the donate.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Donate  $donate
     * @return mixed
     */
    public function delete(User $user, Donate $donate)
    {
        //
    }
}
