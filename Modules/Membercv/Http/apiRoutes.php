<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 19/03/2019
 * Time: 17:59
 */
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('/member/list-cv', [
        'as' => 'member.list-cv.index',
        'uses' => 'Modules\Membercv\Http\Controllers\Api\MemberCVController@index'
    ]);
    $api->get('/member/list-cv/find-by-id/{id}', [
        'as' => 'member.list-cv.index',
        'uses' => 'Modules\Membercv\Http\Controllers\Api\MemberCVController@getByUserID'
    ]);
    $api->get('/member/list-cv/{id}', [
        'as' => 'member.list-cv.detail',
        'uses' => 'Modules\Membercv\Http\Controllers\Api\MemberCVController@detail'
    ]);
    $api->post('/member/list-cv/create', [
        'as' => 'member.list-cv.create',
        'uses' => 'Modules\Membercv\Http\Controllers\Api\MemberCVController@create'
    ]);
    $api->put('/member/list-cv/update/{id}', [
        'as' => 'member.list-cv.update',
        'uses' => 'Modules\Membercv\Http\Controllers\Api\MemberCVController@update'
    ]);
    $api->delete('/member/list-cv/detele/{id}', [
        'as' => 'member.list-cv.delete',
        'uses' => 'Modules\Membercv\Http\Controllers\Api\MemberCVController@destroy'
    ]);
});
