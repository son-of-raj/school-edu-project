<?php

namespace App\Http\Controllers;

use App\Models\Studentsdetail;
use App\Models\Subtopictable;
use App\Models\Studentsnote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\helpers;
use Razorpay\Api\Api;
use Session;
use Exception;
use Illuminate\Support\Facades\Hash;
use App\Mail\FeeStructure;
use App\Mail\GeneratedCode;
use App\Mail\GeneratedLogin;

use App\Mail\Credential;
use Swift_IdGenerator;

class StudentsdetailsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    function edit(Request $request)
    {

        return view('edit');
    }
    function delete_syllabus_details(Request $request)
    {

        return view('delete_syllabus_details');
    }
    function delete_video_courses(Request $request)
    {

        return view('delete_video_courses');
    }



    function update_details($id)
    {

        $data = DB::table('studentsdetails')
            ->where('id', $id)
            ->get();
        return view('update_details', compact('data'));
    }

    function delete_student($id)
    {

        $change_pass = 'UserDeleted@';
        $change_pass2 = $change_pass.$id;
        $pass = Hash::make($change_pass2);
    
         DB::table('studentsdetails')
            ->where('id', $id)->update([
                'is_delete' => 1
            ]);
            DB::table('users')
            ->where('student_id', $id)->update([
                'is_delete' => 1,
                'password' => $pass
            ]);
        return redirect()->back();
    }

    function generate_login($id)
    {

        $firstName = DB::table('studentsdetails')->where('id', $id)->value('firstName');
        $lastName = DB::table('studentsdetails')->where('id', $id)->value('lastName');
        $email = DB::table('studentsdetails')->where('id', $id)->value('email');
        $random_password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
        $hash_password = Hash::make($random_password);



        DB::table('users')->insert(array(
            'student_id' => $id,
            'name'     =>   $firstName . " " . $lastName,
            'email'   =>   $email,
            'password'   =>   $hash_password,
            'user_role_id' => '2'
        ));
        DB::table('studentsdetails')->where('id', $id)->update([
            'user_cred' => 1
        ]);

        // echo $random_password;
        $data['id'] = $id;
        $data['random_password'] = $random_password;
        $data['email'] = $email;
        $data['firstName'] = $firstName;
        $data['lastName'] = $lastName;
        Mail::to($email)
            ->cc('chityalsaumya@gmail.com')
            // ->bcc("akashgr64@gmail.com")
            ->send(new GeneratedLogin($data));
        return redirect()->back()->with('message', 'Generated Login credentials ');
    }




    function updatechanges(Request $request)
    {

        $request->validate([

            'firstName' => 'required',
            'lastName' => 'required',
            'number' => 'required',
            'email' => 'required',
            'guardianName' => 'required',
            'guardianNumber' => 'required',
            'guardianEmail' => 'required',


        ]);

        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $number = $request->number;
        $email = $request->email;
        $guardianName = $request->guardianName;
        $guardianNumber = $request->guardianNumber;
        $guardianEmail = $request->guardianEmail;

        DB::table('studentsdetails')->where('id', $request->id)->update([
            'firstName' => $firstName, 'lastName' => $lastName, 'number' => $number, 'email' => $email, 'guardianName' => $guardianName, 'guardianNumber' => $guardianNumber, 'guardianEmail' => $guardianEmail
        ]);


        return redirect('admin_dashboard');
    }

    function fetch(Request $request)
    {


        $select = $request->get('select');
        $value = $request->get('value');



        $data = DB::table('coursetable')
            ->where('class_id', "=", $value)

            ->get();



        $output = '<option disabled value="">Select course</option>';
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

        $output = '<option disabled value="">Select subject</option>';
        $output2 = '<option disabled hidden value="">Select subject id</option>';
        $output3 = '<option disabled hidden value="">Select subjects</option>';

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

    function admin_dashboard(Request $request)
    {
        if (auth()->user()->user_role_id == 1) {
            $data = Studentsdetail::where('is_delete', 0)->orderBy('id', 'DESC')->get();
            return view('admin_dashboard', compact('data'));
        } else {
            $next_month1 = (date('F',strtotime('last day of next month')));
         

            $year = date("Y");
            $data2['advance'] = DB::table('payment')->where('student_id', auth()->user()->student_id)->where('month', 'admission_fee')->value('amount');
            $data2['admin'] = DB::table('payment')->where('student_id', NULL)->value('student_id');
            $data3['check'] = DB::table('payment')->where('student_id', auth()->user()->student_id)->where('month', 'admission_fee')->where('pay', 'paid')->value('pay');
            $data = DB::table('payment')->where('student_id', auth()->user()->student_id)->where('year',$year)->get();
            $data4['getcurrentmonthid'] = DB::table('payment')->where('student_id', auth()->user()->student_id)->where('year',$year)->where('month',$next_month1)->value('id');       
        $next_month= $data4['getcurrentmonthid'] + 1;
        foreach ($data as $row) {

            $userid = $row->id;
            $usermonth = $row->month;
            $useryear = $row->year;
            $useramount = $row->amount;
        }
        return view('payment', compact('data', 'data2', 'data3','data4','next_month'));
        }
    }


    function payment(Request $request)
    {
    
        $next_month1 = (date('F',strtotime('last day of next month')));
    

        $year = date("Y");
        $data2['advance'] = DB::table('payment')->where('student_id', auth()->user()->student_id)->where('month', 'admission_fee')->value('amount');
        $data2['admin'] = DB::table('payment')->where('student_id', NULL)->value('student_id');
        $data3['check'] = DB::table('payment')->where('student_id', auth()->user()->student_id)->where('month', 'admission_fee')->where('pay', 'paid')->value('pay');
        $data3['getid'] = DB::table('payment')->where('student_id', auth()->user()->student_id)->where('month', 'admission_fee')->where('pay', 'paid')->value('id');
        $data = DB::table('payment')->where('student_id', auth()->user()->student_id)->where('year',$year)->get();
        $data4['getcurrentmonthid'] = DB::table('payment')->where('student_id', auth()->user()->student_id)->where('year',$year)->where('month',$next_month1)->value('id');       
        $next_month=  $data4['getcurrentmonthid'] +1;
        foreach ($data as $row) {

            $userid = $row->id;
            $usermonth = $row->month;
            $useryear = $row->year;
            $useramount = $row->amount;
        }


        
        return view('payment', compact('data', 'data2', 'data3','data4','next_month'));
    }


    function getMonthsInRange($startDate, $endDate)
    {
        $months = array();

        while (strtotime($startDate) <= strtotime($endDate)) {
            $months[] = array(
                'year' => date('Y', strtotime($startDate)),
                'month' => date('F', strtotime($startDate)),
            );

            // Set date to 1 so that new month is returned as the month changes.
            $startDate = date('01 M Y', strtotime($startDate . '+ 1 month'));
        }

        return $months;
    }

    function getdetails(Request $request)
    {
        $id = $request->id;

        $code = "EX";

        $step1 = strval(DB::table('studentsdetails')->where('id', $id)->pluck('year'));

        $step2 = str_replace(array('[', ']'), '', $step1);
        $stepyear = intval($step2);

        $stepyearplus = $stepyear + 1;
        $step3 = DB::table('studentsdetails')->where('id', $id)->pluck('class_name');
        $step4 = str_replace(array('["', '"]'), '', $step3);
        $step5 = DB::table('studentsdetails')->where('id', $id)->pluck('course_name');
        $step6 = DB::table('coursetable')->where('id', $step5)->pluck('course_code');
        $guardianName = Studentsdetail::where('id', $id)->value('guardianName');
        $step7 = str_replace(array('["', '"]'), '', $step6);
        $code = $code . $stepyearplus . "0" . $step4 . $step7;
        DB::table('studentsdetails')
            ->where('id', $id)  // find your user by their email
            ->update([
                'generated_code' => $code
            ]);
        $step8 = DB::table('studentsdetails')->where('generated_code', 'like', '%' . $code . '%')->max('generated_code_id');
        $step9 = $step8 + 1;
        $step9 = str_pad($step9, 3, '0', STR_PAD_LEFT);

        DB::table('studentsdetails')
            ->where('id', $id)  // find your user by their email
            ->update([
                'generated_code_id' => $step9
            ]);

        $step10 = strval(DB::table('studentsdetails')->where('id', $id)->pluck('subject_name'));
        $step11 = str_replace(array('["', '"]'), '', $step10);
        $step12 = explode(",", $step11);
        $subjectform = array();
        $count = 0;
        foreach ($step12 as $step13) {
            $subjectform[$count++] = DB::table('subjects')->where('id', $step13)->pluck('subject_code');
        }

        $step14 = implode(",", $subjectform);
        $step15 = str_replace(array('["', '"]'), '', $step14);
        $step16 = strval($step15);
        $step17 = str_replace(array(','), '', $step16);
        DB::table('studentsdetails')
            ->where('id', $id)  // find your user by their email
            ->update([
                'generated_subject_code' => $step17
            ]);

        $step17 = DB::table('studentsdetails')->where('generated_code', $step16)->get();

        $step18 = DB::table('studentsdetails')->where('id', $id)->value('generated_code');
        $step19 = DB::table('studentsdetails')->where('id', $id)->value('generated_subject_code');
        $step20 = DB::table('studentsdetails')->where('id', $id)->value('generated_code_id');
        $step21 = str_pad($step20, 3, '0', STR_PAD_LEFT);
        $step22 = $step18 . "-" . $step19 . "-" . $step21;

        $step3 = Studentsdetail::where('id', $id)->value('subject_name');
        $student_first_name = Studentsdetail::where('id', $id)->value('firstName');
        $student_last_name = Studentsdetail::where('id', $id)->value('lastName');
        $subjects = Studentsdetail::where('id', $id)->value('subject_id');
        $course = Studentsdetail::where('id', $id)->value('course_id');
        $class = Studentsdetail::where('id', $id)->value('class_id');
        $email = Studentsdetail::where('id', $id)->value('guardianEmail');
        $step4 = explode(",", $step3);
        $data = array();


        foreach ($step4 as $key => $step5) {
            $data[$key]['one_monthly'] =  DB::table('subjects')->where('id', $step5)->value('one_monthly');
            $data[$key]['one_annually'] =  DB::table('subjects')->where('id', $step5)->value('one_annually');
            $data[$key]['two_monthly'] =  DB::table('subjects')->where('id', $step5)->value('two_monthly');
            $data[$key]['two_annually'] =  DB::table('subjects')->where('id', $step5)->value('two_annually');
            $data[$key]['three_monthly'] =  DB::table('subjects')->where('id', $step5)->value('three_monthly');
            $data[$key]['three_annually'] =  DB::table('subjects')->where('id', $step5)->value('three_annually');
            $data[$key]['subjects'] =  DB::table('subjects')->where('id', $step5)->value('subject_name');
            $data[$key]['id'] =  DB::table('subjects')->where('id', $step5)->value('id');
        }

        foreach ($data as $row) {
            $id = ($row['id']);
        }

        if (count($data) == 1) {

            $monthly = DB::table('subjects')->where('id', $id)->value('one_monthly');
            $annually = DB::table('subjects')->where('id', $id)->value('one_annually');
        } else if (count($data) == 2) {
            $monthly = DB::table('subjects')->where('id', $id)->value('two_monthly');
            $annually = DB::table('subjects')->where('id', $id)->value('two_annually');
        } else if (count($data) > 2) {
            $monthly = DB::table('subjects')->where('id', $id)->value('three_monthly');
            $annually = DB::table('subjects')->where('id', $id)->value('three_annually');
        }

        $advance = $request->advance;
        DB::table('studentsdetails')
            ->where('id', $request->id)
            ->update([
                'advance' =>  $advance,
                'transaction_id' => $request->transaction
            ]);

        $total_fee = $annually - $advance;
        $start_date = date("Y-m-d", strtotime('first day of +1 month'));
        $year = Studentsdetail::where('id', $request->id)->value('year') + 1;
        $end_date_temp = ("20" . $year . "-03-31");
        $end_date_temp1 = ("20" . $year);

        $end_date = date("Y-m-d", strtotime($end_date_temp));
        $months = $this->getMonthsInRange($start_date, $end_date);

        $months_count = count($months);

        $every_month_fee = round($total_fee / $months_count);

        $stud_id = $request->id;
        $user_id =  DB::table('users')->where('student_id', $stud_id)->value('id');
    
        foreach ($months as $month) {

            $year_get = $month['year'];
            $month_get = $month['month'];
            DB::table('payment')

                ->insert([
                    'user_id' => $user_id,
                    'student_id' => $stud_id,
                    'month' =>  $month_get,
                    'year'        => $year_get,
                    'amount' => $every_month_fee
                ]);
        }
        $data['subjects'] = $subjects;
        $data['monthly'] = $monthly;
        $data['annually'] = $annually;
        $data['advance'] = $advance;
        $data['total_fee'] = $total_fee;
        $data['student_first_name'] =  $student_first_name;
        $data['student_last_name'] = $student_last_name;
        $data['course'] = $course;
        $data['class'] = $class;
        $data['status'] = "sent";
        $data['exam_code'] = $step22;
        $data['id'] = $id;
        $data['guardianName'] = $guardianName;
        $data['months'] = $months;
        $data['months_fee'] = $every_month_fee;
        $data['last_payment_year'] = $end_date_temp1;
        Mail::to($email)
            ->cc('chityalsaumya@gmail.com')
            // ->bcc("akashgr64@gmail.com")
            ->send(new GeneratedCode($data));

        return redirect('/admin_dashboard');
    }

    function generate_fee(Request $request)
    {
        $step1 = $request->id;
        $step2 = ltrim($step1, $step1[0]);
        $step3 = Studentsdetail::where('id', $step2)->value('subject_name');
        $student_first_name = Studentsdetail::where('id', $step2)->value('firstName');
        $student_last_name = Studentsdetail::where('id', $step2)->value('lastName');
        $guardianName = Studentsdetail::where('id', $step2)->value('guardianName');
        $subjects = Studentsdetail::where('id', $step2)->value('subject_id');
        $course = Studentsdetail::where('id', $step2)->value('course_id');
        $class = Studentsdetail::where('id', $step2)->value('class_id');
        $email = Studentsdetail::where('id', $step2)->value('guardianEmail');
        $step4 = explode(",", $step3);
        $data = array();
        $Data1 = array();

        foreach ($step4 as $key => $step5) {
            $data[$key]['one_monthly'] =  DB::table('subjects')->where('id', $step5)->value('one_monthly');
            $data[$key]['one_annually'] =  DB::table('subjects')->where('id', $step5)->value('one_annually');
            $data[$key]['two_monthly'] =  DB::table('subjects')->where('id', $step5)->value('two_monthly');
            $data[$key]['two_annually'] =  DB::table('subjects')->where('id', $step5)->value('two_annually');
            $data[$key]['three_monthly'] =  DB::table('subjects')->where('id', $step5)->value('three_monthly');
            $data[$key]['three_annually'] =  DB::table('subjects')->where('id', $step5)->value('three_annually');
            $data[$key]['subjects'] =  DB::table('subjects')->where('id', $step5)->value('subject_name');
            $data[$key]['id'] =  DB::table('subjects')->where('id', $step5)->value('id');
        }

        foreach ($data as $row) {
            $id = ($row['id']);
        }

        if (count($data) == 1) {

            $monthly = DB::table('subjects')->where('id', $id)->value('one_monthly');
            $annually = DB::table('subjects')->where('id', $id)->value('one_annually');
        } else if (count($data) == 2) {
            $monthly = DB::table('subjects')->where('id', $id)->value('two_monthly');
            $annually = DB::table('subjects')->where('id', $id)->value('two_annually');
        } else if (count($data) > 2) {
            $monthly = DB::table('subjects')->where('id', $id)->value('three_monthly');
            $annually = DB::table('subjects')->where('id', $id)->value('three_annually');
        }

        if (count($data) <= 2) {
            $fee = "5000";
        } else if (count($data) > 2) {
            $fee = "10000";
        }

        $stud_id = $step2 ;
    
        $user_id =  DB::table('users')->where('student_id', $stud_id)->value('id');
        DB::table('payment')

        ->insert([
            'user_id' => $user_id,
            'student_id' => $stud_id,
            'month' =>  'admission_fee',
            'year'        => '0',
            'amount' => $fee
        ]);
        $total_fee = $annually - $fee;

        $start_date = date("Y-m-d", strtotime('first day of +1 month'));
        $year = Studentsdetail::where('id', $step2)->value('year') + 1;
        $end_date_temp = ("20" . $year . "-03-31");

        $end_date = date("Y-m-d", strtotime($end_date_temp));
        $months = $this->getMonthsInRange($start_date, $end_date);

        $months_count = count($months);

        $every_month_fee = round($total_fee / $months_count);

        $data['subjects'] = $subjects;
        $data['monthly'] = $every_month_fee;
        $data['annually'] = $total_fee;
        $data['fee'] = $fee;
        $data['student_first_name'] =  $student_first_name;
        $data['student_last_name'] = $student_last_name;
        $data['course'] = $course;
        $data['guardianName'] = $guardianName;
        $data['class'] = $class;
        $data['status'] = "sent";
        $data['id'] = $step1;
        $data['months'] = $months;
        $data['months_fee'] = $every_month_fee;

        DB::table('studentsdetails')
            ->where('id', $step2)
            ->update([
                'fee_structure' => "Email Sent"
            ]);

        Mail::to($email)
            //  ->cc('chityalsaumya@gmail.com')
            //  ->bcc("akashgr64@gmail.com")
            ->send(new FeeStructure($data));
        return [$data];
    }

    function generate_fee2(Request $request)
    {

        $step1 = $request->id;
        $step2 = ltrim($step1, $step1[0]);
        $step3 = Studentsdetail::where('id', $step2)->value('subject_name');
        $student_first_name = Studentsdetail::where('id', $step2)->value('firstName');
        $student_last_name = Studentsdetail::where('id', $step2)->value('lastName');
        $subjects = Studentsdetail::where('id', $step2)->value('subject_id');
        $course = Studentsdetail::where('id', $step2)->value('course_id');
        $class = Studentsdetail::where('id', $step2)->value('class_id');
        $email = Studentsdetail::where('id', $step2)->value('email');
        $step4 = explode(",", $step3);
        $data = array();
        $Data1 = array();

        foreach ($step4 as $key => $step5) {
            $data[$key]['one_monthly'] =  DB::table('subjects')->where('id', $step5)->value('one_monthly');
            $data[$key]['one_annually'] =  DB::table('subjects')->where('id', $step5)->value('one_annually');
            $data[$key]['two_monthly'] =  DB::table('subjects')->where('id', $step5)->value('two_monthly');
            $data[$key]['two_annually'] =  DB::table('subjects')->where('id', $step5)->value('two_annually');
            $data[$key]['three_monthly'] =  DB::table('subjects')->where('id', $step5)->value('three_monthly');
            $data[$key]['three_annually'] =  DB::table('subjects')->where('id', $step5)->value('three_annually');
            $data[$key]['subjects'] =  DB::table('subjects')->where('id', $step5)->value('subject_name');
            $data[$key]['id'] =  DB::table('subjects')->where('id', $step5)->value('id');
        }

        foreach ($data as $row) {
            $id = ($row['id']);
        }

        if (count($data) == 1) {

            $monthly = DB::table('subjects')->where('id', $id)->value('one_monthly');
            $annually = DB::table('subjects')->where('id', $id)->value('one_annually');
        } else if (count($data) == 2) {
            $monthly = DB::table('subjects')->where('id', $id)->value('two_monthly');
            $annually = DB::table('subjects')->where('id', $id)->value('two_annually');
        } else if (count($data) > 2) {
            $monthly = DB::table('subjects')->where('id', $id)->value('three_monthly');
            $annually = DB::table('subjects')->where('id', $id)->value('three_annually');
        }

        if (count($data) <= 2) {
            $fee = "5000";
        } else if (count($data) > 2) {
            $fee = "10000";
        }

        $data['subjects'] = $subjects;
        $data['monthly'] = $monthly;
        $data['annually'] = $annually;
        $data['fee'] = $fee;
        $data['student_first_name'] =  $student_first_name;
        $data['student_last_name'] = $student_last_name;
        $data['course'] = $course;
        $data['class'] = $class;
        $data['status'] = "sent";
        $data['id'] = $step1;

        DB::table('studentsdetails')
            ->where('id', $step2)
            ->update([
                'fee_structure' => "Email Sent"
            ]);

        Mail::to($email)
            //  ->cc('chityalsaumya@gmail.com')
            //  ->bcc("akashgr64@gmail.com")
            ->send(new FeeStructure($data));

        return redirect('/admin_dashboard');
    }

    function popup(Request $request)
    {
        $id = $request->id;
        $result = Studentsdetail::where('id', $id)->get();

        return ($result);
    }

    function popup2(Request $request)
    {
        $id = $request->id;
        $result = Studentsdetail::where('id', $id)->get();

        return ($result);
    }

    function popup3(Request $request)
    {
        $id = $request->id;
        $result = Studentsdetail::where('id', $id)->get();

        return ($result);
    }

    function getidpass(Request $request)
    {
        $id = $request->id;
        $user_id = $request->user_id;
        $user_pass = $request->user_pass;
        $email = Studentsdetail::where('id', $id)->value('email');
        $student_first_name = Studentsdetail::where('id', $id)->value('firstName');
        $student_last_name = Studentsdetail::where('id', $id)->value('lastName');
        $guardianName = Studentsdetail::where('id', $id)->value('guardianName');
        $guardianEmail = Studentsdetail::where('id', $id)->value('guardianEmail');
        $step18 = DB::table('studentsdetails')->where('id', $id)->value('generated_code');
        $step19 = DB::table('studentsdetails')->where('id', $id)->value('generated_subject_code');
        $step20 = DB::table('studentsdetails')->where('id', $id)->value('generated_code_id');
        $step21 = str_pad($step20, 3, '0', STR_PAD_LEFT);
        $step22 = $step18 . "-" . $step19 . "-" . $step21;

        $data = array();
        DB::table('studentsdetails')
            ->where('id', $id)
            ->update([
                'user_id' => $user_id,
                'user_pass' => $user_pass,
            ]);
        $data['user_id'] = $user_id;
        $data['user_pass'] = $user_pass;
        $data['exam_code'] = $step22;
        $data['student_first_name'] =  $student_first_name;
        $data['student_last_name'] = $student_last_name;
        $data['guardianName'] = $guardianName;
        $data['guardianEmail'] = $guardianEmail;

        Mail::to($email)
            ->cc($guardianEmail)
            //  ->bcc('chityalsaumya@gmail.com')
            ->send(new Credential($data));


        return redirect('/admin_dashboard');
    }

    function admin_add_notes(Request $request)
    {
        return view('admin_add_notes');
    }

    function admin_add_video_courses(Request $request)
    {
        return view('admin_add_video_courses');
    }

    function admin_add_syllabus(Request $request)
    {
        return view('admin_add_syllabus');
    }

    function getnotes(Request $request)
    {

        $request->validate([

            'class_id' => 'required',
            'course_id' => 'required',
            'subject_id' => 'required',
            'topic' => 'required',
            'sub_topic' => 'required',
            'description' => 'required',

        ]);

        $form = new Studentsnote;
        $form->id = $request->id;
        $form->class_id = $request->class_id;
        $form->course_id = $request->course_id;
        $form->subject_id = $request->subject_id;
        if ($request->class_id == 1) {
            $form->class_name = "XI";
        } else {
            $form->class_name = "XII";
        }
        $form->course_name = DB::table('coursetable')->where('id', $form->course_id)->pluck('course_name');
        $form->subject_name = DB::table('subjects')->where('id', $form->subject_id)->pluck('subject_name');

        $repl = str_replace(array('["', '"]'), '', $form->course_name);
        $repl2 = str_replace(array('["', '"]'), '', $form->subject_name);

        $form->course_name = $repl;
        $form->subject_name = $repl2;
        $form->topic = $request->topic;
        $form->description = $request->description;

        $form->save();
        $sub_topic = $request->sub_topic;
        $studentstopic_id = $form->id;

        for ($i = 0; $i < count($sub_topic); $i++) {
            $database = [
                'sub_topic' => $sub_topic[$i],
                'studentstopic_id' => $studentstopic_id,
            ];


            if (!empty($sub_topic)) {
                $submit = DB::table('subtopictables')->insert($database);
            }
        }

        if (!$submit) {
            return back()->with('fail', "we do not recognize your email address");
        } else {
            return redirect('add_subtopic_notes')->with('success', 'Topics and sub-topics Submitted ');
        }
    }


    
    function getvideocourses(Request $request)
    {

        $request->validate([

            'class_id' => 'required',
            'course_id' => 'required',
            'subject_id' => 'required',
            'videoheading' => 'required',
            'videodescription' => 'required',
            'videoby' => 'required',
            'videolink' => 'required|url',
    

        ]);
  
        $id = $request->id;
        $class_id = $request->class_id;
        $course_id = $request->course_id;
        $subject_id = $request->subject_id;
        $videoheading = $request->videoheading;
        $videodescription = $request->videodescription;
        $videoby = $request->videoby;
        $videolink = $request->videolink;

        if ($class_id == 1) {
            $class_name = "XI";
        } else {
            $class_name = "XII";
        }
        $course_name = DB::table('coursetable')->where('id', $course_id)->pluck('course_name');
        $subject_name = DB::table('subjects')->where('id', $subject_id)->pluck('subject_name');

        $repl = str_replace(array('["', '"]'), '', $course_name);
        $repl2 = str_replace(array('["', '"]'), '', $subject_name);

        $course_name = $repl;
        $subject_name = $repl2;
        if($request->selectedvideoheadings != '' || $request->selectedvideoheadings != null ){      $selectedvideoheadings = implode("|",$request->selectedvideoheadings);
           
    
        
            $repl = str_replace(array('["', '"]'), '',$selectedvideoheadings);
    
            $selectedvideoheadings = strval($repl);
    
            DB::table('videocourses')->insert(array(
                'class_name' => $class_name,
                'course_name'     =>   $course_name ,
                'subject_name'   =>   $subject_name,
                'videoheading'   =>   $videoheading,
                'videodescription' => $videodescription,
                'videoby' => $videoby,
                'videolink' => $videolink,
                'selectedvideoheadings' =>$selectedvideoheadings
    
            ));
          }else{
          DB::table('videocourses')->insert(array(
            'class_name' => $class_name,
            'course_name'     =>   $course_name ,
            'subject_name'   =>   $subject_name,
            'videoheading'   =>   $videoheading,
            'videodescription' => $videodescription,
            'videoby' => $videoby,
            'videolink' => $videolink,
            
        ));
      
          }

  
       

        return redirect('admin_add_video_courses')->with('success', 'Video Courses Submitted ');

    }

    function getnotes2(Request $request)
    {

        $request->validate([

            'class_id' => 'required',
            'course_id' => 'required',
            'subject_id' => 'required',
            'topic' => 'required',
            'sub_topic' => 'required',
            'notes' => 'required',
        ]);

        // dd($request->all());
        $topic = $request->topic;
        $topic_id = DB::table('subtopictables')->where('id', $topic)->value('id');

        $sub_topic =  $request->sub_topic;

        $sub_topic1 =  DB::table('subtopictables')->where('id', $sub_topic)->value('sub_topic');

        $files = [];
        if ($request->hasfile('notes')) {
            foreach ($request->file('notes') as $file) {
                $name = date('d-m-Y') . '-' . time() . '-' . $file->hashName();
                $file->move(public_path('storage/notes'), $name);
                $files[] = $name;
            }
        }
        for ($i = 0; $i < count($files); $i++) {

            $database = [
                'notes' => $files[$i],
                'sub_topic_id' => $sub_topic,
                'sub_topic' => $sub_topic1,
                'topic_id' => $topic_id,
            ];

            if (!empty($files)) {
                $submit = DB::table('notes_files')->insert($database);
            }
        }

        if (!$submit) {
            return back()->with('fail', "we do not recognize your email address");
        } else {
            return redirect('add_subtopic_notes')->with('success', 'Notes Submitted ');;
        }
    }

    function getsyllabusfiles(Request $request)
    {

        $request->validate([
            'class_id' => 'required',
            'course_id' => 'required',
            'subject_id' => 'required',
            'syllabus_files' => 'required'
     
        ]);

        $class_id = $request->class_id;
        $course_id = $request->course_id;
        $subject_id = $request->subject_id;
        if ($class_id == 1) {
            $class_name = "XI";
        } else {
            $class_name = "XII";
        }
        $course_name = DB::table('coursetable')->where('id', $course_id)->pluck('course_name');
        $subject_name = DB::table('subjects')->where('id', $subject_id)->pluck('subject_name');

        $repl = str_replace(array('["', '"]'), '', $course_name);
        $repl2 = str_replace(array('["', '"]'), '', $subject_name);

        $course_name = $repl;
        $subject_name = $repl2;
  
        $files = [];
        if ($request->hasfile('syllabus_files')) {
            foreach ($request->file('syllabus_files') as $file) {
                $name = date('d-m-Y') . '-' . time() . '-' . $file->hashName();
                $file->move(public_path('storage/syllabus_files'), $name);
                $files[] = $name;
            }
        }
        for ($i = 0; $i < count($files); $i++) {

            $database = [
                'class_name' => $class_name,
                'course_name'     =>   $course_name ,
                'subject_name'   =>   $subject_name,
                'syllabus_files' => $files[$i],
               
            ];

            if (!empty($files)) {
                $submit = DB::table('syllabusdetails')->insert($database);
            }
        }

        if (!$submit) {
            return back()->with('fail', "Try Again");
        } else {
            return redirect('admin_add_syllabus')->with('success', 'Syllabus Submitted ');;
        }
    }

    function delete_syllabus($id)
    {
        DB::table('syllabusdetails')->where('id', $id)->delete();
     

        return back()->with('success', "Deleted Syllabus");
    }

    function delete_videocourses($id)
    {
        DB::table('videocourses')->where('id', $id)->delete();
     

        return back()->with('success', "Deleted Video Course");
    }


    function add_subtopic_notes(Request $request)
    {
        return view('add_subtopic_notes');
    }


    function delete(Request $request, $id)
    {
        DB::table('studentsnotes')->where('id', $id)->delete();
        DB::table('subtopictables')->where('studentstopic_id', $id)->delete();
        DB::table('notes_files')->where('topic_id', $id)->delete();

        return back()->with('success', "Deleted Topic");
    }

    public function razorpayView()
    {
        return view('razorpayView');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                $request->session()->put('success', 'Payment successful');
            } catch (Exception $e) {
                return  $e->getMessage();
                $request->session()->put('error', $e->getMessage());
                return redirect()->back();
            }
        }

        return redirect()->back();
    }
}
