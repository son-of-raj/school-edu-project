<?php

namespace App\Http\Controllers;

use App\Models\Studentsdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\helpers;

use Swift_IdGenerator;

class StudentsdetailsController extends Controller
{
    function getdata(Request $request){
       
       
        $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'number'=>'required|max:13',
            'email'=>'required|unique:studentsdetails|email',
            'fatherName'=>'required',
            'fatherNumber'=>'required|max:13',
            'fatherEmail'=>'required|email',
            'class_name'=>'required',
            'course_name'=> 'required',
            'subject_name'=>'required',
            'year'=>'required',
        ]);
       
 
        $form = new Studentsdetail;
        $str = implode(",",$request->subject_name);
        // $subjectid = implode(",",$request->subject_id);
        $form->firstName = $request->firstName;
        $form->lastName = $request->lastName;
        $form->number = $request->number;
        $form->email = $request->email;
        $form->fatherName = $request->fatherName;
        $form->fatherNumber = $request->fatherNumber;
        $form->fatherEmail = $request->fatherEmail;
        $form->class_name = $request->class_name;
        $form->course_name = $request->course_name;
        
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

    function index(Request $request){
        
        
        return view('/demo');
    }

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
                
        foreach($data as $row){
           
            $output .= '<option value="'.$row->id.'">' .$row->subject_name.'</option>';
        }
        foreach($data as $row){
           
            $output2 .= '<option hidden value="'.$row->id.'">' .$row->id.'</option>';
        }
      
        
        return ['output'=>
            $output,
            'output2'=>
             $output2];

        
    }

    function admin_dashboard(Request $request){
        $data= Studentsdetail::orderBy('id', 'DESC')->get();

      
        return view('admin_dashboard',compact('data'));
    }
    
    function generate(Request $request){
       
       $id = $request->id;
       $code = "EX";
      
       $step1=strval(DB::table('studentsdetails')->where('id',$id)->pluck('year'));
       
       $step2 = str_replace(array('[', ']'), '', $step1 );
       $stepyear = intval($step2);
      
       $stepyearplus = $stepyear + 1;
       $step3 = DB::table('studentsdetails')->where('id',$id)->pluck('class_name');
       $step4 = str_replace(array('["', '"]'), '', $step3 );
       $step5 = DB::table('studentsdetails')->where('id',$id)->pluck('course_name');
       $step6 = DB::table('coursetable')->where('id',$step5)->pluck('course_code');
       $step7 = str_replace(array('["', '"]'), '', $step6 );
       $code =$code.$stepyearplus."0".$step4.$step7;
       DB::table('studentsdetails')
       ->where('id', $id)  // find your user by their email
       ->update([
           'generated_code' => $code
        ]);
       $step8 = DB::table('studentsdetails')->where('generated_code', 'like', '%' . $code . '%')->max('generated_code_id');
       $step9 = $step8 + 1;
      //    $step9 = str_pad($number, 3, '0', STR_PAD_LEFT);
       
       DB::table('studentsdetails')
       ->where('id', $id)  // find your user by their email
       ->update([
           'generated_code_id' => $step9
        ]);

     
       $step10 = strval(DB::table('studentsdetails')->where('id',$id)->pluck('subject_name'));
       $step11 = str_replace(array('["', '"]'), '', $step10 );
       $step12 = explode (",",$step11);
        $subjectform = array();
        $count = 0;
        foreach($step12 as $step13) { 
            $subjectform[$count++] =DB::table('subjects')->where('id',$step13)->pluck('subject_code');
        }
        
        $step14 = implode(",",$subjectform);
        $step15 = str_replace(array('["', '"]'), '', $step14 );
        $step16 = strval($step15);
        $step17 = str_replace(array(','), '', $step16 );
        DB::table('studentsdetails')
        ->where('id', $id)  // find your user by their email
        ->update([
            'generated_subject_code' => $step17
         ]);

        $step17 = DB::table('studentsdetails')->where('generated_code',$step16)->get();

        $step18 = DB::table('studentsdetails')->where('id',$id)->value('generated_code');
        $step19 = DB::table('studentsdetails')->where('id',$id)->value('generated_subject_code');
        $step20 = DB::table('studentsdetails')->where('id',$id)->value('generated_code_id');
        $step21 = str_pad($step20, 3, '0', STR_PAD_LEFT);
        $step22 = $step18."-".$step19."-".$step21;
       
        return  [$id, $step22];
    }

  
    function popup(Request $request){
        $id = $request->id;
        $result= Studentsdetail::where('id',$id)->get();

        return ($result);
    }

    
}
