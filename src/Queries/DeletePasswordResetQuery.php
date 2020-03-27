<?php

namespace JovertPalonpon\Laradash\Queries;

use App\User;
use Illuminate\Support\Facades\DB;

class DeletePasswordResetQuery
{
    /**
     * Delete all password resets bound to the user.
     *
     * @param \App\User $user
     * @return void
     */
    public static function delete(User $user)
    {
        return DB::table('password_resets')
            ->where('email', $user->email)
            ->delete();
    }
}
