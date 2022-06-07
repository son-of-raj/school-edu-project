<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Enquery;
use App\Models\Studentsnote;
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
    function fetch3(Request $request){
        

     
        $value = $request->get('value');
        
        $course_id = $request->get('course_id');
        $data = DB::table('studentsnotes')
                ->where('subject_id', $value)
                ->where('course_id', $course_id)
                ->get();
                $output = '<div></div>';
        if(count($data)>0){
            foreach ($data as $key =>$row) {
                $step1 = explode(",", $row->notes);
                $step2 = count($step1);
                $output .='<tr><td align="center">'.++$key.'</td>
                <td align="center">
                <a href="notes/'.$row->id.'"><div>' .$row->topic.'</div></a>
                <div>'.$row->description.'</div><br>
                </td> 
                <td align="center">
                <div id='.$row->id.' >'.$step2.'</div>
                </td></tr>
                ';
            }
        }else{
            $output .='<tr><td align="center">1</td>
            <td align="center">
            <div>Notes Not Available</div><br>
            </td>
            <td></td></tr>
            ';
        }
        
        
        return [
            'output'=>$output
        ];

        
    }

    function ShowStudymaterial($id){
       
    $data['files'] =   DB::table('studentsnotes')->where('id', $id)->value('notes');
    $data['topic'] = DB::table('studentsnotes')->where('id', $id)->value('topic');
    $data['description'] = DB::table('studentsnotes')->where('id', $id)->value('description');
  
    $data['files'] = explode(",",$data['files']);

        return view('notes',compact('data'));


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
