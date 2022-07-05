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

Route::get('delete_syllabus/{id}',[StudentsdetailsController::class,'delete_syllabus'])->name("delete_syllabus");
Route::get('delete_videocourses/{id}',[StudentsdetailsController::class,'delete_videocourses'])->name("delete_videocourses");

Route::post('contact-submit', 'App\Http\Controllers\ContactController@sendEmail')->name('sendEmail');
Route::post('feedback-submit', 'App\Http\Controllers\ContactController@sendFeedback')->name('sendFeedback');
Route::post('enquery-submit', 'App\Http\Controllers\EnqueryController@sendEnquery')->name('sendEnquery');
Route::post('demo-submit', 'App\Http\Controllers\DemoController@sendDemo')->name('sendDemo');
Route::post('popup-demo-submit', 'App\Http\Controllers\DemoController@sendPopupDemo')->name('sendPopupDemo');
Route::post('faculties_name', 'App\Http\Controllers\VideoSave@Faculties')->name('Faculties');
Route::post('getdata','App\Http\Controllers\StudentFormController@getdata')->name("getdata");
Route::get('show_notes', 'App\Http\Controllers\StudentFormController@show_notes')->name('show_notes');
Route::get('video_courses', 'App\Http\Controllers\StudentFormController@video_courses')->name('video_courses');
Route::get('syllabus', 'App\Http\Controllers\StudentFormController@syllabus')->name('syllabus');

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
Route::post('fetch7','App\Http\Controllers\EnqueryController@fetch7')->name('fetch7');
Route::post('fetch8','App\Http\Controllers\EnqueryController@fetch8')->name('fetch8');
Route::post('fetch9','App\Http\Controllers\EnqueryController@fetch9')->name('fetch9');
Route::post('fetch10','App\Http\Controllers\EnqueryController@fetch10')->name('fetch10');
Route::post('fetch11','App\Http\Controllers\EnqueryController@fetch11')->name('fetch11');

Route::get('notes/logout', 'App\Http\Controllers\HomeController@test')->name('test');
Route::get('edit',[StudentsdetailsController::class,'edit'])->name('edit');
Route::get('delete_syllabus_details',[StudentsdetailsController::class,'delete_syllabus_details'])->name('delete_syllabus_details');
Route::get('delete_video_courses',[StudentsdetailsController::class,'delete_video_courses'])->name('delete_video_courses');
Route::post('studentsdetails/generate',[StudentsdetailsController::class,'generate'])->name('studentsdetails.generate');
Route::post('studentsdetails/generate_fee',[StudentsdetailsController::class,'generate_fee'])->name('studentsdetails.generate_fee');
Route::get('studentsdetails/generate_fee2/{id}',[StudentsdetailsController::class,'generate_fee2'])->name('studentsdetails.generate_fee2');
Route::post('studentsdetails/popup',[StudentsdetailsController::class,'popup'])->name('studentsdetails.popup');
Route::post('studentsdetails/popup2',[StudentsdetailsController::class,'popup2'])->name('studentsdetails.popup2');
Route::post('studentsdetails/popup3',[StudentsdetailsController::class,'popup3'])->name('studentsdetails.popup3');
Route::post('/admin/getidpass',[StudentsdetailsController::class,'getidpass'])->name("admin.getidpass");
Route::post('/admin/getdetails',[StudentsdetailsController::class,'getdetails'])->name("admin.getdetails");
Route::post('getnotes',[StudentsdetailsController::class,'getnotes'])->name("getnotes");
Route::post('getvideocourses',[StudentsdetailsController::class,'getvideocourses'])->name("getvideocourses");
Route::post('getsyllabusfiles',[StudentsdetailsController::class,'getsyllabusfiles'])->name("getsyllabusfiles");
Route::post('getnotes2',[StudentsdetailsController::class,'getnotes2'])->name("getnotes2");
Route::get ('update_details/{id}',[StudentsdetailsController::class,'update_details'])->name("update_details");
Route::post('updatechanges',[StudentsdetailsController::class,'updatechanges'])->name("updatechanges");
Route::get('generate_login/{id}',[StudentsdetailsController::class,'generate_login'])->name("generate_login");
Route::get ('delete_student/{id}',[StudentsdetailsController::class,'delete_student'])->name("delete_student");

Auth::routes();

Route::get('/admin_dashboard', [App\Http\Controllers\StudentsdetailsController::class, 'admin_dashboard'])->name('admin_dashboard');

Route::get('/admin_add_notes', [App\Http\Controllers\StudentsdetailsController::class, 'admin_add_notes'])->name('admin_add_notes');

Route::get('/add_subtopic_notes', [App\Http\Controllers\StudentsdetailsController::class, 'add_subtopic_notes'])->name('add_subtopic_notes');

Route::get('/admin_add_video_courses', [App\Http\Controllers\StudentsdetailsController::class, 'admin_add_video_courses'])->name('admin_add_video_courses');

Route::get('/admin_add_syllabus', [App\Http\Controllers\StudentsdetailsController::class, 'admin_add_syllabus'])->name('admin_add_syllabus');


Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

Route::get('notes/{id}','App\Http\Controllers\EnqueryController@ShowStudymaterial')->name('ShowStudymaterial');


// Razorpay
Route::get('razorpayView', [StudentsdetailsController::class, 'razorpayView'])->name('razorpayView');
Route::get('payment', [StudentsdetailsController::class, 'payment']);

Route::post('razorpay-payment', [StudentsdetailsController::class, 'store'])->name('razorpay.payment.store');