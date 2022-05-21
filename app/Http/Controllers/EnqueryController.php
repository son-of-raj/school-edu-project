<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Enquery;
use Input;
class EnqueryController extends Controller
{

public function sendEnquery(Request $request){

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
    ->send(new Enquery($mailData));
    return view("home");
}



}
