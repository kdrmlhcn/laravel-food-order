<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'],function(){
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/about-us', 'HomeController@about')->name('about');
    Route::get('/menu', 'HomeController@menu')->name('menu');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::post('/contact/store', 'ContactController@store')->name('contact.store');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'],function(){
    Auth::routes();

    Route::middleware(['auth'])->group(function() {
        Route::get('/', 'HomeController@index')->name('home');

        Route::group(['as'=>'category.','prefix'=>'category'],function (){

            Route::get('/create','CategoryController@create')->name('create');
            Route::post('/store','CategoryController@store')->name('store');
            Route::get('/','CategoryController@index')->name('index');
            Route::post('/data','CategoryController@data')->name('data');
            Route::get('/edit/{id}','CategoryController@edit')->name('edit');
            Route::post('/update/{id}','CategoryController@update')->name('update');
            Route::get('/delete/{id}','CategoryController@destroy')->name('destroy');

        });

        Route::group(['as'=>'product.','prefix'=>'product'],function (){

            Route::get('/create','ProductController@create')->name('create');
            Route::post('/store','ProductController@store')->name('store');
            Route::get('/','ProductController@index')->name('index');
            Route::post('/data','ProductController@data')->name('data');
            Route::get('/edit/{id}','ProductController@edit')->name('edit');
            Route::post('/update/{id}','ProductController@update')->name('update');
            Route::get('/delete/{id}','ProductController@destroy')->name('destroy');

        });

        Route::group(['as'=>'slider.','prefix'=>'slider'],function (){

            Route::get('/create','SliderController@create')->name('create');
            Route::post('/store','SliderController@store')->name('store');
            Route::get('/','SliderController@index')->name('index');
            Route::post('/data','SliderController@data')->name('data');
            Route::get('/edit/{id}','SliderController@edit')->name('edit');
            Route::post('/update/{id}','SliderController@update')->name('update');
            Route::get('/delete/{id}','SliderController@destroy')->name('destroy');

        });

        Route::group(['as'=>'reservation.','prefix'=>'reservation'],function (){

            Route::get('/create','ReservationController@create')->name('create');
            Route::post('/store','ReservationController@store')->name('store');
            Route::get('/','ReservationController@index')->name('index');
            Route::post('/data','ReservationController@data')->name('data');
            Route::get('/show/{id}','ReservationController@show')->name('show');
            Route::post('/update/{id}','ReservationController@update')->name('update');
            Route::get('/delete/{id}','ReservationController@destroy')->name('destroy');

        });

        Route::group(['as'=>'order.','prefix'=>'order'],function (){

            Route::get('/create','OrderController@create')->name('create');
            Route::post('/store','OrderController@store')->name('store');
            Route::get('/','OrderController@index')->name('index');
            Route::post('/data','OrderController@data')->name('data');
            Route::get('/edit/{id}','OrderController@edit')->name('edit');
            Route::post('/update/{id}','OrderController@update')->name('update');
            Route::get('/delete/{id}','OrderController@destroy')->name('destroy');

        });

        Route::group(['as'=>'contact.','prefix'=>'contact'],function (){

            Route::get('/create','ContactController@create')->name('create');
            Route::post('/store','ContactController@store')->name('store');
            Route::get('/','ContactController@index')->name('index');
            Route::post('/data','ContactController@data')->name('data');
            Route::get('/show/{id}','ContactController@show')->name('show');
            Route::post('/update/{id}','ContactController@update')->name('update');
            Route::get('/delete/{id}','ContactController@destroy')->name('destroy');

        });

    });

});




