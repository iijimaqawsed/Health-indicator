<?php

namespace App\Policies;

use App\BmiResult;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BmiPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view(User $user, BmiResult $bmi)
    {
        return $user->id === $bmi->user_id;
    }
}

