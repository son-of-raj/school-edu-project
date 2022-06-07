<!DOCTYPE html>
<html lang="en">
@include('Layouts.head')

<body>

    @include('Layouts.header')
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Study Material</h2>

        </div>
    </div><!-- End Breadcrumbs -->

    <div class="container" data-aos="fade-up">

        <div class="row mt-5">
            <div class="col-lg-12 mt-5 mt-lg-0">

                <form method="post" role="form" class="form-group" border="0"
                    enctype='multipart/form-data'>

                    @csrf
                    <div class="row">
                        <div class="col form-group">
                            <select name="class_id" id="class" class="form-control input-lg dynamic"
                                data-dependent='course' placeholder="Class">

                                <option value="Select Class" selected disabled>Select Class</option>

                                <option value="1">XI</option>
                                <option value="2">XII</option>


                            </select>
                            <span class="text-danger">
                                @error('class_id')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col form-group">
                            <select name="course_id" id="course" class="form-control input-lg dynamic2"
                                data-dependent='subject' placeholder="Course">
                                <option value="Select Courses" selected disabled>Select Course</option>

                            </select>
                            <span class="text-danger">
                                @error('course_id')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col form-group ">
                            <select name="subject_id" id="subject" class="form-control input-lg dynamic3"
                                data-dependent='topic' placeholder="Subjects">
                                <option value="Select Subjects" selected disabled>Select Subject</option>
                            </select>
                            <span class="text-danger">
                                @error('subject_id')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col" hidden>
                            <select name="subject_name" id="subject_id" class=" form-control input-lg dynamic3(this.id)"
                                placeholder="Subjects" data-dependent='topic'>
                                <option value="Select Subjects" selected disabled>Select Subject</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <br><br>
                    <div class="table-responsive" style="width:100%">
                        <table id="notes_table" class="" style=" width: -webkit-fill-available; ">
                            <thead>
                                    <th align="center">Sr no.</th>
                                    <th align="center">Topics</th>
                                    <th align="center">No. of pages</th>
                            </thead>
                           <tbody id="hr">
                            <tr  align="center">
                                
                                <td id="srno" align="center"></td>


                                <td id="topic" align="center">


                                    <div>Select Subject for topics</div>



                                </td>
                                <td id="notes" align="center">
                                    
                                </td>

                          
                            </tr>
                           </tbody>
                        </table>
                    </div>
                    <br><br>
                </form>
                <br><br>
            </div>
        </div>
    </div>
    @include('Layouts.footer')
    <style type="text/css">
        body {
            counter-reset: Serial;
        }

        table {
            border-collapse: separate;
        }

        
    </style>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

        $('.dynamic').change(function() {
            if ($(this).val() != '') {
                var select = $(this).attr('id');
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('fetch') }}",
                    method: "post",
                    data: {
                        select: select,
                        value: value,
                        _token: _token,
                        dependent: dependent
                    },
                    success: function(result) {
                        $('#' + dependent).html(result);
                    }
                })
            }
        });
    });
    </script>
    <script>
        $(document).ready(function() {
        $('.dynamic2').change(function() {
            if ($(this).val() != '') {
                var select = $('#class').attr('id');
                var value = $('#course').val();

                var class_id = $('#class').val();

                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('fetch2') }}",
                    method: "post",
                    data: {
                        select: select,
                        value: value,
                        _token: _token,
                        class_id: class_id
                    },
                    success: function(result) {

                        $('#subject').html(result.output);
                        $('#subject_id').html(result.output2);

                    }
                })
            }
        });
    });
    </script>

<script>
     
   
    $(function Fetchnotes($id) {
        var id = $id;
        $.ajax({
            url: '/notes',
            method: "post",
                    data: {
                        id: id, 
            },
            dataType : 'json',
            success: function(result) {

            }
        });
   
});
    </script>

    <script>
        $(document).ready(function() {
        $('.dynamic3').change(function() {
            if ($(this).val() != '') {
                var select = $('#course').attr('id');
                var value = $('#subject').val();

                var course_id = $('#course').val();

                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('fetch3') }}",
                    method: "post",
                    data: {
                        select: select,
                        value: value,
                        _token: _token,
                        course_id: course_id
                    },
                    success: function(result) {
                        $('#hr').html(result.output);
                        // $('#srno').html(result.output1);
                        // $('#topic').html(result.output2);
                        // $('#notes').html(result.output3);
                       
                    }
                })
            }
        });
    });
    </script>

    <style type="text/css">
        .chosen-container {
            width: 100% !important;
        }

        #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#notes_table td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#notes_table tr:nth-child(even){background-color: #f2f2f2;}

#notes_table tr:hover {background-color: #ddd;}

#notes_table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #5fcf80;
  color: white;
}
    </style>

</body>

</html>