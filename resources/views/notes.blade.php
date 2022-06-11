<!DOCTYPE html>
<html lang="en">

@include('Layouts.head')

<body>

    {{-- @include('Layouts.header') --}}
    {{-- @section('content') --}}


    <div class="breadcrumbs" style="margin: 0%" data-aos="fade-in">
        <a style="float: left;font-size:20px;color: white" href="{{ url()->previous() }}"
            class="btn btn-default previous">&laquo; Previous</a>
        <div style="max-width:957px" class="container">

            <h2>{{$data['topic']}}</h2>
            <p>{{$data['description']}}</p>

        </div>

    </div><!-- End Breadcrumbs -->

    <div class="container" data-aos="fade-up">
        <br>
        <div>

            <ul>
                @foreach($data2 as $key => $row)

                <li  style="color:#0930f1" ><u><a style="color:#0930f1" href='#{{ $row->sub_topic }}'>{{ $row->sub_topic }}</a></u></li>

                @endforeach
            </ul>
        </div>
        <div align="center">
            @foreach($data3 as $key => $row)

            <?php
                  $notes = $row->notes; 
            ?>

            <img id="{{ $row->sub_topic }}" align="center" src="<?php echo asset('storage/notes/'.$notes)?>"
                style="height:130%;width: 75%;">


            @endforeach
        </div>
    </div>

    @include('Layouts.footer')

    <style type="text/css">
        .chosen-container {
            width: 100% !important;
        }

        table,
        th,
        td {
            border: 1px solid rgb(189, 180, 180);
        }

        table {
            margin: 30px
        }
    </style>

</body>

</html>