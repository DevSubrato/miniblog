<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/','App\Http\Controllers\FrontendController@home')->name('website');
Route::get('/category/{slug}','App\Http\Controllers\FrontendController@category')->name('website.category');
Route::get('/tag/{slug}','App\Http\Controllers\FrontendController@tag')->name('website.tag');
Route::get('/about','App\Http\Controllers\FrontendController@about')->name('website.about');
Route::get('/contact','App\Http\Controllers\FrontendController@contact')->name('website.contact');
Route::get('/post/{slug}','App\Http\Controllers\FrontendController@post')->name('website.post');
Route::post('contact','App\Http\Controllers\FrontendController@message')->name('website.contact');






//admin dashboard middleware && route
Route::group(['as'=> 'admin.','prefix'=> 'admin', 'namespace'=> 'Admin','middleware' => ['auth','admin'] ], function(){

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resources([
        'tag' => TagController::class,
        'user' => UserController::class,
        'team' => TeamController::class,
        'post' => PostController::class,
        'contact' => ContactController::class,
        'category' => CategoryController::class,
        'subscribers' => SubscriberController::class,
    ]);

    Route::get('comments','CommentController@index')->name('comment.index');
    Route::delete('comments/{id}','CommentController@destroy')->name('comment.destroy');
    Route::get('/pending','PostController@pending')->name('post.pending');
    Route::post('/post/{id}/approve','PostController@approve')->name('post.approve');
    Route::get('/profile','UserController@profile')->name('profile');
    Route::post('/profile/update','UserController@profile_update')->name('profile.update');
    Route::get('setting','SettingController@edit')->name('setting.index');
    Route::post('/setting/update','SettingController@update')->name('setting.update');
      
    // Route::resource('category',CategoryController::class);
    // Route::resource('tag',TagController::class);
    // Route::resource('post',PostController::class);
    // Route::resource('user',UserController::class);
    // Route::resource('contact',ContactController::class);
});

//author dashboard middleware && route
Route::group(['as'=> 'author.','prefix'=> 'author','namespace'=>'Author','middleware' => ['auth','author'] ], function(){

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('post',PostController::class);

    Route::get('comments','CommentController@index')->name('comment.index');
    Route::delete('comments/{id}','CommentController@destroy')->name('comment.destroy');
    Route::get('profile','Usercontroller@profile')->name('profile');
    Route::post('profile/update','Usercontroller@profile_update')->name('profile.update');
    Route::get('/pending','PostController@pending')->name('post.pending');
});

Route::get('search','App\Http\Controllers\SearchController@search')->name('search');
Route::post('subscribers','App\Http\Controllers\SubscriberController@store')->name('subscriber.store');
Route::post('comments/{post}','App\Http\Controllers\CommentController@store')->name('comment.store');
Route::post('comment-replies/{comment}','App\Http\Controllers\CommentController@replyStore')->name('reply.store');




