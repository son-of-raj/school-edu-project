<!DOCTYPE html>
<html lang="en">

@include('Layouts.head')

<body>

    @include('Layouts.header')
    @section('content')
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>{{$data['topic']}}</h2>
            <p>{{$data['description']}}</p>

        </div>
    </div><!-- End Breadcrumbs -->

    <div class="container" data-aos="fade-up">
        <div align="center">

            @foreach($data['files'] as $notes)
            <?php
            $notesFile =  str_replace('"','',$notes);
            ?>
            <img align="center" src="<?php echo asset('storage/notes/'.$notesFile)?>"
            style="height:130%;width: 75%;">
            <br><br>

            @endforeach
        </div>
    </div>
    @include('Layouts.footer')

    <style type="text/css">
        .chosen-container {
            width: 100% !important;
        }
    </style>

</body>

</html>