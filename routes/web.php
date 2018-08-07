<?php


// dd(App::make('App\Billing\Stripe'));

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

Route::get('/create', 'TaskController@index');
Route::post('/', 'TaskController@store') ;

Route::get('/', 'TaskController@show_all');
Route::get('/tasks/{task}', 'TaskController@show') ;

Route::get('/tasks/tags/{tag}', 'TagsController@index') ;
// Route::patch('/tasks/{id}', 'TaskController@update') ;
// Route::delete('/tasks/{id}', 'TaskController@delete') ;

Route::post('/tasks/{task}/comments','CommentController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/login','SessionsController@create');
// Route::get('/register','RegistrationController@create');
// Route::post('/register','RegistrationController@store');
// Route::get('/logout','SessionsController@destroy');

