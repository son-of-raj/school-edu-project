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
        <div align="center">


            @foreach($step1 as $key => $notes)


            <img align="center" src="<?php echo asset(" storage/notes/$notes")?>"
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