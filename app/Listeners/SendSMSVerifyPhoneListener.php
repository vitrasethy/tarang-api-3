<?php

namespace App\Listeners;

use App\Notifications\VerifyPhone;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSMSVerifyPhoneListener
{
    public function __construct()
    {
    }

    public function handle(Registered $event): void
    {
        $user = $event->user;

        $user->notify(new VerifyPhone($user->code));
    }
}
