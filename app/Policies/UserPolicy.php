<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the user.
     *
     * @param  \App\User  $user [user model]
     * @param  \App\User  $user
     * @return mixed
     */
    public function touch(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \App\User  $auth [authenticated user]
     * @param  \App\User  $user [user model]
     * @return mixed
     */
    public function updateAccount(User $auth, User $user)
    {
        return $auth->me($user);
    }

}
