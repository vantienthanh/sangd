<?php
/**
 * Created by PhpStorm.
 * User: thanhvan
 * Date: 27/03/2019
 * Time: 23:35
 */
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('/session/list', [
        'as' => 'session.list',
        'uses' => 'Modules\Session\Http\Controllers\Api\SessionController@getList'
    ]);
    $api->get('/session/detail/{id}', [
        'as' => 'session.detail',
        'uses' => 'Modules\Session\Http\Controllers\Api\SessionController@detail'
    ]);
});
