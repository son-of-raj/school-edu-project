<!DOCTYPE html>
<html lang="en">
@include('Layouts.head')

<body>

    @include('Layouts.header')
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Syllabus Details</h2>

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
                            <select name="subject_name" id="subject_id" class=" form-control input-lg dynamic3"
                                placeholder="Subjects" data-dependent='syllabus_files'>
                                <option value="Select Subjects" selected disabled>Select Subject</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <br><br>
                    <div class="card-container syllabus_files "  id="syllabus_files" style="width:80%">
                      
                        <div class="syllabus_files" align="center">
                            <div>Select subject for Syllabus</div><br>
                            
                          </div>
                      
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
        $(document).ready(function() {
        $('.dynamic3').change(function() {
            if ($(this).val() != '') {
                var select = $('#course').attr('id');
                var value = $('#subject').val();

                var course_id = $('#course').val();
                var class_id = $('#class').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('fetch8') }}",
                    method: "post",
                    data: {
                        select: select,
                        value: value,
                        _token: _token,
                        course_id: course_id,
                        class_id: class_id
                    },
                    success: function(result) {
                        $('#syllabus_files').html(result.output);
             
                       
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
/* 
#notes_table tr:nth-child(even){background-color: #f2f2f2;} */

#notes_table td:hover {background-color: rgb(241, 241, 241);}

#notes_table th {
    border: 1px solid black;
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: rgb(255, 255, 255);
  color: black;
}
    </style>

</body>

</html>