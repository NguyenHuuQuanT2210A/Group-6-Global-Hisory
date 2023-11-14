<?php

namespace App\Listeners;

use App\Events\CreateNewUserEvent;
use App\Mail\UserEventMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class DispatchNewUserEvent
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateNewUserEvent $userEvent): void
    {
        $user_event = $userEvent->user_event;
        //send email
        Mail::to($user_event->email)
//            ->cc("quannhth2210007@fpt.edu.vn")
//            ->bcc("mail quan ly")
            ->send(new UserEventMail($user_event));
    }
}
