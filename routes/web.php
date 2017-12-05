<?php
    namespace App\routes;
//    use App\Http\Controllers\BlogController;
//    use Illuminate\Routing\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'WelcomeController@index');
Route::get('/blog', 'BlogController@index');
Route::get('/blog/edit', 'BlogController@edit');
Route::get('/blog/destroy', 'BlogController@destroy');
Route::get('/blog/create', 'BlogController@create');
Route::post('/blog/store', 'BlogController@store');
Route::post('/blog/update', 'BlogController@update');
Route::get('/st', 'StudentController@index');
Route::get('/st/edit', 'StudentController@edit');
Route::get('/st/destroy', 'StudentController@destroy');
Route::get('/st/create', 'StudentController@create');
Route::post('/st/store', 'StudentController@store');
Route::post('/st/update', 'StudentController@update');
Route::get('/st/tjcx', 'StudentController@tjcx');
Route::post('/file/imgadd', 'FileController@imgAdd');
Route::post('/file/fileup', 'FileController@fileUp');
Route::get('/wx', 'WeiXinController@index');
Route:any('/wx/api', 'WeiXinController@api');