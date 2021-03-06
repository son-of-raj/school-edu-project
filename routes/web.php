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

Route::get('/', function () {
    return view('home');
});

Route::get('about', function () {
    return view('about');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('enquery', function () {
    return view('enquery');
});

Route::get('demo', function () {
    return view('demo');
});

Route::get('subjects', function () {
    return view('subjects');
});
Route::get('subjects1', function () {
    return view('subjects1');
});

Route::get('Form', function () {
    return view('upload_form');
});

Route::post('contact-submit', 'App\Http\Controllers\ContactController@sendEmail')->name('sendEmail');
Route::post('feedback-submit', 'App\Http\Controllers\ContactController@sendFeedback')->name('sendFeedback');
Route::post('enquery-submit', 'App\Http\Controllers\EnqueryController@sendEnquery')->name('sendEnquery');
Route::post('demo-submit', 'App\Http\Controllers\DemoController@sendDemo')->name('sendDemo');
Route::post('popup-demo-submit', 'App\Http\Controllers\DemoController@sendPopupDemo')->name('sendPopupDemo');
Route::post('faculties_name', 'App\Http\Controllers\VideoSave@Faculties')->name('Faculties');