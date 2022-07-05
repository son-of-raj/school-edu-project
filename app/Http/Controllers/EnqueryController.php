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

    function fetch(Request $request)
    {


        $select = $request->get('select');
        $value = $request->get('value');



        $data = DB::table('coursetable')
            ->where('class_id', "=", $value)

            ->get();



        $output = '<option selected disabled value="">Select Course</option>';
        foreach ($data as $row) {

            $output .= '<option value="' . $row->id . '">' . $row->course_name . '</option>';
        }
        echo $output;
    }

    function fetch2(Request $request)
    {



        $value = $request->get('value');


        $class_id = $request->get('class_id');

        $data = DB::table('subjects')
            ->where('course_id', $value)
            ->where('class_id', $class_id)

            ->get();

        $output = '<option selected disabled value="">Select Subject</option>';
        $output2 = '<option selected disabled hidden value="">Select subject id</option>';
        $output3 = '<option selected disabled hidden value="">Select subjects</option>';

        foreach ($data as $row) {

            $output .= '<option value="' . $row->id . '">' . $row->subject_name . '</option>';
        }
        foreach ($data as $row) {

            $output2 .= '<option hidden value="' . $row->id . '">' . $row->id . '</option>';
        }

        foreach ($data as $row) {

            $output3 .= '<option value="' . $row->subject_name . '">' . $row->subject_name . '</option>';
        }


        return [
            'output' =>
            $output,
            'output2' =>
            $output2,
            'output3' =>
            $output3
        ];
    }

    function fetch3(Request $request)
    {



        $value = $request->get('value');

        $course_id = $request->get('course_id');
        $data = DB::table('studentsnotes')
            ->where('subject_id', $value)
            ->where('course_id', $course_id)
            ->get();
        $output = '<div></div>';
        if (count($data) > 0) {
            foreach ($data as $key => $row) {

                // $step2 = count($step1);
                $output .= '<tr><td style="width: 10%" align="center">' . ++$key . '</td>
               <td align="left"> <a href="notes/' . $row->id . '">
                <b><div style="font-size:18px;color:black">' . $row->topic . '</div></b>
                <div style="font-size:16px;color:black">' . $row->description . '</div><br>
                </a></td> 
                </tr>
                ';
            }
        } else {
            $output .= '<tr><td align="center"></td>
            <td align="center">
            <div>Notes Not Available</div><br>
            </td>
            </tr>
            ';
        }


        return [
            'output' => $output
        ];
    }


    function fetch4(Request $request)
    {


        $value = $request->get('value');

        $course_id = $request->get('course_id');
        $data = DB::table('studentsnotes')
            ->where('subject_id', $value)
            ->where('course_id', $course_id)
            ->get();

        $output = '<option selected disabled value="">Select Topic</option>';


        foreach ($data as $row) {

            $output .= '<option value="' . $row->id . '">' . $row->topic . '</option>
          ';
        }


        return [
            'output' =>
            $output,

        ];
    }

    function fetch5(Request $request)
    {


        $value = $request->get('value');

        $data = DB::table('subtopictables')
            ->where('studentstopic_id', $value)
            ->get();

        $output = '<option selected disabled value="">Select Sub-topic</option>';

        foreach ($data as $row) {

            $output .= '<option value="' . $row->id . '">' . $row->sub_topic . '</option>';
        }



        return [
            'output' =>
            $output,

        ];
    }

    function fetch6(Request $request)
    {



        $value = $request->get('value');

        $course_id = $request->get('course_id');
        $data = DB::table('studentsnotes')
            ->where('subject_id', $value)
            ->where('course_id', $course_id)
            ->get();
        $output = '<div></div>';
        if (count($data) > 0) {
            foreach ($data as $key => $row) {

                // $step2 = count($step1);
                $output .= '<tr><td style="width: 10%" align="center">' . ++$key . '</td>
                <td align="left">
                <b><u style="color:black"><div style="font-size:16px;color:black">' . $row->topic . '</div></u></b>
                <div style="font-size:14px">' . $row->description . '</div><br>
               
                </td> 
                <td style="width: 10%" > <a href="delete/' . $row->id . '"> <button class="btn btn-danger " type="button">Delete</button></a></td>
                </tr>
                ';
            }
        } else {
            $output .= '<tr><td align="center"></td>
            <td align="center">
            <div>Notes Not Available</div><br>
            </td>
            </tr>
            ';
        }


        return [
            'output' => $output
        ];
    }




    function ShowStudymaterial(Request  $request, $id)
    {

        $topic_id = DB::table('studentsnotes')->where('id', $id)->value('id');
        $sub_topic_id = DB::table('subtopictables')->where('studentstopic_id', $id)->pluck('id');
        $data['sub_topic'] =   DB::table('subtopictables')->where('studentstopic_id', $topic_id)->value('sub_topic');
        $data['topic'] = DB::table('studentsnotes')->where('id', $id)->value('topic');
        $data['description'] = DB::table('studentsnotes')->where('id', $id)->value('description');

        $data2 = DB::table('subtopictables')
            ->where('studentstopic_id', $topic_id)
            ->get();
        if (count($data2) > 0) {
            foreach ($data2 as $key => $row) {
                $sub_topic = $row->sub_topic;
            }
        }
        $data3 = DB::table('notes_files')
            ->where('topic_id', $topic_id)
            ->orderBy('sub_topic_id', 'ASC')
            ->get();
        if (count($data3) > 0) {
            foreach ($data3 as $key => $row) {

                $notes = $row->notes;
            }
        }
        return view('notes', compact('data', 'data2', 'data3'));
    }



    public function sendEnquery(Request $request)
    {

        $mailData['name'] = $request->name;
        $mailData['contact'] = $request->contact;
        $mailData['email'] = $request->email;
        $mailData['message'] = $request->message;

        $class_id = $request->class_id;
        if ($class_id == 1) {
            $mailData['class'] = "XI";
        } else {
            $mailData['class'] = "XII";
        }

        $course_id = $request->course_id;
        $mailData['course'] = DB::table('coursetable')->where('id', $course_id)->value('course_name');

        $subject_ids = $request->subjects;
        foreach ($subject_ids as $key => $subject_id) {
            $array[$key] = DB::table('subjects')->where('id', $subject_id)->value('subject_name');
        }

        $mailData['subjects'] = implode(",", $array);

        Mail::to("chityalsaumya@gmail.com")
            ->cc("akashgr64@gmail.com")
            ->send(new Enquery($mailData));
        return view("home");
    }


    function fetch7(Request $request)
    {

        $id = $request->id;
        $value = $request->get('value');
        $subject_name = DB::table('subjecttable')->where('id', $value)->value('subject_name');


        $course_id = $request->get('course_id');

        $course_name = DB::table('coursetable')->where('id', $course_id)->value('course_name');


        $result['result'] = DB::table('videocourses')
            ->where('subject_name', $subject_name)
            ->where('course_name', $course_name)
            ->get();

        if (count($result['result']) > 0) {
            foreach ($result['result'] as $key =>$row) {
                $data[$key]['video'] = DB::table('videocourses')
                ->where('id', $row->id)
                ->get();
            }

            return response()->json(['result' => $data]);
        }
       
    }



    function fetch8(Request $request)
    {

        $value = $request->get('value');
        $subject_name = DB::table('subjecttable')->where('id', $value)->value('subject_name');


        $course_id = $request->get('course_id');

        $course_name = DB::table('coursetable')->where('id', $course_id)->value('course_name');


        $data = DB::table('syllabusdetails')
            ->where('subject_name', $subject_name)
            ->where('course_name', $course_name)
            ->get();
        $output = '';
        if (count($data) > 0) {
            foreach ($data as $key => $row) {


                $output .= ' <div class="row"> <img id="' . $row->id . '" align="center" src="asset("storage/notes/' . $row->syllabus_files . ')" style="height:35%;width: 113%;margin: 0%;padding:0%"></div>';
            }
        } else {
            $output .= '<div class="row" align="center">
            <div>Videos Not Available</div><br>
            
          </div>
            ';
        }


        return [
            'output' => $output
        ];
    }

    function fetch9(Request $request)
    {

        $value = $request->get('value');
        $subject_name = DB::table('subjecttable')->where('id', $value)->value('subject_name');


        $course_id = $request->get('course_id');

        $course_name = DB::table('coursetable')->where('id', $course_id)->value('course_name');


        $data = DB::table('syllabusdetails')
            ->where('subject_name', $subject_name)
            ->where('course_name', $course_name)
            ->get();
        $output = '';
        if (count($data) > 0) {
            foreach ($data as $key => $row) {


                $output .= ' <div class="row"> <img id="' . $row->id . '" align="center" src="asset("storage/notes/' . $row->syllabus_files . ')" style="height:35%;width: 113%;margin: 0%;padding:0%"><a href="delete_syllabus/' . $row->id . '"> <button class="btn btn-danger " type="button">Delete</button></a></div>';
            }
        } else {
            $output .= '<div class="row" align="center">
            <div>Videos Not Available</div><br>
            
          </div>
            ';
        }


        return [
            'output' => $output
        ];
    }

    function fetch10(Request $request)
    {

        $value = $request->get('value');
        $subject_name = DB::table('subjecttable')->where('id', $value)->value('subject_name');


        $course_id = $request->get('course_id');

        $course_name = DB::table('coursetable')->where('id', $course_id)->value('course_name');


        $data = DB::table('videocourses')
            ->where('subject_name', $subject_name)
            ->where('course_name', $course_name)
            ->get();
        $output = '';
        if (count($data) > 0) {
            foreach ($data as $key => $row) {


                $output .= '<section class="light"><div class="container py-2"><article class="postcard light green"><a class="postcard__img_link" href="#"><iframe class="postcard__img" src="' .$row->videolink . '?autoplay=1&mute=1"  allowfullscreen></iframe></a><div class="postcard__text t-dark"><h1 class="postcard__title blue"><a href="#">' . $row->videoheading .  '</a></h1><div class="postcard__subtitle small"><ul class="postcard__tagbox"><li class="tag__item">' . $row->class_name .  '</li<li class="tag__item">' . $row->course_name .  '</li><li class="tag__item">' . $row->subject_name .  '</li><br><li class="tag__item"><i class="fas fa-clock mr-2"></i>' . $row->videoby . '</li></ul></div><div class="postcard__bar"></div><div class="postcard__preview-txt">' . $row->videodescription . '</div><a href="delete_videocourses/' . $row->id . '"> <button class="btn btn-danger " type="button">Delete</button></a></article></div> </section>';
            }
        } else {
            $output .= '<div class="row" align="center">
            <div>Videos Not Available</div><br>
            
          </div>
            ';
        }


        return [
            'output' => $output
        ];
    }

    function fetch11(Request $request)
    {

        $value = $request->get('value');
        $subject_name = DB::table('subjecttable')->where('id', $value)->value('subject_name');


        $course_id = $request->get('course_id');

        $course_name = DB::table('coursetable')->where('id', $course_id)->value('course_name');


        $data = DB::table('videocourses')
            ->where('subject_name', $subject_name)
            ->where('course_name', $course_name)
            ->get();
        $output = '<option selected disabled value="">Select Headings</option>';
        if (count($data) > 0) {
            foreach ($data as $key => $row) {


                $output .= ' <option value="' . $row->id . '">' . $row->videoheading . '</option>';
            }
        } else {
            $output .= '<option> NO DATA </option>';
        }


        return [
            'output' => $output
        ];
    }
}
