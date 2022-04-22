<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Contact;
use App\Mail\Feedback;
use Illuminate\Support\Facades\Mail;
use App\Models\faculties;
class VideoSave extends Controller
{

public function Faculties(Request $request){
    $faculties = faculties::get();
    return $faculties;
}




}
