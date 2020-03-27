<?php

use Illuminate\Routing\Router;
if(Request::path()!='backend') {

    /** @var Router $router */
    $router->group(['prefix' => trans('ipaperwork::common.uri')], function (Router $router) {
        $locale = LaravelLocalization::setLocale() ?: App::getLocale();

        $router->get('/', [
            'as' => $locale . '.ipaperwork.index',
            'uses' => 'PublicController@index',
        ]);
        
        $router->get('{slug}', [
            'as' => $locale . '.ipaperwork.paperwork',
            'uses' => 'PublicController@show',
        ]);
        
    });

}