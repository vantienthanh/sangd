<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 19/03/2019
 * Time: 17:59
 */
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('/member/listcv', [
        'as' => 'member.listcv',
        'uses' => 'Modules\JobNews\Http\Controllers\Api\JobNewsController@index'
    ]);
});