<!DOCTYPE html>
<html lang="en">

@include('Layouts.head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />

<body>

    @include('Layouts.header')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Enquiry</h2>
                <p>Please fill the form for fee details</p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="row mt-5">
                    <div class="col-lg-12 mt-5 mt-lg-0">
                        <form action="enquery-submit" method="post" role="form" class="form-group" border="0">
                            <div class="row">
                                <div class="col form-group">
                                    @csrf
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col form-group">
                                    <input type="text" class="form-control" name="contact" id="contact"
                                        placeholder="Contact Number" required>
                                </div>
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="row">

                        <div class="col form-group">
                            <select name="class_id" id="class" class="form-control input-lg dynamic"
                                data-dependent='course' placeholder="Class">

                                <option value="Select Class" selected disabled>Select Class</option>

                                <option value="1">XI</option>
                                <option value="2">XII</option>


                            </select>
                        </div>

                        <div class="col form-group">
                            <select name="course_id" id="course" class="form-control input-lg dynamic2"
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
                            <select name="subjects[]" id="subject" multiple="multiple"
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


                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" placeholder="Type Your message here" required></textarea>
                    </div>

                    <center><br><button class="btn btn-success" type="submit" onclick="myFunction()">Send
                            Enquiry</button></center>

                    <input type="text" id="course_temp" name="course_temp" hidden></input>
                    </form>

                </div>

            </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->


    @include('Layouts.footer')
    <script type="text/javascript">
        $(".chosen-select").chosen({
                no_results_text: "Oops, nothing found!"
            })

            <
            script src = "https://code.jquery.com/jquery-2.2.4.min.js"
        integrity = "sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin = "anonymous" >
    </script>
    <script>
        $(document).ready(function() {

            // function copySubjects(){
            //   $('#subject_id').val() = $('#subject').val();
            //   console.log($('#subject_id').val());

            // }

            function myFunction() {
                console.log($('#subject').val());
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
                            // console.log(result);
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
                            console.log(result.output3);
                            $('#subject').html(result.output);
                            $('#subject_id').html(result.output3);

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
