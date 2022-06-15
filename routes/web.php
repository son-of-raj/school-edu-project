<?php

use App\Http\Controllers\StudentsdetailsController;
use App\Models\Studentsdetail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/emails/email_template', function () {
    return view('/emails/email_template');
});

Route::get('student_form', function () {
    return view('student_form');
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

Route::get('test', function () {
    return view('emails.generated_code');
});
Route::get('delete/{id}',[StudentsdetailsController::class,'delete'])->name("delete");

Route::post('contact-submit', 'App\Http\Controllers\ContactController@sendEmail')->name('sendEmail');
Route::post('feedback-submit', 'App\Http\Controllers\ContactController@sendFeedback')->name('sendFeedback');
Route::post('enquery-submit', 'App\Http\Controllers\EnqueryController@sendEnquery')->name('sendEnquery');
Route::post('demo-submit', 'App\Http\Controllers\DemoController@sendDemo')->name('sendDemo');
Route::post('popup-demo-submit', 'App\Http\Controllers\DemoController@sendPopupDemo')->name('sendPopupDemo');
Route::post('faculties_name', 'App\Http\Controllers\VideoSave@Faculties')->name('Faculties');
Route::post('getdata','App\Http\Controllers\StudentFormController@getdata')->name("getdata");
Route::get('show_notes', 'App\Http\Controllers\StudentFormController@show_notes')->name('show_notes');
Route::get('edit', 'App\Http\Controllers\StudentFormController@edit')->name('edit');

Route::get('ms_steps', 'App\Http\Controllers\StudentFormController@ms_steps')->name('ms_steps');
Route::get('/demo','App\Http\Controllers\DemoController@index');
Route::post('fetch','App\Http\Controllers\EnqueryController@fetch')->name('fetch');
Route::post('fetch2','App\Http\Controllers\EnqueryController@fetch2')->name('fetch2');
Route::post('fetch3','App\Http\Controllers\EnqueryController@fetch3')->name('fetch3');
Route::get('fetch3','App\Http\Controllers\EnqueryController@fetch3')->name('fetch3');
Route::post('fetch4','App\Http\Controllers\EnqueryController@fetch4')->name('fetch4');
Route::post('fetch5','App\Http\Controllers\EnqueryController@fetch5')->name('fetch5');
Route::get('fetch5','App\Http\Controllers\EnqueryController@fetch5')->name('fetch5');
Route::post('fetch6','App\Http\Controllers\EnqueryController@fetch6')->name('fetch6');

Route::get('notes/logout', 'App\Http\Controllers\HomeController@test')->name('test');
Route::post('studentsdetails/generate',[StudentsdetailsController::class,'generate'])->name('studentsdetails.generate');
Route::post('studentsdetails/generate_fee',[StudentsdetailsController::class,'generate_fee'])->name('studentsdetails.generate_fee');
Route::get('studentsdetails/generate_fee2/{id}',[StudentsdetailsController::class,'generate_fee2'])->name('studentsdetails.generate_fee2');
Route::post('studentsdetails/popup',[StudentsdetailsController::class,'popup'])->name('studentsdetails.popup');
Route::post('studentsdetails/popup2',[StudentsdetailsController::class,'popup2'])->name('studentsdetails.popup2');
Route::post('studentsdetails/popup3',[StudentsdetailsController::class,'popup3'])->name('studentsdetails.popup3');
Route::post('/admin/getidpass',[StudentsdetailsController::class,'getidpass'])->name("admin.getidpass");
Route::post('/admin/getdetails',[StudentsdetailsController::class,'getdetails'])->name("admin.getdetails");
Route::post('getnotes',[StudentsdetailsController::class,'getnotes'])->name("getnotes");
Route::post('getnotes2',[StudentsdetailsController::class,'getnotes2'])->name("getnotes2");

Auth::routes();

Route::get('/admin_dashboard', [App\Http\Controllers\StudentsdetailsController::class, 'admin_dashboard'])->name('admin_dashboard');

Route::get('/admin_add_notes', [App\Http\Controllers\StudentsdetailsController::class, 'admin_add_notes'])->name('admin_add_notes');

Route::get('/add_subtopic_notes', [App\Http\Controllers\StudentsdetailsController::class, 'add_subtopic_notes'])->name('add_subtopic_notes');


Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

Route::get('notes/{id}','App\Http\Controllers\EnqueryController@ShowStudymaterial')->name('ShowStudymaterial');


// Razorpay
Route::get('razorpay-payment', [HomeController::class, 'razorpay']);
Route::post('razorpay-payment', [HomeController::class, 'store'])->name('razorpay.payment.store');