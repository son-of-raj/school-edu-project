<!DOCTYPE html>
<html lang="en">

@include('Layouts.head')

<body>

@include('Layouts.header')
<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Students Details</h2>
        
      </div>
    </div><!-- End Breadcrumbs -->

    <div class="container">
      <br>
        <div class="table-responsive">
        <table id="example" class=" table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th hidden>Id</th>
                    <th>Sr. no</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Course</th>
                    <th>Subjects</th>
                    <th>Year</th>
                    <th>Admission Code</th>
                    <th>Created Date</th>
                  
                </tr>
            </thead>
            @foreach($data as $key=> $row)
            <tr>
                <td hidden class="stud_id">{{$row->id}}</td>
                <td>{{ ++$key }}</td>
                <td class="stud_id" id="pop_up"><a style="cursor:pointer; color:rgb(0, 0, 0);" onclick="popup( '{{ $row->id }} ');" class='view_btn'>{{$row->firstName}} {{$row->lastName}}</a></td>
                <td class="stud_id">{{$row->class_id}}</td>
                <td class="stud_id">{{$row->course_id}}</td>
                <td class="stud_id">{{$row->subject_id}}</td>
                <td class="stud_id">{{"20".$row->year}}</td>
                <td class="stud_id">
                @if($row->generated_code == NULL)
                    <button type="button" id="{{ $row->id }}" class="btn-primary generate " href="" onclick="generate( '{{ $row->id }} ');">Generate</button>
                @else
                    {{$row->generated_code}}-{{$row->generated_subject_code}}-{{str_pad($row->generated_code_id, 3, '0', STR_PAD_LEFT)}}
                @endif
               </td>
               <td>{{date('d/m/Y', strtotime($row->created_at))}}</td>
               
         
            </tr>
            @endforeach

            </table>
         <div id="popup_details" class="modal"  >
             <div class="modal-content">
    <div class="modal-header">
      
      <h2>Student Details</h2>
      <span class="close">&times;</span>
    </div>
 
    <table class="table" >
        <tr>
            <td><h6>Student Name</h6></td>
            <td><h6 id="student_name"></h6></td>
            
        </tr>
        <tr>
            <td><h6>Student Email</h6></td>
            <td><h6 id="student_email"></h6></td>
            
        </tr>
        <tr>
            <td><h6>Student Number</h6></td>
            <td><h6 id="student_number"></h6></td>
            
        </tr>
        <tr>
            <td><h6>Father Name</h6></td>
            <td><h6 id="father_name"></h6></td>
            
        </tr>
        <tr>
            <td><h6>Father Email</h6></td>
            <td><h6 id="father_email"></h6></td>
            
        </tr>
        <tr>
            <td><h6>Father Number</h6></td>
            <td><h6 id="father_number"></h6></td>
            
        </tr>
        <tr>
            <td><h6>Class</h6></td>
            <td><h6 id="student_class"></h6></td>
            
        </tr>
        <tr>
            <td><h6>Course</h6></td>
            <td><h6 id="student_course"></h6></td>
            
        </tr>
        <tr>
            <td><h6>Subjects</h6></td>
            <td><h6 id="student_subjects"></h6></td>
            
        </tr>
        <tr>
        <td><h6>Year</h6></td>
            <td><h6 id="year"></h6></td>
            
        </tr>
        
    </table>
  </div></div>
        </div>
    </div>


    <script type="text/javascript">
        function generate(id){
           
            $.ajax(
                    {
                        url:"{{ route('studentsdetails.generate')}}",
                        method:"post",
                        data:{"_token": "{{ csrf_token() }}","id": id,},
                        success:function(result){
                            console.log(result);
                            $("#"+result[0]).replaceWith("<a>" + result[1] + "</a>");
                            

                        }
                    }
                )
        }
        
  
        var modal = document.getElementById("popup_details");
        var btn = document.getElementById("pop_up");
        var span = document.getElementsByClassName("close")[0];
        $('#example').DataTable({
            
        order: [[0 , 'desc']],
        dom: 'lBfrtip',
        buttons: [
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                autoFilter: true,
                exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7,8],
                // format: {
                //         body: function(data, row, column, node) {
                //             console.log(data)
                //             return column === 17 ? data : data;
                //             // return column === 5 ? "Hello" : data;
                //         }
                //     }
                },
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-csv"></i>',
                titleAttr: 'CSV',
                exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7,8]
                },
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7,8]
                },
            },
            

],

    });
        span.onclick = function() { 
            modal.style.display = "none";
}



            function popup(id){
                $.ajax(
                    {          
                        url:"{{ route('studentsdetails.popup')}}",
                        method:"post",
                        data:{"_token": "{{ csrf_token() }}","id": id,},
                        success:function(result){
                            console.log(result);
                            modal.style.display = "block";                            
                            $("#student_name").replaceWith("<h6 id= 'student_name'>"+result[0].firstName+' '+result[0].lastName+"</h6>");
                            $("#student_email").replaceWith("<h6 id= 'student_email'>"+result[0].email+"</h6>");
                            $("#student_number").replaceWith("<h6 id= 'student_number'>"+result[0].number+"</h6>");
                            $("#father_name").replaceWith("<h6 id= 'father_name'>"+result[0].fatherName+"</h6>");
                            $("#father_email").replaceWith("<h6 id= 'father_email'>"+result[0].fatherEmail+"</h6>");
                            $("#father_number").replaceWith("<h6 id= 'father_number'>"+result[0].fatherNumber+"</h6>");                
                            $("#student_class").replaceWith("<h6 id= 'student_class'>"+result[0].class_id+"</h6>")
                            $("#student_course").replaceWith("<h6 id= 'student_course'>"+result[0].course_id+"</h6>")
                            $("#student_subjects").replaceWith("<h6 id= 'student_subjects'>"+result[0].subject_id+"</h6>")
                            $("#year").replaceWith("<h6 id= 'year'>"+"20"+result[0].year+"</h6>")
                            
                        }
                    }
                )}
        
     
    
    </script>
   <style>


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
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

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
.dataTables_wrapper .dt-buttons {
  /* float:none;   */
  /* text-align:center; */

  padding-left:3%;
  

}
.csvtext { 
    visibility: hidden;
    }

</style>

@include('Layouts.footer')
</body>
</html>