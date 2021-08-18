<?php

use App\User;
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
Route::view('/giris', 'login' )->name('logincontroller');
Route::post('/giris',  'GeneralController@logincontroller');


Route::group([ 'middleware'=>'auth' ],function (){
    Route::post('/cixis', 'GeneralController@logout' )->name('logout');
    Route::post('/comment', 'GeneralController@comment' )->name('comment');
    //Route::post('/sesyazisi','GeneralController@savevoice')->name('savevoice');
    Route::get('approve/{id}{status}','GeneralController@approve')->name('approve');

    Route::get('/', 'GeneralController@account')->name('account');
    Route::get('/sifarisler/{id}', 'GeneralController@postdetail')->name('postdetail');
    Route::get('/yeni-sifaris', 'GeneralController@addnewproduct')->name('addnewproduct');
    Route::post('/yeni-sifaris', 'GeneralController@storenewproduct');

    Route::get('/reis',    'GeneralController@voicecontrol')->name('voicecontrol');
    Route::post('/sesyazisi','GeneralController@savevoice')->name('savevoice');


}) ;

