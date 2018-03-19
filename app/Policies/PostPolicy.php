<?php

namespace App\Policies;

use App\User;
use App\ModelsAdminPost;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the modelsAdminPost.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsAdminPost  $modelsAdminPost
     * @return mixed
     */
    public function view(User $user, ModelsAdminPost $modelsAdminPost)
    {
        //
    }

    /**
     * Determine whether the user can create modelsAdminPosts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the modelsAdminPost.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsAdminPost  $modelsAdminPost
     * @return mixed
     */
    public function update(User $user, ModelsAdminPost $modelsAdminPost)
    {
        //
    }

    /**
     * Determine whether the user can delete the modelsAdminPost.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsAdminPost  $modelsAdminPost
     * @return mixed
     */
    public function delete(User $user, ModelsAdminPost $modelsAdminPost)
    {
        //
    }
}
