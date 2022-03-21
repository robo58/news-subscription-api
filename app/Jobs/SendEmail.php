<?php

namespace App\Jobs;

use App\Mail\NewPostNotification;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $post;
    protected $subscriber;

    /**
     * Create a new job instance.
     *
     * @param Subscriber $subscriber
     * @param Post $post
     */
    public function __construct(Subscriber $subscriber, Post $post)
    {
        $this->post = $post;
        $this->subscriber = $subscriber;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->subscriber->email)->send(new NewPostNotification($this->post));
        $this->subscriber->posts()->syncWithoutDetaching([$this->post->id]);
    }
}
