<?php

namespace App\Policies;

use App\User;
use App\product;
use App\Traits\AdminActions;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization, AdminActions;

    /**
     * Determine whether the user can add a category from the product.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function addCategory(User $user, product $product)
    {
        return $user->id === $product->seller->id;
    }

    /**
     * Determine whether the user can delete a category from the product.
     *
     * @param  \App\User  $user
     * @param  \App\product  $product
     * @return mixed
     */
    public function deleteCategory(User $user, product $product)
    {
        return $user->id === $product->seller->id;
    }
}