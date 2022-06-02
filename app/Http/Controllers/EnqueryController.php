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

    function fetch(Request $request){
        

        $select = $request->get('select');
        $value = $request->get('value');
  
      

        $data = DB::table('coursetable')
                ->where('class_id',"=", $value)
               
                ->get();

   
        
        $output = '<option disabled value="">Select course</option>';
        foreach($data as $row){
           
            $output .= '<option value="'.$row->id.'">' .$row->course_name.'</option>';
        }
        echo $output;

    }

    function fetch2(Request $request){
        

     
        $value = $request->get('value');
        
 
        $class_id = $request->get('class_id');
        
        $data = DB::table('subjects')
                ->where('course_id', $value)
                ->where('class_id', $class_id)
                
                ->get();
                
                $output = '<option disabled value="">Select subject</option>';
                $output2 = '<option disabled hidden value="">Select subject id</option>';
                $output3 = '<option disabled hidden value="">Select subjects</option>';
                
        foreach($data as $row){
           
            $output .= '<option value="'.$row->id.'">' .$row->subject_name.'</option>';
        }
        foreach($data as $row){
           
            $output2 .= '<option hidden value="'.$row->id.'">' .$row->id.'</option>';
        }

        foreach($data as $row){
           
            $output3 .= '<option value="'.$row->subject_name.'">' .$row->subject_name.'</option>';
        }
      
        
        return ['output'=>
            $output,
            'output2'=>
             $output2,
             'output3'=>
             $output3];

        
    }


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
