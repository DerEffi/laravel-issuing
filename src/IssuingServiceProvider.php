<?php

namespace DerEffi\Issuing;

use Illuminate\Support\ServiceProvider;

class IssuingServiceProvider extends ServiceProvider {

    public function boot() {

        $this->publishes([ __DIR__.'/Config/issuing.php' => config_path('issuing.php') ], 'dereffi-issuing');

    }

    public function register() {

        $this->mergeConfigFrom( __DIR__.'/Config/issuing.php', 'issuing' );

    }

}
