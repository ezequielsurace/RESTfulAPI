<?php

namespace App\Policies;

use App\User;
use App\seller;
use App\Traits\AdminActions;
use Illuminate\Auth\Access\HandlesAuthorization;

class SellerPolicy
{
    use HandlesAuthorization, AdminActions;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\seller  $seller
     * @return mixed
     */
    public function view(User $user, seller $seller)
    {
        return $user->id === $seller->id;
    }

    /**
     * Determine whether the user can sale a product.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function sale(User $user, seller $seller)
    {
        return $user->id === $seller->id;
    }

    /**
     * Determine whether the user can update a product.
     *
     * @param  \App\User  $user
     * @param  \App\seller  $seller
     * @return mixed
     */
    public function editProduct(User $user, User $seller)
    {
        return $user->id === $seller->id;
    }

    /**
     * Determine whether the user can delete a product.
     *
     * @param  \App\User  $user
     * @param  \App\seller  $seller
     * @return mixed
     */
    public function deleteProduct(User $user, seller $seller)
    {
        return $user->id === $seller->id;
    }
}
