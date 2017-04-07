<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('post', [
    'as' => 'post',
    'uses' => 'Foostart\Post\Controllers\Front\PostFrontController@index'
]);



Route::post('poster', [
    'as' => 'poster',
    'uses' => 'Foostart\Post\Controllers\Front\PostFrontController@add'
]);

/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        /**
         * list
         */
        Route::get('admin/post', [
            'as' => 'admin_post',
            'uses' => 'Foostart\Post\Controllers\Admin\PostAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/post/edit', [
            'as' => 'admin_post.edit',
            'uses' => 'Foostart\Post\Controllers\Admin\PostAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/post/edit', [
            'as' => 'admin_post.post',
            'uses' => 'Foostart\Post\Controllers\Admin\PostAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/post/delete', [
            'as' => 'admin_post.delete',
            'uses' => 'Foostart\Post\Controllers\Admin\PostAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////

Route::get('post/delete', [
            'as' => 'post.delete',
            'uses' => 'Foostart\Post\Controllers\Front\PostFrontController@delete'
        ]);

 Route::get('post/edit', [
            'as' => 'post.edit',
            'uses' => 'Foostart\Post\Controllers\Front\PostFrontController@edit'
        ]);

        /**
         * post
         */
        Route::post('post/edit', [
            'as' => 'post.post',
            'uses' => 'Foostart\Post\Controllers\Front\PostFrontController@post'
        ]);


        
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
         Route::get('admin/post_category', [
            'as' => 'admin_post_category',
            'uses' => 'Foostart\Post\Controllers\Admin\PostCategoryAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/post_category/edit', [
            'as' => 'admin_post_category.edit',
            'uses' => 'Foostart\Post\Controllers\Admin\PostCategoryAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/post_category/edit', [
            'as' => 'admin_post_category.post',
            'uses' => 'Foostart\Post\Controllers\Admin\PostCategoryAdminController@post'
        ]);
         /**
         * delete
         */
        Route::get('admin/post_category/delete', [
            'as' => 'admin_post_category.delete',
            'uses' => 'Foostart\Post\Controllers\Admin\PostCategoryAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
    });
});
