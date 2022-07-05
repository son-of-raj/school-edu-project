<!DOCTYPE html>
<html lang="en">

@include('Layouts.head')

<body>

    @include('Layouts.header')
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Add sub topic images</h2>

        </div>
    </div><!-- End Breadcrumbs -->


    @if (\Session::has('success'))
    <br>
    <br>
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    
    @endif

    <div class="container" data-aos="fade-up">

        <div class="row mt-5">
            <div class="col-lg-12 mt-5 mt-lg-0">

                <form action="{{ route('getsyllabusfiles') }}" method="post" role="form" class="form-group" border="0"
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
                            <select name="subject_id" id="subject" class="form-control input-lg "
                                placeholder="Subjects">
                                <option value="Select Subjects" selected disabled>Select Subject</option>
                            </select>
                            <span class="text-danger">
                                @error('subject_id')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col" hidden>
                            <select name="subject_name" id="subject_id" class=" form-control input-lg "
                                placeholder="Subjects">
                                <option value="Select Subjects" selected disabled>Select Subject</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="input-group hdtuto control-group lst increment">
                            <input type="file" name="syllabus_files[]" class="myfrm form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-success add" type="button"><i
                                        class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                            </div>
                            <span class="text-danger">
                                @error('syllabus_files')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="clone hide">
                            <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                <input type="file" name="syllabus_files[]" class="myfrm form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger remove" type="button"><i
                                            class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                                <span class="text-danger">
                                    @error('syllabus_files')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="here"></div>
                    <br><br>
                    <button style="width: 100%" id="submit" class="btn btn-success" type="submit">Add Syllabus Files</button>
                </form>
                <br><br>
            </div>
        </div>
    </div>

    @include('Layouts.footer')

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
    <script type="text/javascript">
        $(document).ready(function() {
          $(".add").click(function(){ 
              var lsthmtl = $(".clone").html();
              $(".here").append(lsthmtl);
          });
          $("body").on("click",".remove",function(){ 
              $(this).parents(".hdtuto").remove();
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

    <style type="text/css">
        .chosen-container {
            width: 100% !important;
        }
    </style>

</body>

</html>