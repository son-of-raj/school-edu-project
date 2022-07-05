<!DOCTYPE html>
<html lang="en">
@include('Layouts.head')

<body>

    @include('Layouts.header')
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Video Courses</h2>

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
                                placeholder="Subjects" data-dependent='videoheading'>
                                <option value="Select Subjects" selected disabled>Select Subject</option>
                            </select>
                        </div>
                    </div>
           <br>
     <br>
 

                    <div id='videoheading'>
                        Select Subject for Video Details

                    </div>

                   
         
           <br>
                   
                </form>
           <br>
           <br>
           <br>
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
                  url: "{{ route('fetch7') }}",
                  method: "post",
                  data: {
                      select: select,
                      value: value,
                      _token: '{{ csrf_token() }}',
                      course_id: course_id,
                      class_id: class_id
                  },
                  success: function(response) {
                    html = "";
       
                    $.each(response.result, function( index, value ) {

                html += '<section class="light"><div class="container py-2"><article class="postcard light green"><a class="postcard__img_link" href="#"><iframe class="postcard__img" src="' + value.video[0].videolink + '?autoplay=1&mute=1"  allowfullscreen></iframe></a><div class="postcard__text t-dark"><h1 class="postcard__title blue"><a href="#">' + value.video[0].videoheading + '</a></h1><div class="postcard__subtitle small"><ul class="postcard__tagbox"><li class="tag__item">' + value.video[0].class_name + '</li<li class="tag__item">' + value.video[0].course_name + '</li><li class="tag__item">' + value.video[0].subject_name + '</li><br><li class="tag__item">' + value.video[0].videoby + '</li>';
                
                var heading_text = value.video[0].selectedvideoheadings;
                if(heading_text!==undefined){
                var tags = heading_text.split(',');
                  $.each(tags, function( index, value ) {
                  
                    html += '<li class="tag__item"><a style="color:#0930f1" href="#'+ value + '">' + value + '</a></li>';
                  });
                }
               
                html += '</ul></div><div class="postcard__bar"></div><div class="postcard__preview-txt">' + value.video[0].videodescription + '</div></article></div> </section>'
          });

         
          $('#videoheading').append(html);
 
      }
                  
              })
          }
      });
  });
  </script>
