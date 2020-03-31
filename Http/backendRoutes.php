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

    /*
    $router->get('userpaperworks/{paperworkId}', [
        'as' => 'admin.ipaperwork.userpaperwork.index',
        'uses' => 'UserPaperworkController@index',
        'middleware' => 'can:ipaperwork.userpaperworks.index'
    ]);
    */

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
    
    $router->bind('userpaperworkhistory', function ($id) {
        return app('Modules\Ipaperwork\Repositories\UserPaperworkHistoryRepository')->find($id);
    });
    $router->get('userpaperworkhistories', [
        'as' => 'admin.ipaperwork.userpaperworkhistory.index',
        'uses' => 'UserPaperworkHistoryController@index',
        'middleware' => 'can:ipaperwork.userpaperworkhistories.index'
    ]);
    $router->get('userpaperworkhistories/create', [
        'as' => 'admin.ipaperwork.userpaperworkhistory.create',
        'uses' => 'UserPaperworkHistoryController@create',
        'middleware' => 'can:ipaperwork.userpaperworkhistories.create'
    ]);
    $router->post('userpaperworkhistories', [
        'as' => 'admin.ipaperwork.userpaperworkhistory.store',
        'uses' => 'UserPaperworkHistoryController@store',
        'middleware' => 'can:ipaperwork.userpaperworkhistories.create'
    ]);
    $router->get('userpaperworkhistories/{userpaperworkhistory}/edit', [
        'as' => 'admin.ipaperwork.userpaperworkhistory.edit',
        'uses' => 'UserPaperworkHistoryController@edit',
        'middleware' => 'can:ipaperwork.userpaperworkhistories.edit'
    ]);
    $router->put('userpaperworkhistories/{userpaperworkhistory}', [
        'as' => 'admin.ipaperwork.userpaperworkhistory.update',
        'uses' => 'UserPaperworkHistoryController@update',
        'middleware' => 'can:ipaperwork.userpaperworkhistories.edit'
    ]);
    $router->delete('userpaperworkhistories/{userpaperworkhistory}', [
        'as' => 'admin.ipaperwork.userpaperworkhistory.destroy',
        'uses' => 'UserPaperworkHistoryController@destroy',
        'middleware' => 'can:ipaperwork.userpaperworkhistories.destroy'
    ]);
// append



});
