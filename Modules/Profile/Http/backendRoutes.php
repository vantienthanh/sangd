<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/profile'], function (Router $router) {
    $router->bind('frontenduser', function ($id) {
        return app('Modules\Profile\Repositories\FrontendUserRepository')->find($id);
    });
    $router->get('frontendusers', [
        'as' => 'admin.profile.frontenduser.index',
        'uses' => 'FrontendUserController@index',
        'middleware' => 'can:profile.frontendusers.index'
    ]);
    $router->get('frontendusers/create', [
        'as' => 'admin.profile.frontenduser.create',
        'uses' => 'FrontendUserController@create',
        'middleware' => 'can:profile.frontendusers.create'
    ]);
    $router->post('frontendusers', [
        'as' => 'admin.profile.frontenduser.store',
        'uses' => 'FrontendUserController@store',
        'middleware' => 'can:profile.frontendusers.create'
    ]);
    $router->get('frontendusers/{frontenduser}/edit', [
        'as' => 'admin.profile.frontenduser.edit',
        'uses' => 'FrontendUserController@edit',
        'middleware' => 'can:profile.frontendusers.edit'
    ]);
    $router->put('frontendusers/{frontenduser}', [
        'as' => 'admin.profile.frontenduser.update',
        'uses' => 'FrontendUserController@update',
        'middleware' => 'can:profile.frontendusers.edit'
    ]);
    $router->delete('frontendusers/{frontenduser}', [
        'as' => 'admin.profile.frontenduser.destroy',
        'uses' => 'FrontendUserController@destroy',
        'middleware' => 'can:profile.frontendusers.destroy'
    ]);
    $router->bind('frontenduserinfo', function ($id) {
        return app('Modules\Profile\Repositories\FrontendUserInfoRepository')->find($id);
    });
    $router->get('frontenduserinfos', [
        'as' => 'admin.profile.frontenduserinfo.index',
        'uses' => 'FrontendUserInfoController@index',
        'middleware' => 'can:profile.frontenduserinfos.index'
    ]);
    $router->get('frontenduserinfos/create', [
        'as' => 'admin.profile.frontenduserinfo.create',
        'uses' => 'FrontendUserInfoController@create',
        'middleware' => 'can:profile.frontenduserinfos.create'
    ]);
    $router->post('frontenduserinfos', [
        'as' => 'admin.profile.frontenduserinfo.store',
        'uses' => 'FrontendUserInfoController@store',
        'middleware' => 'can:profile.frontenduserinfos.create'
    ]);
    $router->get('frontenduserinfos/{frontenduserinfo}/edit', [
        'as' => 'admin.profile.frontenduserinfo.edit',
        'uses' => 'FrontendUserInfoController@edit',
        'middleware' => 'can:profile.frontenduserinfos.edit'
    ]);
    $router->put('frontenduserinfos/{frontenduserinfo}', [
        'as' => 'admin.profile.frontenduserinfo.update',
        'uses' => 'FrontendUserInfoController@update',
        'middleware' => 'can:profile.frontenduserinfos.edit'
    ]);
    $router->delete('frontenduserinfos/{frontenduserinfo}', [
        'as' => 'admin.profile.frontenduserinfo.destroy',
        'uses' => 'FrontendUserInfoController@destroy',
        'middleware' => 'can:profile.frontenduserinfos.destroy'
    ]);
// append


});
