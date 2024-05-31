<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;
use App\Events\PostPublished;
use App\Models\User;

class PublishPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Post $post
    ){
        $this->user = auth()->user();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(5);

        $this->post->published_at = now();
        $this->post->save();

        PostPublished::dispatch($this->post, $this->user);

    }
}
