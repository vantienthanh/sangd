<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 19/03/2019
 * Time: 13:52
 */
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('/enterprise/job-news', [
        'as' => 'enterprise.jobNews.list',
        'uses' => 'Modules\JobNews\Http\Controllers\Api\JobNewsController@index'
    ]);
    $api->get('/enterprise/job-news/part-time', [
        'as' => 'enterprise.jobNews.partTime',
        'uses' => 'Modules\JobNews\Http\Controllers\Api\JobNewsController@partTime'
    ]);
    $api->get('/enterprise/job-news/all-of-user/{id}', [
        'as' => 'enterprise.jobNews.list',
        'uses' => 'Modules\JobNews\Http\Controllers\Api\JobNewsController@findByUserID'
    ]);
    $api->get('/enterprise/job-news/detail/{id}', [
        'as' => 'enterprise.jobNews.detail',
        'uses' => 'Modules\JobNews\Http\Controllers\Api\JobNewsController@detail'
    ]);

    $api->post('/enterprise/job-news/create', [
        'as' => 'enterprise.jobNews.create',
        'uses' => 'Modules\JobNews\Http\Controllers\Api\JobNewsController@create'
    ]);
    $api->delete('/enterprise/job-news/delete/{id}', [
        'as' => 'enterprise.jobNews.delete',
        'uses' => 'Modules\JobNews\Http\Controllers\Api\JobNewsController@destroy'
    ]);
    $api->put('/enterprise/job-news/update/{id}', [
        'as' => 'enterprise.jobNews.update',
        'uses' => 'Modules\JobNews\Http\Controllers\Api\JobNewsController@update'
    ]);
});