<style type="text/css">
  @import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");
  /* This pen */
        body {
    font-family: "Baloo 2", cursive;
    font-size: 16px;
    color: #ffffff;
    text-rendering: optimizeLegibility;
    font-weight: initial;
  }
  section{
      padding: 0;
      margin: 0
  }
  .notes{
  background-color: #5fcf80;
  border-color: #5fcf80
  }
  .dark {
    background: #110f16;
  }

  .light {
    background: #ffffff;
  }

  a, a:hover {
    text-decoration: none;
    transition: color 0.3s ease-in-out;
  }

  #pageHeaderTitle {
    margin: 2rem 0;
    text-transform: uppercase;
    text-align: center;
    font-size: 2.5rem;
  }

  /* Cards */
  .postcard {
    flex-wrap: wrap;
    display: flex;
    box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
    border-radius: 10px;
    margin: 0 0 2rem 0;
    overflow: hidden;
    position: relative;
    color: #ffffff;
  }
  .postcard.dark {
    background-color: #18151f;
  }
  .postcard.light {
    background-color: #ffffff;
  }
  .postcard .t-dark {
    color: #18151f;
  }
  .postcard a {
    color: inherit;
  }
  .postcard h1, .postcard .h1 {
    /* margin-bottom: 0.5rem; */
    font-weight: 500;
    line-height: 0.2;
  }
  .postcard .small {
    font-size: 80%;
  }
  .postcard .postcard__title {
    font-size: 1.75rem;
  }
  .postcard .postcard__img {
    max-height: 180px;
    width: 100%;
    object-fit: cover;
    position: relative;
  }
  .postcard .postcard__img_link {
    display: contents;
  }
  .postcard .postcard__bar {
    width: 50px;
    height: 10px;
    margin: 10px 0;
    border-radius: 5px;
    background-color: #5fcf80;
    transition: width 0.2s ease;
  }
  .postcard .postcard__text {
    padding: 1.5rem;
    position: relative;
    display: flex;
    flex-direction: column;
  }
  .postcard .postcard__preview-txt {
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: justify;
    height: 100%;
  }
  .postcard .postcard__tagbox {
    display: flex;
    flex-flow: row wrap;
    font-size: 14px;
    margin: 20px 0 0 0;
    padding: 0;
    justify-content: center;
  }
  .postcard .postcard__tagbox .tag__item {
    display: inline-block;
    background: rgb(95 207 128);
    border-radius: 3px;
    padding: 2.5px 10px;
    margin: 0 5px 5px 0;
    cursor: default;
    user-select: none;
    color: white;
    transition: background-color 0.3s;
  }
  .postcard .postcard__tagbox .tag__item:hover {
    background: rgba(83, 83, 83, 0.8);
  }
  .postcard:before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-image: linear-gradient(-70deg, #424242, transparent 50%);
    opacity: 1;
    border-radius: 10px;
  }
  .postcard:hover .postcard__bar {
    width: 100px;
  }

  @media screen and (min-width: 769px) {
    .postcard {
      flex-wrap: inherit;
    }
    .postcard .postcard__title {
      font-size: 2rem;
    }
    .postcard .postcard__tagbox {
      justify-content: start;
    }
    .postcard .postcard__img {
      max-width: 426px;
      max-height: 100%;
      transition: transform 0.3s ease;
    }
    .postcard .postcard__text {
      padding: 3rem;
      width: 100%;
    }
    .postcard .media.postcard__text:before {
      content: "";
      position: absolute;
      display: block;
      background: #18151f;
      top: -20%;
      height: 130%;
      width: 55px;
    }
    .postcard:hover .postcard__img {
      transform: scale(1.1);
    }
    .postcard:nth-child(2n+1) {
      flex-direction: row;
    }
    .postcard:nth-child(2n+0) {
      flex-direction: row-reverse;
    }
    /* .postcard:nth-child(2n+1) .postcard__text::before {
      left: -12px !important;
      transform: rotate(4deg);
    }
    .postcard:nth-child(2n+0) .postcard__text::before {
      right: -12px !important;
      transform: rotate(-4deg);
    } */
  }
  @media screen and (min-width: 1024px) {
    .postcard__text {
      padding: 2rem 3.5rem;
    }

    .postcard__text:before {
      content: "";
      position: absolute;
      display: block;
      top: -20%;
      height: 130%;
      width: 55px;
    }

    .postcard.dark .postcard__text:before {
      background: #18151f;
    }

    /* .postcard.light .postcard__text:before {
      background: #e1e5ea;
    } */
  }
  /* COLORS */
  .postcard .postcard__tagbox .green.play:hover {
    background: #79dd09;
    color: black;
  }

  .green .postcard__title:hover {
    color: #79dd09;
  }

  .green .postcard__bar {
    background-color: #79dd09;
  }

  .green::before {
    background-image: linear-gradient(-30deg, rgba(121, 221, 9, 0.1), transparent 50%);
  }

  .green:nth-child(2n)::before {
    background-image: linear-gradient(30deg, rgba(121, 221, 9, 0.1), transparent 50%);
  }

  .postcard .postcard__tagbox .blue.play:hover {
    background: #0076bd;
  }

  .green .postcard__title:hover {
    color: #5fcf80;
  }

  .green .postcard__bar {
    background-color: #5fcf80;
  }

  .blue::before {
    background-image: linear-gradient(-30deg, rgba(0, 118, 189, 0.1), transparent 50%);
  }

  .blue:nth-child(2n)::before {
    background-image: linear-gradient(30deg, rgba(0, 118, 189, 0.1), transparent 50%);
  }

  .postcard .postcard__tagbox .red.play:hover {
    background: #bd150b;
  }

  .red .postcard__title:hover {
    color: #bd150b;
  }

  .red .postcard__bar {
    background-color: #bd150b;
  }

  .red::before {
    background-image: linear-gradient(-30deg, rgba(189, 21, 11, 0.1), transparent 50%);
  }

  .red:nth-child(2n)::before {
    background-image: linear-gradient(30deg, rgba(189, 21, 11, 0.1), transparent 50%);
  }

  .postcard .postcard__tagbox .yellow.play:hover {
    background: #bdbb49;
    color: black;
  }

  .yellow .postcard__title:hover {
    color: #bdbb49;
  }

  .yellow .postcard__bar {
    background-color: #bdbb49;
  }

  .yellow::before {
    background-image: linear-gradient(-30deg, rgba(189, 187, 73, 0.1), transparent 50%);
  }

  .yellow:nth-child(2n)::before {
    background-image: linear-gradient(30deg, rgba(189, 187, 73, 0.1), transparent 50%);
  }

  @media screen and (min-width: 769px) {
    .green::before {
      background-image: linear-gradient(-80deg, rgba(121, 221, 9, 0.1), transparent 50%);
    }

    .green:nth-child(2n)::before {
      background-image: linear-gradient(80deg, rgba(121, 221, 9, 0.1), transparent 50%);
    }

    .blue::before {
      background-image: linear-gradient(-80deg, rgba(0, 118, 189, 0.1), transparent 50%);
    }

    .blue:nth-child(2n)::before {
      background-image: linear-gradient(80deg, rgba(0, 118, 189, 0.1), transparent 50%);
    }

    .red::before {
      background-image: linear-gradient(-80deg, rgba(189, 21, 11, 0.1), transparent 50%);
    }

    .red:nth-child(2n)::before {
      background-image: linear-gradient(80deg, rgba(189, 21, 11, 0.1), transparent 50%);
    }

    .yellow::before {
      background-image: linear-gradient(-80deg, rgba(189, 187, 73, 0.1), transparent 50%);
    }

    .yellow:nth-child(2n)::before {
      background-image: linear-gradient(80deg, rgba(189, 187, 73, 0.1), transparent 50%);
    }
  }

</style>





  
</body>

</html>