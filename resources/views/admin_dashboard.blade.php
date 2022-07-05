<!DOCTYPE html>
<html lang="en">

@include('Layouts.head')

<body>

    @include('Layouts.header')
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Admin Dashboard</h2>

        </div>
    </div><!-- End Breadcrumbs -->

    <div class="container" style="padding:10px; margin:0px;max-width:1500px">
        <br>
        <div class="table-responsive" style="width:100%">
            <table id="example" class=" table table-striped table-bordered display overflow-auto">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Sr. no</th>
                        <th>Image</th>
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Course</th>
                        <th>Subjects</th>
                        <th>Year</th>
                        <th>Fee Structure</th>
                        <th>Admission Code</th>
                        <th>Credentials</th>
                        <th>Created Date</th>
                        <th>Fee Structure</th>
                        <th>Admission Code</th>
                        <th>Student Number</th>
                        <th>Student email</th>
                        <th>Guardian Name</th>
                        <th>Guardian Number</th>
                        <th>Guardian email</th>
                        <th>User ID</th>
                        <th>Password</th>

                    </tr>
                </thead>
                @foreach ($data as $key => $row)
                <tr>
                    <td class="stud_id">{{ $row->id }}</td>
                    <td>{{ ++$key }}</td>
                    <td align="center"> <img src="<?php echo asset("storage/students/$row->photo")?>"
                        style="height: 46px;width: 74%;border-radius: 50%;"></td>
                    <td align="center" class="stud_id" id="pop_up"><a style="cursor:pointer; color:rgb(0, 0, 0);"
                            onclick="popup( '{{ $row->id }} ');" class='view_btn'>{{ $row->firstName }} {{
                            $row->lastName }}</a></td>
                    <td align="center" class="stud_id">{{ $row->class_id }}</td>
                    <td align="center" class="stud_id">{{ $row->course_id }}</td>
                    <td align="center" class="stud_id">{{ $row->subject_id }}</td>
                    <td align="center" class="stud_id">{{ '20' . $row->year }}</td>
                    <td style="width:16%;align-items:center;" class="stud_id">
                        @if ($row->fee_structure != null)
                        {{-- <button style="color:white; background-color:#5fcf80;" type="button"
                            id="{{ 'A' . $row->id }}" class="btn generate " href=""
                            onclick="generate_fee( '{{ 'A' . $row->id }} ');">Re-Send Structure</button> --}}

                        <a>Email Sent</a>


                        @else
                        <button style="color:white; background-color:#5fcf80; " type="button" id="{{ 'A' . $row->id }}"
                            class="btn generate " href="" onclick="generate_fee( '{{ 'A' . $row->id }} ');">Send Fee
                            Structure</button>
                        @endif
                    </td>
                    <td align="center" class="stud_id">
                        @if ($row->generated_code == null)
                        <button style="color:white; background-color:#5fcf80; font-size:14px" type="button" id="pop_up3"
                            class="btn" href="" onclick="popup3( '{{ $row->id }} ');">Generate</button>
                        @else
                        {{ $row->generated_code }}-{{ $row->generated_subject_code }}-{{
                        str_pad($row->generated_code_id, 3, '0', STR_PAD_LEFT) }}
                        @endif
                    </td>
                    <td align="center">
                        <button style="color:white; background-color:#5fcf80; font-size:14px" type="button" id="pop_up2"
                            class="btn" href="" onclick="popup2( '{{ $row->id }} ');">Send Credentials</button>
                    </td>
                    <td align="center">{{ date('d/m/Y', strtotime($row->created_at)) }}</td>
                    <td align="center" class="stud_id">
                        @if ($row->fee_structure != null)
                        Sent
                        @else
                        Not-Sent
                        @endif
                    </td>

                    <td align="center" class="stud_id">
                        @if ($row->generated_code == null)
                        Exam code not Generated
                        @else
                        {{ $row->generated_code }}-{{ $row->generated_subject_code }}-{{
                        str_pad($row->generated_code_id, 3, '0', STR_PAD_LEFT) }}
                        @endif
                    </td>


                    <td align="center">
                        {{ $row->number}}
                    </td>
                    <td align="center">
                        {{ $row->email}}
                    </td>
                    <td align="center">
                        {{ $row->guardianName}}
                    </td>
                    <td align="center">
                        {{ $row->guardianNumber}}
                    </td>
                    <td align="center">
                        {{ $row->guardianEmail}}
                    </td>
                    <td align="center">
                        @if ($row->user_id != null)
                        {{ $row->user_id}}
                        @else
                        Not-Sent
                        @endif
                    </td>
                    <td align="center">
                        @if ($row->user_pass != null)
                        {{ $row->user_pass}}
                        @else
                        Not-Sent
                        @endif
                    </td>



                </tr>
                @endforeach

            </table>



            <div id="popup_details" class="modal">
                <div class="modal-content">
                    <div class="modal-header">

                        <h2>Student Details</h2>
                        <span style="cursor: pointer;" class="close">&times;</span>
                    </div>

                    <table class="table">
                        <tr>
                            <td>
                                <h6>Student Name</h6>
                            </td>
                            <td>
                                <h6 id="student_name"></h6>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h6>Student Email</h6>
                            </td>
                            <td>
                                <h6 id="student_email"></h6>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h6>Student Number</h6>
                            </td>
                            <td>
                                <h6 id="student_number"></h6>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h6>Guardian Name</h6>
                            </td>
                            <td>
                                <h6 id="father_name"></h6>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h6>Guardian Email</h6>
                            </td>
                            <td>
                                <h6 id="father_email"></h6>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h6>Guardian Number</h6>
                            </td>
                            <td>
                                <h6 id="father_number"></h6>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h6>Class</h6>
                            </td>
                            <td>
                                <h6 id="student_class"></h6>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h6>Course</h6>
                            </td>
                            <td>
                                <h6 id="student_course"></h6>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h6>Subjects</h6>
                            </td>
                            <td>
                                <h6 id="student_subjects"></h6>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h6>Year</h6>
                            </td>
                            <td>
                                <h6 id="year"></h6>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h6>Admission Code</h6>
                            </td>
                            <td>
                                <h6 id="admission_code"></h6>
                            </td>

                        </tr>

                        <tr>
                            <td>
                                <h6>Admission Fee Received</h6>
                            </td>
                            <td>
                                <h6 id="admission_fee"></h6>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h6>Transaction ID</h6>
                            </td>
                            <td>
                                <h6 id="transaction_id"></h6>
                            </td>

                        </tr>

                        <tr>
                            <td>
                                <h6>User ID</h6>
                            </td>
                            <td>
                                <h6 id="user_id"></h6>
                            </td>

                        </tr>

                        <tr>
                            <td>
                                <h6>Password</h6>
                            </td>
                            <td>
                                <h6 id="password"></h6>
                            </td>

                        </tr>

                    </table>
                    <div align="right" style="padding: 10px;">
                        <a id="update_id"></a>
                        <a id="create_login"></a>
                        <a id="delete"></a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="popup_details2" class="modal2">
        <div class="modal-content">
            <div class="modal-header">

                <h6 id="student"></h6>
                <strong class="close2">&times;</strong>
            </div>
            <div style="padding: 8px">
                <form action="{{route('admin.getidpass')}}" method="post" role="form" class="form-group" border="0">

                    @csrf
                    <div class="row">
                        <div class="col form-group" hidden>
                            <input type="text" name="id" class="form-control" value="" id="id" placeholder="Id"
                                required>

                        </div>
                        <div class="col form-group">
                            <input type="text" name="user_id" class="form-control" value="{{old('user_id')}}"
                                id="user_id" placeholder="User Id" required>
                            <span class="text-danger">@error('user_id'){{$message}} @enderror</span>
                        </div>
                        <div class="col form-group">
                            <input type="text" name="user_pass" class="form-control" value="{{old('user_pass')}}"
                                id="user_pass" placeholder="User Password" required>
                            <span class="text-danger">@error('user_pass'){{$message}} @enderror</span>
                        </div>
                    </div>
                    <div style="padding:10px">
                        <button id="submit1" class="btn btn-success" type="submit">Send</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div id="popup_details3" class="modal3">
        <div class="modal-content">
            <div class="modal-header">

                <h6 id="studentName"></h6>
                <strong class="close3">&times;</strong>
            </div>
            <div style="padding: 8px">
                <form action="{{route('admin.getdetails')}}" method="post" role="form" class="form-group" border="0">

                    @csrf
                    <div class="row">
                        <div class="col form-group" hidden>
                            <input type="text" name="id" class="form-control" value="" id="studid" placeholder="Id"
                                required>

                        </div>
                        <div class="col form-group">
                            <label>Admission Fee received:</label><input type="number" name="advance"
                                class="form-control" id="months" placeholder="Enter Amount" required>
                            <span class="text-danger">@error('months'){{$message}} @enderror</span>
                        </div>
                        <div class="col form-group">
                            <label>Transaction ID:</label><input type="text" name="transaction" class="form-control"
                                id="months" placeholder="Transaction ID">
                            <span class="text-danger">@error('months'){{$message}} @enderror</span>
                        </div>

                    </div>
                    <div style="padding:10px">
                        <button id="submit1" class="btn btn-success" type="submit">Send</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var modal = document.getElementById("popup_details");
        var btn = document.getElementById("pop_up");
        var span = document.getElementsByClassName("close")[0];
        var modal2 = document.getElementById("popup_details2");
        var btn2 = document.getElementById("pop_up2");
        var modal3 = document.getElementById("popup_details3");
        var btn3 = document.getElementById("pop_up3");

        $('#example').DataTable({

            order: [
                [0, 'desc']
            ]
            , dom: 'lBfrtip'
            , buttons: [{
                    extend: 'excelHtml5'
                    , text: '<i class="fa fa-file-excel-o"></i>'
                    , titleAttr: 'Excel'
                    , autoFilter: true
                    , exportOptions: {
                        columns: [3,14,15,16,17,18,4,5,6,7,12,13,11,19,20],

                    }
                , }
                , {
                    extend: 'csvHtml5'
                    , text: '<i class="fa fa-file-csv"></i>'
                    , titleAttr: 'CSV'
                    , exportOptions: {
                        columns: [3,14,15,16,17,18,4,5,6,7,12,13,11,19,20]
                    , }
                , }
                , {
                    extend: 'pdfHtml5'
                    , text: '<i class="fa fa-file-pdf-o"></i>'
                    , titleAttr: 'PDF'
                    , orientation: 'landscape'
                    , pageSize: 'LEGAL'
                    , exportOptions: {
                        columns: [3,14,15,16,17,18,4,5,6,7,12,13,11,19,20]
                    , }
                , },



            ]
            , paging: true
            , lengthChange: true
            , searching: true
            , ordering: true
            , "columnDefs": [
                //hide the 2nd column. it's index is "1"
                {
                    'visible': false
                    , 'targets': [0,1,12,13,14,15,16,17,18,19,20],

                } /// COLUMN INDEX HERE
            ]
        });


        span.onclick = function() {
            modal.style.display = "none";
        };
        
        $('.close2').on('click', function () {
            modal2.style.display = "none";
        })

        $('.close3').on('click', function () {
            modal3.style.display = "none";
        })

        function generate_fee(id) {
            $.ajax({
                url: "{{ route('studentsdetails.generate_fee') }}",
                method: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                },
                success: function(data) {
                    console.log(data[0].id);
                    alert("Fee Structure sent successfully")
                    $("#" + (data[0].id)).replaceWith(
                        '<a>Email Sent</a>'
                    );
                   
                }
            })
        }

        function popup(id) {
            $.ajax({
                url: "{{ route('studentsdetails.popup') }}", 
                method: "post", 
                data: {
                    "_token": "{{ csrf_token() }}", 
                    "id": id, 
                }, 
                success: function(result) {
                    console.log(result);
                    modal.style.display = "block";
                    $("#update_id").replaceWith('<a style="color: white;" href="update_details/'+ result[0].id +'"><button style="width: 10%;margin-inline:20px;color:white; background-color:#5fcf80; font-size:14p" class="btn" type="button">Update</button></a>');
                    $("#delete").replaceWith('<a style="color: white;" href="delete_student/'+ result[0].id +'"><button style="width: 10%;margin-inline:20px;color:white; background-color:red; font-size:14p" class="btn" type="button">Delete</button></a>');
                    if(result[0].user_cred == 0){$("#create_login").replaceWith('<a style="color: white;" href="generate_login/'+ result[0].id +'"><button style="width: 20%;margin-inline:20px;color:white; background-color:#5fcf80; font-size:14p" class="btn" type="button">Create User Id</button></a>');}else{
                        $("#create_login").replaceWith('<a style="color: white;"></a>');
                    }
                    
                    $("#student_name").replaceWith("<h6 id= 'student_name'>" + result[0].firstName + ' ' +
                        result[0].lastName + "</h6>");
                    $("#student_email").replaceWith("<h6 id= 'student_email'>" + result[0].email + "</h6>");
                    $("#student_number").replaceWith("<h6 id= 'student_number'>" + result[0].number + "</h6>");
                    $("#father_name").replaceWith("<h6 id= 'father_name'>" + result[0].guardianName + "</h6>");
                    $("#father_email").replaceWith("<h6 id= 'father_email'>" + result[0].guardianEmail + "</h6>");
                    $("#father_number").replaceWith("<h6 id= 'father_number'>" + result[0].guardianNumber +
                        "</h6>");
                    $("#student_class").replaceWith("<h6 id= 'student_class'>" + result[0].class_id + "</h6>")
                    $("#student_course").replaceWith("<h6 id= 'student_course'>" + result[0].course_id +
                        "</h6>")
                    $("#student_subjects").replaceWith("<h6 id= 'student_subjects'>" + result[0].subject_id +
                        "</h6>")
                    $("#year").replaceWith("<h6 id= 'year'>" + "20" + result[0].year + "</h6>")

                    if (result[0].generated_code == null) {
                        $("#admission_code").replaceWith("<h6 id= 'admission_code'> Admission code not generted </h6>")
                    }else{
                        $("#admission_code").replaceWith("<h6 id= 'admission_code'>" + result[0].generated_code +"-"+result[0].generated_subject_code+"-"+result[0].generated_code_id+"</h6>")
                    }

                    if (result[0].advance == null) {
                        $("#admission_fee").replaceWith("<h6 id= 'admission_fee'> Admission Fee Not Received </h6>")
                    }else{
                        $("#admission_fee").replaceWith("<h6 id= 'admission_fee'>" + result[0].advance +"</h6>")
                    }

                    if (result[0].transaction_id == null) {
                        $("#transaction_id").replaceWith("<h6 id= 'transaction_id'> Transaction ID Not Found </h6>")
                    }else{
                        $("#transaction_id").replaceWith("<h6 id= 'transaction_id'>" + result[0].transaction_id +"</h6>")
                    }

                    if (result[0].user_id == null) {
                        $("#user_id").replaceWith("<h6 id= 'user_id'> User ID Not Generated  </h6>")
                    }else{
                        $("#user_id").replaceWith("<h6 id= 'user_id'>" + result[0].user_id +"</h6>")
                    }

                    if (result[0].user_pass == null) {
                        $("#password").replaceWith("<h6 id= 'password'> User Password Not Generated  </h6>")
                    }else{
                        $("#password").replaceWith("<h6 id= 'password'>" + result[0].user_pass +"</h6>")
                    }
                   

                }

                // admission_fee,transaction_id,user_id,password
            })
        }


        function popup2(id) {
            $.ajax({
                url: "{{ route('studentsdetails.popup2') }}",
                method: "post", 
                data: {
                    "_token": "{{ csrf_token() }}", 
                    "id": id, 
                }, 
                success: function(result) {
                    console.log(result);
                    modal2.style.display = "block";
                    $("#student").replaceWith("<h6 id= 'student'> To " + result[0].firstName + ' ' +result[0].lastName + "</h6>");
                    $("#id").replaceWith('<input type="text" name="id" class="form-control" value='+  result[0].id +' id="id" placeholder="Id" required >');
                }
            })
        }

        function popup3(id) {

         $.ajax({
         url: "{{ route('studentsdetails.popup3') }}", 
         method: "post",
          data: {
         "_token": "{{ csrf_token() }}", 
          "id": id, 
         }, 
         success: function(result) {
            console.log(result);
         modal3.style.display = "block";
         $("#studentName").replaceWith("<h6 id= 'studentName'> To " + result[0].firstName + ' ' +result[0].lastName + "</h6>");
         $("#studid").replaceWith('<input type="text" name="id" class="form-control" value='+  result[0].id +' id="studid" placeholder="Id" required >');

         }
         })
        }

    </script>

    <style>
        /* The Modal (background) */
        .modal,
        .modal2,
        .modal3 {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        /* The Close Button */
        .close,
        .close2,
        .close3 {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
        }

        .modal-body {
            padding: 2px 16px;
        }

        .modal-footer {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
        }

        .dataTables_wrapper .dt-buttons {
            /* float:none;   */
            /* text-align:center; */

            padding-left: 3%;


        }

        .csvtext {
            visibility: hidden;
        }

        table.dataTable thead tr {
            background-color: #5fcf80;
            color: white
        }

        .buttons-excel {
            background-color: #5fcf80;
            color: white
        }
    </style>

    @include('Layouts.footer')
</body>

</html>