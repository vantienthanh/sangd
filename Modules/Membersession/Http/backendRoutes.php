<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/membersession'], function (Router $router) {
    $router->bind('membersession', function ($id) {
        return app('Modules\Membersession\Repositories\MembersessionRepository')->find($id);
    });
    $router->get('membersessions', [
        'as' => 'admin.membersession.membersession.index',
        'uses' => 'MembersessionController@index',
        'middleware' => 'can:membersession.membersessions.index'
    ]);
    $router->get('membersessions/create', [
        'as' => 'admin.membersession.membersession.create',
        'uses' => 'MembersessionController@create',
        'middleware' => 'can:membersession.membersessions.create'
    ]);
    $router->post('membersessions', [
        'as' => 'admin.membersession.membersession.store',
        'uses' => 'MembersessionController@store',
        'middleware' => 'can:membersession.membersessions.create'
    ]);
    $router->get('membersessions/{membersession}/edit', [
        'as' => 'admin.membersession.membersession.edit',
        'uses' => 'MembersessionController@edit',
        'middleware' => 'can:membersession.membersessions.edit'
    ]);
    $router->put('membersessions/{membersession}', [
        'as' => 'admin.membersession.membersession.update',
        'uses' => 'MembersessionController@update',
        'middleware' => 'can:membersession.membersessions.edit'
    ]);
    $router->delete('membersessions/{membersession}', [
        'as' => 'admin.membersession.membersession.destroy',
        'uses' => 'MembersessionController@destroy',
        'middleware' => 'can:membersession.membersessions.destroy'
    ]);
// append

});
