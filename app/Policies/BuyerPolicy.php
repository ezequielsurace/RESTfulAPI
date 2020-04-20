<?php

namespace App\Policies;

use App\User;
use App\buyer;
use App\Traits\AdminActions;
use Illuminate\Auth\Access\HandlesAuthorization;

class BuyerPolicy
{
    use HandlesAuthorization, AdminActions;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\buyer  $buyer
     * @return mixed
     */
    public function view(User $user, buyer $buyer)
    {
        return $user->id === $buyer->id;
    }

    /**
     * Determine whether the user can purchase something.
     *
     * @param  \App\User  $user
     * @param  \App\buyer  $buyer
     * @return mixed
     */
    public function purchase(User $user, buyer $buyer)
    {
        return $user->id === $buyer->id;
    }
}
