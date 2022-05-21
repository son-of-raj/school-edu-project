<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Enquery;
use Input;
class EnqueryController extends Controller
{

public function sendEnquery(Request $request){
    $mailData['name'] = $request->name;
    $mailData['contact'] = $request->contact;
    $mailData['class'] = $request->class_id;
    $mailData['course'] = $request->course_id;
    $sub = strval('subjects');
    $mailData['subjects'] = $request->$sub;
    $mailData['email'] = $request->email;
    $mailData['message'] = $request->message;
    Mail::to("chityalsaumya@gmail.com")
    // ->cc("akashgr64@gmail.com")
    ->send(new Enquery($mailData));
    return view("home");
}



}
