<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class Policy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function checklogin(User $user)
    {
        return ($user->role->nama == 'supplier' || $user->role->nama == 'superadmin' || $user->role->nama == 'member'
            ? Response::allow()
            : Response::deny('Anda harus daftar sebagai member dulu'));
    }

    public function checkmember(User $user)
    {
        return ($user->role->nama == 'member'
            ? Response::allow()
            : Response::deny('Anda harus daftar sebagai member dulu'));
    }

    public function supplier(User $user)
    {
        return ($user->role->nama == 'supplier' || $user->role->nama == 'superadmin' ? Response::allow() : Response::deny('You must be an Admin.'));
    }

    public function admin(User $user)
    {
        return ($user->role->nama == 'superadmin' ? Response::allow() : Response::deny('You must be an Admin.'));
    }
}
