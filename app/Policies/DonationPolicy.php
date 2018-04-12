<?php

namespace App\Policies;

use App\User;
use App\Models\Donation;
use Illuminate\Auth\Access\HandlesAuthorization;

class DonationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the donation.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Donation  $donation
     * @return mixed
     */
    public function view(User $user, Donation $donation)
    {
        //
    }

    /**
     * Determine whether the user can create donations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the donation.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Donation  $donation
     * @return mixed
     */
    public function update(User $user, Donation $donation)
    {
        //
    }

    /**
     * Determine whether the user can delete the donation.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Donation  $donation
     * @return mixed
     */
    public function delete(User $user, Donation $donation)
    {
        //
    }
}
