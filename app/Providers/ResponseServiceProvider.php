<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseServiceProvider extends ServiceProvider
{
    

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
         Response::macro('horesp', function ($code=200, $data=[], $msg=null) {
            $content =  array(
                        'code'    =>  $code,
                        'data'    =>  $data,
                        'msg'     =>  $msg
                    );
            return response()->json($content);
        });
    }
}
