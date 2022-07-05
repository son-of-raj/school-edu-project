<?php

namespace App\Http\Controllers;
use App\Models\Studentsnote;
use App\Models\Studentsdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\helpers;
use App\Mail\FeeStructure;
use App\Mail\GeneratedCode;
use App\Mail\Credential;
use Swift_IdGenerator;

class StudentFormController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    function getdata(Request $request){
       
        $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'number'=>'required|max:13|min:10',
            'email'=>'required|unique:studentsdetails|email',
            'guardianName'=>'required',
            'guardianNumber'=>'required|max:13|min:10',
            'guardianEmail'=>'required|email',
            'class_name'=>'required',
            'course_name'=> 'required',
            'subject_name'=>'required',
            'year'=>'required',
            'file' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048'
            
        ]);
       
        
        $form = new Studentsdetail;
        $str = implode(",",$request->subject_name);
       
        // $subjectid = implode(",",$request->subject_id);
        $form->firstName = $request->firstName;
        $form->lastName = $request->lastName;
        $form->number = $request->number;
        $form->email = $request->email;
        $form->guardianName = $request->guardianName;
        $form->guardianNumber = $request->guardianNumber;
        $form->guardianEmail = $request->guardianEmail;
        $form->class_name = $request->class_name;
        $form->course_name = $request->course_name;
       
            $file= $request->file->hashName();
            $request->file->store('students', 'public');
            $form->photo = $file;
        
        $form->subject_name = $str;
        if($request->class_name == 1){
            $form->class_id = "XI" ;
        }else{
            $form->class_id = "XII" ;
        }
        $form->generated_code = $request->generate;
        $form->course_id=DB::table('coursetable')->where('id',$form->course_name)->pluck('course_name');
        $explode = explode (",",$form->subject_name);
        
        $subjectform = array();
        $count = 0;
        foreach($explode as $explodeid) {
           
            $subjectform[$count++] =DB::table('subjects')->where('id',$explodeid)->pluck('subject_name');

        }
        $form->subject_id = implode(",",$subjectform);
        
        $repl = str_replace(array('["', '"]'), '', $form->subject_id );

        $form->subject_id = strval($repl);

        $courseId =explode (",",$form->course_id);
        $courseIdReplace =  str_replace(array('["', '"]'), '', $courseId );
        $form->course_id= implode('', $courseIdReplace);
       
        
        $form->year = $request->year;
      
        $getdata = $form->save();

        $getdataInfo = Studentsdetail::where('email','=',$request->email)->first();

        if(!$getdataInfo){
            return back()->with('fail',"we do not recognize your email address");
        }else{
            
                $request->session()->put('LoggedStudent',$getdataInfo->id);
                return redirect()->back()->with('success', 'Request submitted successfully'); 
           
        }

        if($getdata)
        {   
           
            // echo ('if');
            return redirect('/')->back() ->with('alert', 'Updated!');
        }else{
            // echo ('else');
            return redirect('/student_form');
        }   

        
    }

    function show_notes(Request $request){
        
        return view('show_notes');
    }

    function video_courses(Request $request){

        return view('video_courses');
    }
    
    function syllabus(Request $request){
        
        return view('syllabus');
    }

    function ms_steps(Request $request){
        
        return view('ms_steps');
    }
  
       
}
