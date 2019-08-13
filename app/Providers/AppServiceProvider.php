<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
                //默认采用mb4String编码 4bety等于一个字节 767/4=191
        Schema::defaultStringLength(191);
        //注册观察者
        \App\Models\Article::observe(\App\Observers\ArticleObserver::class);
        \App\Models\Comment::observe(\App\Observers\CommentObserver::class);
        \App\Models\Message::observe(\App\Observers\MessageObserver::class);
    }
}
