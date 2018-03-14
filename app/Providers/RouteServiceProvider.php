<?php

namespace App\Providers;

use App\Topic;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    public function boot()
    {
        parent::boot();

        // we want to allow hidden topics to be edited so that
        // they can be changed by the creator for re-approval
        Route::bind('topic', function ($id) {

            // ...but, if the topic is hidden, we don't want it to be visible
            // to users other than the owner or an admin (still to implement)
            $topic = Topic::withoutGlobalScope('filtered')->findOrFail($id);

            if ($topic->hidden_at) {
                $user = auth()->user();

                if (!$user || $user->id !== $topic->user_id) {
                    abort(404);
                }
            }

            return $topic;
        });
    }

    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
