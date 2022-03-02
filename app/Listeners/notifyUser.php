<?php

namespace App\Listeners;

use App\Events\userRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class notifyUser
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
     * @param  userRegistered  $event
     * @return void
     */
    public function handle(userRegistered $event)
    {
        // var_dump('Se notifica al usuario'. $event->data);
        Mail::to($event->data["usuario"]["email"])->send(new \App\Mail\welcomeNotification($event));
    }
}
