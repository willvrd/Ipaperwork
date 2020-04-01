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


        // Routes to Quotation
        $router->group(['prefix' => 'quotation'], function (Router $router) {
            
            $locale = LaravelLocalization::setLocale() ?: App::getLocale();
            $router->get('{slug}', [
                'as' => $locale . '.ipaperwork.quotation',
                'uses' => 'PublicController@quotation',
                'middleware' => 'can:ipaperwork.userpaperworks.create'
            ]);

            $router->post('create', [
                'as' => 'ipaperwork.quotation.create',
                'uses' => 'PublicController@quotationCreate',
                'middleware' => 'can:ipaperwork.userpaperworks.create'
            ]);

        });

        
    });

}