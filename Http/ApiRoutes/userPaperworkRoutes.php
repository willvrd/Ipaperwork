<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/userpaperworks'], function (Router $router) {

  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

  $router->post('/', [
    'as' => $locale . 'api.ipaperwork.userpaperworks.create',
    'uses' => 'UserPaperworkApiController@create',
  ]);
  $router->get('/', [
    'as' => $locale . 'api.ipaperwork.userpaperworks.index',
    'uses' => 'UserPaperworkApiController@index',
  ]);
  $router->put('/{criteria}', [
    'as' => $locale . 'api.ipaperwork.userpaperworks.update',
    'uses' => 'UserPaperworkApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => $locale . 'api.ipaperwork.userpaperworks.delete',
    'uses' => 'UserPaperworkApiController@delete',
  ]);
  $router->get('/{criteria}', [
    'as' => $locale . 'api.ipaperwork.userpaperworks.show',
    'uses' => 'UserPaperworkApiController@show',
  ]);

});
