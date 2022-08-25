<?php

namespace App\Listeners;

use App\Events\ProductInsertEvent;
use App\Models\Customer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Notification;
use App\Notifications\UserNotification;


class SendPodcastNotification
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
     * @param  \App\Events\ProductInsertEvent  $event
     * @return void
     */
    public function handle(ProductInsertEvent $event)
    {
      $user = Customer::all();
      Notification::send($user, new UserNotification($event->product));

    }
}
