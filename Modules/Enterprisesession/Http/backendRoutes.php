<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/enterprisesession'], function (Router $router) {
    $router->bind('enterprisesession', function ($id) {
        return app('Modules\Enterprisesession\Repositories\EnterprisesessionRepository')->find($id);
    });
    $router->get('enterprisesessions', [
        'as' => 'admin.enterprisesession.enterprisesession.index',
        'uses' => 'EnterprisesessionController@index',
        'middleware' => 'can:enterprisesession.enterprisesessions.index'
    ]);
    $router->get('enterprisesessions/create', [
        'as' => 'admin.enterprisesession.enterprisesession.create',
        'uses' => 'EnterprisesessionController@create',
        'middleware' => 'can:enterprisesession.enterprisesessions.create'
    ]);
    $router->post('enterprisesessions', [
        'as' => 'admin.enterprisesession.enterprisesession.store',
        'uses' => 'EnterprisesessionController@store',
        'middleware' => 'can:enterprisesession.enterprisesessions.create'
    ]);
    $router->get('enterprisesessions/{enterprisesession}/edit', [
        'as' => 'admin.enterprisesession.enterprisesession.edit',
        'uses' => 'EnterprisesessionController@edit',
        'middleware' => 'can:enterprisesession.enterprisesessions.edit'
    ]);
    $router->put('enterprisesessions/{enterprisesession}', [
        'as' => 'admin.enterprisesession.enterprisesession.update',
        'uses' => 'EnterprisesessionController@update',
        'middleware' => 'can:enterprisesession.enterprisesessions.edit'
    ]);
    $router->delete('enterprisesessions/{enterprisesession}', [
        'as' => 'admin.enterprisesession.enterprisesession.destroy',
        'uses' => 'EnterprisesessionController@destroy',
        'middleware' => 'can:enterprisesession.enterprisesessions.destroy'
    ]);
// append

});
