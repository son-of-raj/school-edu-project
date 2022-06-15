<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Session;
use Exception;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin_dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin_dashboard');
    }


    

    // razor pay

    public function razorpay()
    {        
        return view('razorpayView');
    }

    public function store(Request $request)
    {
        $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
                $request->session()->put('success', 'Payment successful');
  
            } catch (Exception $e) {
                return  $e->getMessage();
                $request->session()->put('error',$e->getMessage());
                return redirect()->back();
            }
        }
          
        return redirect()->back();
    }
}
