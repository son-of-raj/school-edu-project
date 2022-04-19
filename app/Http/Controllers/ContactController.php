<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Contact;
use App\Mail\Feedback;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{

public function sendEmail(Request $request){
    //testing
    $mailData['firstname'] = $request->firstname;
    $mailData['lastname'] = $request->lastname;
    $mailData['phone'] = $request->phone;
    $mailData['email'] = $request->email;
    $mailData['class'] = $request->class;
    $mailData['exams'] = $request->exams;
    $mailData['message'] = $request->message;
    Mail::to("info@kpoints.com")
    ->cc("akashgr64@gmail.com")
    ->send(new Contact($mailData));
    return view("home");
}

public function sendFeedback(Request $request){
    $mailData['firstname'] = $request->firstname;
    $mailData['lastname'] = $request->lastname;
    $mailData['phone'] = $request->phone;
    $mailData['email'] = $request->email;
    $mailData['class'] = $request->class;
    $mailData['exams'] = $request->exams;
    $mailData['message'] = $request->message;
    $mailData['subject'] = $request->subject;
    $mailData['percent'] = $request->percent;
    $mailData['rating'] = $request->star;
    Mail::to("info@kpoints.in")
    ->cc("akashgr64@gmail.com")
    ->send(new Feedback($mailData));
    return view("contact");
}



}
