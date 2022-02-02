<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{

public function sendEmail(Request $request){
    $mailData['firstname'] = $request->firstname;
    $mailData['lastname'] = $request->lastname;
    $mailData['phone'] = $request->phone;
    $mailData['email'] = $request->email;
    $mailData['class'] = $request->class;
    $mailData['exams'] = $request->exams;
    $mailData['message'] = $request->message;
    Mail::to("akashgr64@gmail.com")
    ->send(new Contact($mailData));
    return view("home");
}



}
