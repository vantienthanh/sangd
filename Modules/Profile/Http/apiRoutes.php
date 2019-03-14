<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 14/03/2019
 * Time: 17:37
 */
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('user', '\Modules\Profile\Http\Controllers\UserController@login');
});