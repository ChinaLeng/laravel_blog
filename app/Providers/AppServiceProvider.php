<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        // \App\Models\Comment::observe(\App\Observers\CommentObserver::class);
        // \App\Models\Message::observe(\App\Observers\MessageObserver::class);
        /*DB::listen(function ($sql) { 
            Log::info(date('Y-m-d').'--'.$sql->sql.'--'.$this->formatDuration($sql->time / 1000));
            // var_dump($sql->sql, $sql->bindings, $this->formatDuration($sql->time / 1000)); 
        });*/
    }
    /*private function formatDuration($seconds)
    {
        if ($seconds < 0.001) {
            return round($seconds * 1000000).'μs';
        } elseif ($seconds < 1) {
            return round($seconds * 1000, 2).'ms';
        }
        return round($seconds, 2).'s';
    }*/
}
