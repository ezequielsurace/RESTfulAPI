<?php

namespace App\Policies;

use App\Traits\AdminActions;
use App\User;
use App\transaction;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionPolicy
{
    use HandlesAuthorization, AdminActions;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\transaction  $transaction
     * @return mixed
     */
    public function view(User $user, transaction $transaction)
    {
        return $user->id === $transaction->product->seller->id || $user->id === $transaction->buyer->id
    }
}
