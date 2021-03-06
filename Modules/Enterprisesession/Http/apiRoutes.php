<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 25/03/2019
 * Time: 15:43
 */
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    //params : enterprise_id status
    $api->post('/enterprise/join-session', [
        'as' => 'enterprise.join-session.create',
        'uses' => 'Modules\Enterprisesession\Http\Controllers\Api\EnterpriseSessionController@create'
    ]);

    $api->get('/enterprise/get-cv-by-table-id/{id}', [
        'as' => 'enterprise.join-session.search',
        'uses' => 'Modules\Enterprisesession\Http\Controllers\Api\EnterpriseSessionController@searchByTableID'
    ]);

    $api->get('/enterprise/get-list-user-join-table/{id}', [
        'as' => 'enterprise.table.list',
        'uses' => 'Modules\Enterprisesession\Http\Controllers\Api\EnterpriseSessionController@getAllMemberByTableID'
    ]);

    $api->get('/enterprise/get-list-session-user-joined/{id}', [
        'as' => 'enterprise.user.joined',
        'uses' => 'Modules\Enterprisesession\Http\Controllers\Api\EnterpriseSessionController@userJoined'
    ]);
});
