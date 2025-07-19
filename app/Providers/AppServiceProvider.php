<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

use function Pest\Laravel\post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            if (app()->environment('local')) {
           URL::forceScheme('https');
    }

        Gate::define('view-post',function(User $user, $post_id)
        {
            $post = Post::find($post_id);
            if(!$post)
            {
                abort(404);
            }
            return $user->id === $post->user_id;
        });
    }
}
