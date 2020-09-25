<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () { return view('welcome'); });
Route::get('/test', function () { return view('test'); });

//Route::group(
//    ['prefix' => 'public',],
//    function () {
        Route::get('/clients/get', 'ClientController@get');
//    }
//);

// For admin application
Route::get('/admin{any}', 'FrontendController@admin')->where('any', '.*');
// For public application
Route::any('/{any}', 'FrontendController@app')->where('any', '^(?!api).*$');

Route::fallback(function () { return response()->json(['error' => 'Resource not found'], 404); });
