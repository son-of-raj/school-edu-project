<!DOCTYPE html>
<html lang="en">

@include('Layouts.head')

<body>

    @include('Layouts.header')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Payment</h2>
             
            </div>
        </div><!-- End Breadcrumbs -->

<br>
{{-- @if( $data2['admin'] !== null) --}}
    <div align="center"  class="container" style="padding:10px; margin:0px;max-width:1500px">
   
        <div class="table-responsive" style="width:30%;padding-left:30px">
            <div><h3>Admission Fee</h3></div>
            <br>
            <table id="example" class=" table table-striped table-bordered display overflow-auto">
                <thead>
                    <tr>
                      
                        <th>Sr. no</th>
                        
                        <th>Amount</th>
                      
                        <th>Pay Link</th>
                        
                    </tr>
                </thead>
              
                <tr>
                    <td class="stud_id">1</td>
                    
                    <td align="center" class="stud_id">{{$data2['advance']}}</td>
                    <td style="width:16%;align-items:center;" class="stud_id">
                        @if (  $data3['check'] == 'paid')
                        <a>Paid</a>
                        @else
                        <form action="{{ route('razorpay.payment.store') }}" method="POST" >
                                @csrf
                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="{{ env('RAZORPAY_KEY') }}"
                                        data-amount="{{$data2['advance'] *100}}"
                                        data-buttontext='Pay'
                                        data-name="KPoints.com"
                                        data-description="Razorpay"
                                        data-image="https://kpoints.in/assets/Logo_02.png"
                                        data-prefill.name="name"
                                        data-prefill.email="email"
                                        data-theme.color="#5fcf80">
                                </script>
                            </form>
                        @endif
                    </td>
                    
                </tr>

            </table>
        </div>

        <br> 
        
        <div class="table-responsive" style="width:60%;padding-left:30px">
            <div><h3>Monthly Fee</h3></div>
            <br>
            <table  id="example" class=" table table-striped table-bordered display overflow-auto">
                <thead>
                    <tr>
                        <th style="display:none">Id</th>
                        <th style="display:none" >Student Id </th>
                        <th>Sr. no</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Amount</th>
                        <th>Pay Link</th>
                        
                    </tr>
                </thead>
                @if($data3['check'] == 'paid')

                @foreach ($data as $key => $row)
               
                @if( $row->month !== 'admission_fee')
  
                  @if ($row->id !== $next_month) 
                   
                  
                <tr>
                    <td style="display:none" class="stud_id">{{ $row->id }}</td>
                    <td style="display:none" class="stud_id">{{ $row->student_id }}</td>
                    <td class="stud_id">{{ ++$key }}</td>
                    <td align="center" class="stud_id">{{ $row->month }}</td>
                    <td align="center" class="stud_id">{{ $row->year }}</td>
                    <td align="center" class="stud_id">{{ $row->amount }}</td>
                    <td style="width:16%;align-items:center;" class="stud_id">
                        @if ($row->pay == 'paid')
                        <a>Paid</a>
                        @else
                  
                            <form action="{{ route('razorpay.payment.store') }}" method="POST" >
                                @csrf
                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="{{ env('RAZORPAY_KEY') }}"
                                        data-amount="{{$row->amount *100}}"
                                        data-buttontext='Pay'
                                        data-name="KPoints.com"
                                        data-description="Razorpay"
                                        data-image="https://kpoints.in/assets/Logo_02.png"
                                        data-prefill.name="name"
                                        data-prefill.email="email"
                                        data-theme.color="#5fcf80">
                                </script>
                            </form>
                        @endif
                    </td>
                </tr> 
                @endif
                @if ($row->id == $next_month)
                @break
            @endif

                @else
                @endif
     
                @endforeach

                @else
           
                @endif

            </table>
        </div>
    </div>
    {{-- @else
    @endif --}}
  

        </main><!-- End #main -->

        @include('Layouts.footer')
    

        <style>
           .razorpay-payment-button{
      
        
    background: #5fcf80;
    color: #fff;
    border-radius: 10px;
    padding: 8px 25px;
    border:0;


  
           }

           .table{
            border: rgba(0, 0, 0, 0.337) solid
           }
        </style>
    </body>

    </html>