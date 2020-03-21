<?php

namespace JovertPalonpon\Laradash\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordReset extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The user that will recieve the email.
     *
     * @var \App\User
     */
    protected $user;

    /**
     * The password reset link.
     *
     * @var string
     */
    protected $url;

    /**
     * Create a new message instance.
     *
     * @param \App\User $user The user that will recieve the email.
     * @param string $url The password reset url.
     * @return void
     */
    public function __construct(User $user, $url)
    {
        $this->user = $user;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('laradash::emails.passwords.reset', [
            'user' => $this->user,
            'url' => $this->url,
        ]);
    }
}
