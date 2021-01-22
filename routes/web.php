<?php

use App\Http\Controllers\Backend\QuizController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::get('quiz', 'QuizController@index')->name('quiz');
Route::get('quiz/accept/{slug}/{token}', 'QuizController@accept')->name('quiz.accept');
Route::post('quiz/accept/{slug}/{token}', 'QuizController@answer');

Route::group([  'prefix' => 'i',
                'middleware' => ['auth'],
                'namespace' => 'Backend'], function()
{
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('search/user', 'SearchUserController@search')->name('search-user');
    Route::post('user-permission-update/{id}', 'UserController@updatePermission')->name('user-permission-update');
    
    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');

    Route::get('quiz', 'QuizController@index')->name('quiz.index');
    Route::post('quiz', 'QuizController@store');
    Route::get('quiz/edit/{slug}', 'QuizController@edit')->name('quiz.edit');
    Route::post('quiz/edit/{slug}', 'QuizController@update');
    Route::delete('quiz/delete', 'QuizController@destroy')->name('quiz.destroy');
    Route::post('quiz/invite/{slug}', 'QuizShareController@invite')->name('quiz.invite');
    
});