<?php
    Route::group(['prefix'=>'admin','namespace'=>'Admin'], function(){
        // 后台登陆加载
        Route::get('/login', 'EntryController@loginForm');
        // 后台登录处理
        Route::post('/login', 'EntryController@login');
        // 后台首页加载
        Route::get('/index', 'EntryController@index');
        // 后台退出登录
        Route::get('/logout','EntryController@logout');
        // 修改密码加载
        Route::get('/changePassword','MyController@passwordForm');
        // 修改密码处理
        Route::post('/changePassword','MyController@changePassword');
    });
