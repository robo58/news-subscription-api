<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;

class SendNotificationToSubscribers
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
     * @param PostCreated $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        Artisan::call('email:send',['post_id'=>$event->post->id]);
    }
}
