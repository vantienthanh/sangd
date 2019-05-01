<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 26/03/2019
 * Time: 11:03
 */
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    //params : enterprise_id status
    $api->post('/member/join-session', [
        'as' => 'member.join-session.create',
        'uses' => 'Modules\Membersession\Http\Controllers\Api\MemberSessionController@create'
    ]);
    //get list table joined by user id
    $api->get('/member/join-session/{id}', [
        'as' => 'member.join-session.list',
        'uses' => 'Modules\Membersession\Http\Controllers\Api\MemberSessionController@getListMember'
    ]);
});
