<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 19/03/2019
 * Time: 13:52
 */
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('/enterprise/jobnews', [
        'as' => 'enterprise.jobnews',
        'uses' => 'Modules\JobNews\Http\Controllers\Api\JobNewsController@index'
    ]);
    $api->get('/enterprise/jobnews/{id}', [
        'as' => 'enterprise.jobnews.detail',
        'uses' => 'Modules\JobNews\Http\Controllers\Api\JobNewsController@detail'
    ]);
    $api->post('/enterprise/jobnews/create', [
        'as' => 'enterprise.jobnews.create',
        'uses' => 'Modules\JobNews\Http\Controllers\Api\JobNewsController@create'
    ]);
    $api->delete('/enterprise/jobnews/delete/{id}', [
        'as' => 'enterprise.jobnews.delete',
        'uses' => 'Modules\JobNews\Http\Controllers\Api\JobNewsController@destroy'
    ]);
    $api->put('/enterprise/jobnews/update/{id}', [
        'as' => 'enterprise.jobnews.update',
        'uses' => 'Modules\JobNews\Http\Controllers\Api\JobNewsController@update'
    ]);
});