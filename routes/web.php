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


Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);


Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('/ann', 'AnnController@index')->name('AnnController.index');
Route::get('/ann/create', 'AnnController@create')->name('AnnController.create');
Route::post('/ann/store', 'AnnController@store')->name('AnnController.store');
Route::get('/ann/{announcement}', 'AnnController@ann')->name('AnnController.ann');
Route::get('/ann/reply/{announcement}', 'AnnController@reply')->name('AnnController.reply');



Route::get('/pm', 'PMController@display')->name('PMController.display');
Route::get('/pm/received', 'PMController@received')->name('PMController.received');
Route::get('/pm/sent', 'PMController@sent')->name('PMController.sent');
Route::get('/pm/send', 'PMController@send')->name('PMController.send');
Route::get('/pm/reply/{message}', 'PMController@reply')->name('PMController.reply');
Route::post('/pm/store', 'PMController@store')->name('PMController.store');
Route::get('/pm/{message}', 'PMController@view_message')->name('PMController.view');
Route::get('/pm/{message}/del', 'PMController@delete')->name('PMController.delete');




Route::get('/post/{post}', [
    'uses' => 'HomeController@post',
    'as' => 'home.post'
]);




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/chat', 'ChatsController@index')->name('ChatsController.index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

Route::get('/home', 'HomeController@index')->name('home');
