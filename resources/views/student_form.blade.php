<!DOCTYPE html>
<html lang="en">

@include('Layouts.head')

<body>

    @include('Layouts.header')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Request Fee Structure</h2>
                <p>Please fill the form</p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        @if (\Session::has('success'))
            <br>
            <br>
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
            <script type="text/javascript">
                setTimeout(function() {
                    window.location = "/"; //here double curly bracket 
                }, 4000);
            </script>
        @endif
        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <div class="row mt-5">
                    <div class="col-lg-12 mt-5 mt-lg-0">

                        <form action="{{ route('admin.getdata') }}" method="post" role="form" class="form-group"
                            border="0" enctype='multipart/form-data'>

                            @csrf
                            <div class="row">
                                <div class="col form-group">
                                    <input type="text" name="firstName" class="form-control"
                                        value="{{ old('firstName') }}" id="name" placeholder="Student First Name">
                                    <span class="text-danger">
                                        @error('firstName')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col form-group">
                                    <input type="text" name="lastName" class="form-control"
                                        value="{{ old('lastName') }}" id="name" placeholder="Student Last Name">
                                    <span class="text-danger">
                                        @error('lastName')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col form-group">
                                    <input type="text" class="form-control" name="number" value="{{ old('number') }}"
                                        id="contact" placeholder="Student Contact Number">
                                    <span class="text-danger">
                                        @error('number')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                        id="email" placeholder="Student Email">
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col form-group">
                                    <input type="text" name="fatherName" class="form-control"
                                        value="{{ old('fatherName') }}" id="name" placeholder="Guardian Name ">
                                    <span class="text-danger">
                                        @error('fatherName')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col form-group">
                                    <input type="text" class="form-control" name="fatherNumber"
                                        value="{{ old('fatherNumber') }}" id="contact" placeholder="Guardian Number">
                                    <span class="text-danger">
                                        @error('fatherNumber')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="fatherEmail"
                                        value="{{ old('fatherEmail') }}" id="email" placeholder="Guardian Email">
                                    <span class="text-danger">
                                        @error('fatherEmail')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col form-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file" id="customFileLang" lang="es" required>
                                    <label class="custom-file-label" for="customFileLang">Upload your image(max size:2mb)</label>
                                    <span class="text-danger">
                                        @error('file')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                  </div>
                              </div>
                               
                            </div>

                            <br>
                            <div class="row">
                              <div class="col form-group">
                                <select name="year" id="year" class="form-control input-lg" placeholder="Year">

                                    <option value="{{ old('year') }}" selected disabled>Select Year</option>

                                    <option value="22">2022</option>
                                    <option value="23">2023</option>
                                    <option value="24">2024</option>
                                    <option value="25">2025</option>

                                </select>
                                <span class="text-danger">
                                    @error('year')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                                <div class="col form-group">
                                    <select name="class_name" id="class" class="form-control input-lg dynamic"
                                        data-dependent='course' placeholder="Class">

                                        <option value="Select Class" selected disabled>Select Class</option>

                                        <option value="1">XI</option>
                                        <option value="2">XII</option>


                                    </select>
                                    <span class="text-danger">
                                        @error('class_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col form-group">
                                    <select name="course_name" id="course" class="form-control input-lg dynamic2"
                                        data-dependent='subject' placeholder="Course">
                                        <option value="Select Courses" selected disabled>Select Course</option>

                                    </select>
                                    <span class="text-danger">
                                        @error('course_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col form-group ">
                                    <select name="subject_name[]" id="subject" multiple="multiple"
                                        class="js-example-basic-multiple form-control input-lg " placeholder="Subjects">
                                        <option value="Select Subjects" selected disabled>Select Subject</option>

                                    </select>
                                    <span class="text-danger">
                                        @error('subject_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col" hidden>
                                    <select name="subject_id[]" id="subject_id" multiple="multiple"
                                        class="js-example-basic-multiple form-control input-lg " placeholder="Subjects">
                                        <option value="Select Subjects" selected disabled>Select Subject</option>
                                    </select>
                                </div>
                                <br><br>
                                <br>
                                <div class="">
                                    <label style="font-size:15px">
                                        <input type="checkbox" name="terms" required>
                                        <b> KPoints Pvt Ltd </b> reserves the rights to use the students photos in case
                                        they come in the merit list of any and all attending exams.</label><br>


                                </div>
                                <div class="">
                                    <label style="font-size:15px">
                                        <input type="checkbox" name="terms_and_conditions" required>
                                        we accept terms and conditions of KPoints</label><br>


                                </div>

                                <br><br>
                                <button onclick="copySubjects()" id="submit1" class="btn btn-success"
                                    type="submit">Request Fee Structure</button>
                        </form>

                    </div>

                </div>

            </div>
            <script></script>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    @include('Layouts.footer')


    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            function copySubjects() {
                // $('#subject_id').val() = $('#subject').val();

            }
            $('.dynamic').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr('id');
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('studentsdetail.fetch') }}",
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
                        url: "{{ route('studentsdetail.fetch2') }}",
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

    <script type="text/javascript">
        function copySubjects() {
            // $('#subject_id').val() = $('#subject').val();
            console.log('Hii');
        }
    </script>


</body>

</html>
