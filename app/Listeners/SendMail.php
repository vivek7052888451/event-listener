<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\CreateNewUser;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class SendMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
   public function handle(CreateNewUser $event)
    {
          $user=$event->user;

        Mail::send('emails.email', ['user' => $user], function($message) use ($user) {
            $message->to($user['email']);
            $message->subject('Thanks for your order');
            $message->from('no-reply@shouts.dev', 'Shouts.dev');
        });

       
 }
}
