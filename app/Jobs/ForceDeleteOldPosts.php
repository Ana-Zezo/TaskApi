<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ForceDeleteOldPosts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $cutoffDate = Carbon::now()->subDays(30);
        $posts = Post::onlyTrashed()->where('deleted_at', '<', $cutoffDate)->get();

        foreach ($posts as $post) {
            $post->forceDelete();
            Log::info('Force deleted post with ID: ' . $post->id);
        }
    }
}