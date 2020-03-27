<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/ipaperwork'], function (Router $router) {
    $router->bind('paperwork', function ($id) {
        return app('Modules\Ipaperwork\Repositories\PaperworkRepository')->find($id);
    });
    $router->get('paperworks', [
        'as' => 'admin.ipaperwork.paperwork.index',
        'uses' => 'PaperworkController@index',
        'middleware' => 'can:ipaperwork.paperworks.index'
    ]);
    $router->get('paperworks/create', [
        'as' => 'admin.ipaperwork.paperwork.create',
        'uses' => 'PaperworkController@create',
        'middleware' => 'can:ipaperwork.paperworks.create'
    ]);
    $router->post('paperworks', [
        'as' => 'admin.ipaperwork.paperwork.store',
        'uses' => 'PaperworkController@store',
        'middleware' => 'can:ipaperwork.paperworks.create'
    ]);
    $router->get('paperworks/{paperwork}/edit', [
        'as' => 'admin.ipaperwork.paperwork.edit',
        'uses' => 'PaperworkController@edit',
        'middleware' => 'can:ipaperwork.paperworks.edit'
    ]);
    $router->put('paperworks/{paperwork}', [
        'as' => 'admin.ipaperwork.paperwork.update',
        'uses' => 'PaperworkController@update',
        'middleware' => 'can:ipaperwork.paperworks.edit'
    ]);
    $router->delete('paperworks/{paperwork}', [
        'as' => 'admin.ipaperwork.paperwork.destroy',
        'uses' => 'PaperworkController@destroy',
        'middleware' => 'can:ipaperwork.paperworks.destroy'
    ]);

    $router->get('userpaperworks/{paperworkId}', [
        'as' => 'admin.ipaperwork.userpaperwork.index',
        'uses' => 'UserPaperworkController@index',
        'middleware' => 'can:ipaperwork.userpaperworks.index'
    ]);

    /*
    $router->bind('userpaperwork', function ($id) {
        return app('Modules\Ipaperwork\Repositories\UserPaperworkRepository')->find($id);
    });
    $router->get('userpaperworks', [
        'as' => 'admin.ipaperwork.userpaperwork.index',
        'uses' => 'UserPaperworkController@index',
        'middleware' => 'can:ipaperwork.userpaperworks.index'
    ]);
    $router->get('userpaperworks/create', [
        'as' => 'admin.ipaperwork.userpaperwork.create',
        'uses' => 'UserPaperworkController@create',
        'middleware' => 'can:ipaperwork.userpaperworks.create'
    ]);
    $router->post('userpaperworks', [
        'as' => 'admin.ipaperwork.userpaperwork.store',
        'uses' => 'UserPaperworkController@store',
        'middleware' => 'can:ipaperwork.userpaperworks.create'
    ]);
    $router->get('userpaperworks/{userpaperwork}/edit', [
        'as' => 'admin.ipaperwork.userpaperwork.edit',
        'uses' => 'UserPaperworkController@edit',
        'middleware' => 'can:ipaperwork.userpaperworks.edit'
    ]);
    $router->put('userpaperworks/{userpaperwork}', [
        'as' => 'admin.ipaperwork.userpaperwork.update',
        'uses' => 'UserPaperworkController@update',
        'middleware' => 'can:ipaperwork.userpaperworks.edit'
    ]);
    $router->delete('userpaperworks/{userpaperwork}', [
        'as' => 'admin.ipaperwork.userpaperwork.destroy',
        'uses' => 'UserPaperworkController@destroy',
        'middleware' => 'can:ipaperwork.userpaperworks.destroy'
    ]);
    */
// append


});
