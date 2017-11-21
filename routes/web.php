<?php
    namespace App\routes;
    use App\Http\Controllers\BlogController;
    use Illuminate\Routing\Route;
    use function Sodium\crypto_generichash_update;

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

Route::get('/blog' , 'BlogController@index');
Route::get('/blog/edit' , 'BlogController@edit');
Route::get('/blog/destroy' , 'BlogController@destroy');
Route::get('/blog/create' , 'BlogController@create');
Route::post('/blog/store' , 'BlogController@store');
Route::post('/blog/update' , 'BlogController@update');
