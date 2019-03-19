<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/membercv'], function (Router $router) {
    $router->bind('membercv', function ($id) {
        return app('Modules\Membercv\Repositories\MembercvRepository')->find($id);
    });
    $router->get('membercvs', [
        'as' => 'admin.membercv.membercv.index',
        'uses' => 'MembercvController@index',
        'middleware' => 'can:membercv.membercvs.index'
    ]);
    $router->get('membercvs/create', [
        'as' => 'admin.membercv.membercv.create',
        'uses' => 'MembercvController@create',
        'middleware' => 'can:membercv.membercvs.create'
    ]);
    $router->post('membercvs', [
        'as' => 'admin.membercv.membercv.store',
        'uses' => 'MembercvController@store',
        'middleware' => 'can:membercv.membercvs.create'
    ]);
    $router->get('membercvs/{membercv}/edit', [
        'as' => 'admin.membercv.membercv.edit',
        'uses' => 'MembercvController@edit',
        'middleware' => 'can:membercv.membercvs.edit'
    ]);
    $router->put('membercvs/{membercv}', [
        'as' => 'admin.membercv.membercv.update',
        'uses' => 'MembercvController@update',
        'middleware' => 'can:membercv.membercvs.edit'
    ]);
    $router->delete('membercvs/{membercv}', [
        'as' => 'admin.membercv.membercv.destroy',
        'uses' => 'MembercvController@destroy',
        'middleware' => 'can:membercv.membercvs.destroy'
    ]);
// append

});
