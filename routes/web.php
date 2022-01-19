<?php

use App\PostCardSendingService;
use Illuminate\Support\Facades\Route;
use App\Postcard;


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

Route::get('/', function () {
    return view('welcome');
});

// service container
Route::get('pay', 'PayOrderController@store');


// composer view
Route::get('channels', 'ChannelController@index');
Route::get('post/create', 'PostController@create');


// facades
Route::get('postcards', function(){

    $postcardService = new PostCardSendingService('US', '4', '6');

    $postcardService->hello('Hello from UK', 'test@test.com');
});

Route::get('/facades', function(){

    Postcard::hello('Hello from facade', 'abc@123.com');
});