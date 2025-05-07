<?php

namespace App\Policies;

use App\Models\Shelf;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShelfPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function delete(User $user, Shelf $shelf)
    {
        return $user->id === $shelf->user_id;
    }
}
