<?php

return [
    App\Providers\AppServiceProvider::class,
    'basic.custom' => \App\Http\Middleware\BasicAuthCustom::class,
];
