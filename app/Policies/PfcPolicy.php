<?php

namespace App\Policies;

use App\PfcResult;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PfcPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view(User $user, PfcResult $pfc)
    {
        return $user->id === $pfc->user_id;
    }
}
