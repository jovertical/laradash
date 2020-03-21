<?php

namespace JovertPalonpon\Laradash\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use JovertPalonpon\Laradash\Mail\PasswordReset;

class ForgotPasswordController extends Controller
{
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return Inertia::render('Auth/Password/Request');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users']);

        $user = User::where('email', $request->input('email'))->first();
        $token = Str::random(64);

        $this->destroyResetToken($user);

        if (! $this->storeResetToken($user, $token)) {
            throw ValidationException::withMessages([
                'email' => "Sorry, we can't process your request. Please try again.",
            ]);
        }

        $link = route('laradash.password.reset', compact('token'));

        Mail::to($user)->send(new PasswordReset($user, $link));

        return back();
    }

    /**
     * Destroy any existing password reset token.
     *
     * @param \App\User
     * @return bool
     */
    protected function destroyResetToken(User $user)
    {
        return DB::table('password_resets')
            ->where('email', $user->email)
            ->delete();
    }

    /**
     * Store the password reset token.
     *
     * @param \App\User
     * @return bool
     */
    protected function storeResetToken(User $user, $token)
    {
        return DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token,
            'created_at' => now(),
        ]);
    }
}
