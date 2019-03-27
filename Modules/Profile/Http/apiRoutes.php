<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 21/03/2019
 * Time: 10:08
 */
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->post('/login', [
        'as' => 'profile.user.login',
        'uses' => 'Modules\Profile\Http\Controllers\Api\FrontendUserController@login'
    ]);
    $api->post('/register', [
        'as' => 'profile.user.register',
        'uses' => 'Modules\Profile\Http\Controllers\Api\FrontendUserController@register'
    ]);
    $api->get('/user/{id}', [
        'as' => 'profile.user.info',
        'uses' => 'Modules\Profile\Http\Controllers\Api\FrontendUserController@getAuthenticatedUser'
    ]);
});
