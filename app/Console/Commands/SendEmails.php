<?php

namespace App\Console\Commands;

use App\Jobs\SendEmail;
use App\Mail\NewPostNotification;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {post_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends email about a post to subscribers of a website';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {

        //send email to subscriber
        $post = Post::find($this->argument('post_id'));
        $subscribers = Website::find($post->website_id)->subscribers;
        foreach ($subscribers as $subscriber){
            if($subscriber->didNotReceivePost($post)){
                SendEmail::dispatch($subscriber, $post);
            }
        }
    }
}
