<?php

namespace JovertPalonpon\Laradash\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use JovertPalonpon\Laradash\Queries\DeletePasswordResetQuery;

class ResetPasswordController extends Controller
{
    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  string|null  $token
     * @return \Inertia\Response
     */
    public function showResetForm(Request $request, $token)
    {
        return Inertia::render('Auth/Password/Reset', compact('token'));
    }

    /**
     * Reset the given user's password.
     *
     * If token is invalid, redirect to the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:password_resets',
            'password' => 'required|confirmed|min:6',
        ]);

        if (! $this->passwordReset($request)) {
            return redirect()->route('laradash.password.request');
        }

        $user = $this->updatePassword($request);

        DeletePasswordResetQuery::delete($user);

        Auth::loginUsingId($user->id);

        return redirect()->route('laradash.home');
    }

    /**
     * Update the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\User
     */
    protected function updatePassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->update(['password' => Hash::make($request->password)]);

        return $user;
    }

    /**
     * Find the password reset.
     *
     * @return \Illuminate\Database\Eloquent\Model|object|static|null
     */
    protected function passwordReset(Request $request)
    {
        return DB::table('password_resets')
            ->where('token', $request->token)
            ->where('email', $request->email)
            ->first();
    }
}
