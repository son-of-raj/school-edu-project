<!DOCTYPE html>
<html lang="en">

@include('Layouts.head')

<body>

    @include('Layouts.header')
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Add Video Courses</h2>

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

                <form action="{{ route('getvideocourses') }}" method="post" role="form" class="form-group" border="0"
                    enctype='multipart/form-data'>

                    @csrf
                    <div class="row">
                        <div class="col form-group">
                            <select name="class_id" id="class" class="form-control input-lg dynamic"
                                data-dependent='course' placeholder="Class" required>

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
                                data-dependent='subject' placeholder="Course" required>
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
                                placeholder="Subjects" required>
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
                                placeholder="Subjects" >
                                <option value="Select Subjects" selected disabled>Select Subject</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col form-group">

                            <input type="textarea" name="videoheading" class="form-control" value="{{ old('videoheading') }}"
                                placeholder="Enter Video Heading" required>
                            <span class="text-danger">
                                @error('videoheading')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col form-group">
                            <textarea rows="5" cols="50" name="videodescription" class="form-control"
                                value="{{ old('videodescription') }}" id="videodescription"
                                placeholder="Enter Video Description" required></textarea>
                            <span class="text-danger">
                                @error('videodescription')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col form-group">
                            <input type="textarea" name="videoby" class="form-control" value="{{ old('videoby') }}"
                                id="videoby" placeholder="Video By" required>
                            <span class="text-danger">
                                @error('videoby')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col form-group">
                            <input type="textarea" name="videolink" class="form-control" value="{{ old('videolink') }}"
                                id="videolink" placeholder="Video Link" required>
                            <span class="text-danger">
                                @error('videolink')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <br>
                    <div class="col form-group ">
                        <select name="selectedvideoheadings[]" id="videoheading" multiple="multiple" class="js-example-basic-multiple form-control input-lg " placeholder="selectedvideoheadings" >
                            <option value="Select Headings" selected disabled>Select Headings</option>
                         
                        </select>
                    
                    </div>
                    
                    <br><br>
                    <button style="width: 100%" id="submit" class="btn btn-success" type="submit">Add Topics</button>
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
                url: "{{ route('fetch11') }}",
                method: "post",
                data: {
                    select: select,
                    value: value,
                    _token: _token,
                    course_id: course_id,
                    class_id: class_id
                },
                success: function(result) {
                    $('#videoheading').html(result.output);
         
                   
                }
            })
        }
    });
});
</script>
       <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
       <script>
           $(document).ready(function() {
               $('.js-example-basic-multiple').select2();
           });
       </script>

    <style type="text/css">
        .chosen-container {
            width: 100% !important;
        }
    </style>

</body>

</html>