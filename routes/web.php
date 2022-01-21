<?php

use App\PostCardSendingService;
use Illuminate\Support\Facades\Route;
use App\Postcard;
use Illuminate\Support\Str;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\Response;
use App\Models\Carta;



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

// Macros
Route::get('/', function () {

    // dd(Str::partNumber(123456789));
    // dd(ResponseFactory::errorJson());
    return ResponseFactory::errorJson();
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


// pipelines
Route::get('/cartas', 'CartaController@index');


// Repository Pattern
Route::get('/customers', 'CustomerController@index');
Route::get('/customers/{customerId}', 'CustomerController@show');
Route::get('/customers/{customerId}/update', 'CustomerController@update');
Route::get('/customers/{customerId}/delete', 'CustomerController@destroy');


// Lazy Coolection & PHP Generator
Route::get('/generators', function(){

    function notHappyFunction($number){
        $return = [];

        for($i=1; $i<$number; $i++){
            $return[] = $i;
        };

        return $return;
    }

    function HappyFunction($number){
        
        for($i=1; $i<$number; $i++){
            yield $i;
        };

    }

    foreach (HappyFunction(100000000000) as $number){
        if($number % 1000 == 0){
            dump('hello');
        };
    }




    /*
    function index($cartas){

       
        
        $titles = [];
        foreach($cartas as $carta){
            
            array_push($titles, $carta->title);

        }
        // dd($titles);
        foreach($titles as $title){
            dump('start');
            yield $title;
            dump('end');
        };
    }

    foreach(index( Carta::all()) as $result){
        
        if($result == 'et'){
           
            return;
        }
        dump($result);
    }
    */
    

     // function happy($string){

    //     yield $string;

    /*
    function index(){

        $cartas = Carta::allCartas();
        
        // dd($cartas);
        dump(1);
        yield $cartas; 
        dump(2);

        dump(3);
        yield 'two';
        dump(4);
    }

    $return =  index();
    dump($return->current());

    $return->next();
    dump($return->current());

    $return->next();
    dump($return->current());

    foreach(index() as $result){
        dump($result);
    }
    */
});