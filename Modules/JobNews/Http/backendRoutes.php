<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/jobnews'], function (Router $router) {
    $router->bind('jobnews', function ($id) {
        return app('Modules\JobNews\Repositories\JobNewsRepository')->find($id);
    });
    $router->get('jobnews', [
        'as' => 'admin.jobnews.jobnews.index',
        'uses' => 'JobNewsController@index',
        'middleware' => 'can:jobnews.jobnews.index'
    ]);
    $router->get('jobnews/create', [
        'as' => 'admin.jobnews.jobnews.create',
        'uses' => 'JobNewsController@create',
        'middleware' => 'can:jobnews.jobnews.create'
    ]);
    $router->post('jobnews', [
        'as' => 'admin.jobnews.jobnews.store',
        'uses' => 'JobNewsController@store',
        'middleware' => 'can:jobnews.jobnews.create'
    ]);
    $router->get('jobnews/{jobnews}/edit', [
        'as' => 'admin.jobnews.jobnews.edit',
        'uses' => 'JobNewsController@edit',
        'middleware' => 'can:jobnews.jobnews.edit'
    ]);
    $router->put('jobnews/{jobnews}', [
        'as' => 'admin.jobnews.jobnews.update',
        'uses' => 'JobNewsController@update',
        'middleware' => 'can:jobnews.jobnews.edit'
    ]);
    $router->delete('jobnews/{jobnews}', [
        'as' => 'admin.jobnews.jobnews.destroy',
        'uses' => 'JobNewsController@destroy',
        'middleware' => 'can:jobnews.jobnews.destroy'
    ]);
// append

});
