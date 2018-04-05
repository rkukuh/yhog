<?php

namespace App\Policies;

use App\User;
use App\Models\Partner;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartnerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the partner.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Partner  $partner
     * @return mixed
     */
    public function view(User $user, Partner $partner)
    {
        //
    }

    /**
     * Determine whether the user can create partners.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the partner.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Partner  $partner
     * @return mixed
     */
    public function update(User $user, Partner $partner)
    {
        //
    }

    /**
     * Determine whether the user can delete the partner.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Partner  $partner
     * @return mixed
     */
    public function delete(User $user, Partner $partner)
    {
        //
    }
}
