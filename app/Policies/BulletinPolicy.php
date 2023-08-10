<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BUlletin;

class BulletinPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, Bulletin $bulletin){
        return $bulletin->user->id === $user->id;
    }

    public function delete(User $user, Bulletin $bulletin){
        return $this->update($user, $bulletin);
    }
}