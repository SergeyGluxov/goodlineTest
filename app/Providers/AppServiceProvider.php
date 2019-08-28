<?php

namespace App\Providers;

use App\Paste;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**Получение последних 10 публичных паст**/
        $public_paste = Paste::where('visibility', 0)
            ->where('hide_at', '>=', Carbon::now()->format('Y-m-d H:i:s'))
            ->take(10)
            ->get()
            ->reverse();
        View::share('share_paste',$public_paste);
    }
}
