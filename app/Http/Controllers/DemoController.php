<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\DemoPopup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class DemoController extends Controller
{

    function index(Request $request){
        
        
        return view('/demo');
    }
    
public function sendDemo(Request $request){
    $mailData['name'] = $request->name;
    $mailData['contact'] = $request->contact;
    $mailData['email'] = $request->email;
    $mailData['message'] = $request->message;

    $class_id = $request->class_id;
    if($class_id == 1){
        $mailData['class'] = "XI" ;
    }else{
        $mailData['class'] = "XII" ;
    }

    
    $course_id = $request->course_id;
    $mailData['course']= DB::table('coursetable')->where('id',$course_id)->value('course_name');

    $subject_ids = $request->subjects;
    foreach($subject_ids as $key => $subject_id){
        $array[$key] = DB::table('subjects')->where('id',$subject_id)->value('subject_name');

    }

    $mailData['subjects'] = implode(",", $array);

    Mail::to("chityalsaumya@gmail.com")
    ->cc("akashgr64@gmail.com")
    ->send(new DemoPopup($mailData));
    return view("home");
}

public function sendPopupDemo(Request $request){
    $mailData['name'] = $request->name;
    $mailData['contact'] = $request->contact;
    $mailData['email'] = $request->email;
    $mailData['message'] = $request->message;

    $class_id = $request->class_id;
    if($class_id == 1){
        $mailData['class'] = "XI" ;
    }else{
        $mailData['class'] = "XII" ;
    }

    
    $mailData['course'] = $request->course;

    $mailData['subjects'] = $request->subjects;

    Mail::to("chityalsaumya@gmail.com")
    ->cc("akashgr64@gmail.com")
    ->send(new DemoPopup($mailData));
    return view("home");
}



}
