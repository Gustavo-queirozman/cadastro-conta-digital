<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\HttpServer\Router\Router;

//Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');
Router::addGroup('/v1', function(){
    Router::addGroup('/users', function(){
        Router::post('/draft', 'App\Controller\UserController@draft');
        Router::post('/verify-phone', 'App\Controller\UserController@verifyPhone');
        Router::post('/verify-email', 'App\Controller\UserController@verifyEmail');
        Router::post('/{id}/address', 'App\Controller\UserController@registerAddress');
        Router::post('/{id}/documents', 'App\Controller\UserController@registerDocument');
        Router::post('/{id}/biometrics', 'App\Controller\UserController@biometricFace');
    });

    Router::addGroup('/accounts', function(){
        Router::post('/', 'App\Controller\AccountController@registerAccount');
        Router::get('/status', 'App\Controller\AccountController@getAccountStatus');
        Router::get('/me', 'App\Controller\AccountController@getAccountInfo');
        Router::patch('/status', 'App\Controller\AccountController@updateAccountStatus');
    });

    Router::addGroup('/auth', function(){
        Router::post('/password/setup', 'App\Controller\AuthController@registerSetupPassword');
        Router::post('/pin/setup', 'App\Controller\AuthController@registerSetupPin');
        Router::post('/login', 'App\Controller\AuthController@login'); 
    });
});

Router::addGroup('/internal/v1', function (){
    Router::addGroup('/users', function(){
        Router::get('/{id}', 'App\Controller\UserController@getUserInfo');
    });

    Router::addGroup('/accounts', function(){
        Router::get('/{id}/compliance', 'App\Controller\AccountController@getAccountCompliance');
    });
});


Router::get('/favicon.ico', function () {
    return '';
});






