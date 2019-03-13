<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/session'], function (Router $router) {
    $router->bind('session', function ($id) {
        return app('Modules\Session\Repositories\SessionRepository')->find($id);
    });
    $router->get('sessions', [
        'as' => 'admin.session.session.index',
        'uses' => 'SessionController@index',
        'middleware' => 'can:session.sessions.index'
    ]);
    $router->get('sessions/create', [
        'as' => 'admin.session.session.create',
        'uses' => 'SessionController@create',
        'middleware' => 'can:session.sessions.create'
    ]);
    $router->post('sessions', [
        'as' => 'admin.session.session.store',
        'uses' => 'SessionController@store',
        'middleware' => 'can:session.sessions.create'
    ]);
    $router->get('sessions/{session}/edit', [
        'as' => 'admin.session.session.edit',
        'uses' => 'SessionController@edit',
        'middleware' => 'can:session.sessions.edit'
    ]);
    $router->put('sessions/{session}', [
        'as' => 'admin.session.session.update',
        'uses' => 'SessionController@update',
        'middleware' => 'can:session.sessions.edit'
    ]);
    $router->delete('sessions/{session}', [
        'as' => 'admin.session.session.destroy',
        'uses' => 'SessionController@destroy',
        'middleware' => 'can:session.sessions.destroy'
    ]);
// append

});
