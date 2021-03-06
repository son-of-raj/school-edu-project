<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\DemoPopup;
use Illuminate\Support\Facades\Mail;
class DemoController extends Controller
{

public function sendDemo(Request $request){
    $mailData['name'] = $request->name;
    $mailData['contact'] = $request->contact;
    $mailData['email'] = $request->email;
    $mailData['class'] = $request->class;
    $mailData['course'] = $request->course;
    $mailData['subjects'] = $request->subjects;
    $mailData['message'] = $request->message;
    Mail::to("info@kpoints.com")
    ->cc("akashgr64@gmail.com")
    ->send(new DemoPopup($mailData));
    return view("home");
}

public function sendPopupDemo(Request $request){
    $mailData['name'] = $request->name;
    $mailData['contact'] = $request->contact;
    $mailData['email'] = $request->email;
    $mailData['class'] = $request->class;
    $mailData['course'] = $request->course;
    $mailData['subjects'] = $request->subjects;
    $mailData['message'] = $request->message;
    Mail::to("info@kpoints.com")
    ->cc("akashgr64@gmail.com")
    ->send(new DemoPopup($mailData));
    return view("home");
}



}
