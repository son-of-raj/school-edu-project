<!DOCTYPE html>
<html lang="en">

@include('Layouts.head')

<body>



    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div style='margin-top:0%' class="breadcrumbs" data-aos="fade-in">
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
                    window.location = "/admin_dashboard"; //here double curly bracket 
                }, 4000);
        </script>
        @endif
        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <div class="row mt-5">
                    <div class="col-lg-12 mt-5 mt-lg-0">

                        <form action="{{ route('updatechanges') }}" method="post" role="form" class="form-group" border="0"
                            enctype='multipart/form-data'>

                            @csrf
                            @foreach($data as $key => $row)
                            <div class="row">
                                <div class="col form-group">
                                    <input type="text" name="id" class="form-control"
                                    value="{{ $row->id }}" id="id" placeholder="Student First Name" hidden>
                                    <input type="text" name="firstName" class="form-control"
                                        value="{{ $row->firstName }}" id="name" placeholder="Student First Name">
                                    <span class="text-danger">
                                        @error('firstName')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col form-group">
                                    <input type="text" name="lastName" class="form-control" value="{{ $row->lastName }}"
                                        id="name" placeholder="Student Last Name">
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
                                    <input type="text" class="form-control" name="number" value="{{ $row->number }}"
                                        id="contact" placeholder="Student Contact Number">
                                    <span class="text-danger">
                                        @error('number')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="email" value="{{ $row->email }}"
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
                                    <input type="text" name="guardianName" class="form-control"
                                        value="{{ $row->guardianName }}" id="name" placeholder="Guardian Name ">
                                    <span class="text-danger">
                                        @error('guardianName')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col form-group">
                                    <input type="text" class="form-control" name="guardianNumber"
                                        value="{{ $row->guardianNumber }}" id="contact" placeholder="Guardian Number">
                                    <span class="text-danger">
                                        @error('guardianNumber')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="guardianEmail"
                                        value="{{ $row->guardianEmail }}" id="email" placeholder="Guardian Email">
                                    <span class="text-danger">
                                        @error('guardianEmail')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <br>
                            <button id="submit1" class="btn btn-success" type="submit">Update changes</button>
                        </form>
                        @endforeach
                        
                    </div>

                </div>

            </div>
            <script></script>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    @include('Layouts.footer')


</body>

</html>