<!DOCTYPE html>
<html lang="en">
@include('Layouts.head')

<body>

@include('Layouts.header')

  <main id="main">
       
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Video Upload</h2>
        <p>Please fill the form for Demo</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="row mt-5">
          <div class="col-lg-12 mt-5 mt-lg-0">
            <form action="video-upload" method="post" role="form" class="form-group" border="0">
              <div class="row">
                <div class="col form-group">
                @csrf
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact Number" required>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>

              <br>
              <div class="row">
               
                <div class="col form-group">
                <select class="form-control" name="class" id="class" placeholder="Class" required>
                <option value="" selected disabled>Select Class</option>
                <option value="Class XI">Class XI</option>
                <option value="Class XII">Class XII</option>
              </select>
                </div>

                <div class="col form-group">
                <select class="form-control" name="course" id="course" placeholder="Course" required>
                <option value="" selected disabled>Select Course</option>
                <option value="Science (Boards)">Science (Boards)</option>
                <option value="Science (NEET)">Science (NEET)</option>
                <option value="Science (JEE)">Science (JEE)</option>
                <option value="Commerce">Commerce</option>
               </select>
                </div>
                <div class="col form-group">
                <select class="form-control" name="subjects" id="subjects" placeholder="Subjects" required>
                <option value="" selected disabled>Select Subjects</option>
               </select>
                </div>
               
              </div>
              <br>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Type Your message here" required></textarea>
              </div><br>
              <center><button class="btn btn-success"type="submit">Request Demo</button></center>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->


  </main><!-- End #main -->

  @include('Layouts.footer')


  <script type="text/javascript">
     $(document).ready(function(){
            $.ajax({
                        url: "/faculties_name",
                        type: "post",
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response);
                        }
                    });
        });

        $("#course").change(function () {
        var val = $(this).val();
        if (val == "Science (Boards)") {
            $("#subjects").html(
              "<option value='Biology'>Biology</option><option value='Chemistry'>Chemistry</option><option value='Mathematics'>Mathematics</option><option value='Physics'>Physics</option>");
        } else if (val == "Science (NEET)") {
            $("#subjects").html(
              "<option value='Biology'>Biology</option><option value='Chemistry'>Chemistry</option><option value='Physics'>Physics</option>");
        }
        else if (val == "Science (JEE)") {
            $("#subjects").html(
              "<option value='Chemistry'>Chemistry</option><option value='Mathematics'>Mathematics</option><option value='Physics'>Physics</option>");
        }
        else if (val == "Commerce") {
            $("#subjects").html(
              "<option value='Applied Mathematics'>Applied Mathematics</option><option value='Economics'>Economics</option><option value='Business Studies'>Business Studies</option><option value='Accounts'>Accounts</option>");
        }
    });
     
</script>
<style>


  .card {
    display: flex;
    flex-flow: wrap;
    flex: 100%;
    margin-bottom: 40px;
  }
 .card-img-body {
      order: 2;
    }


  .card-img-body {
    flex: 1;
    overflow: hidden;
    position: relative;
    
    @media (max-width: 576px) {
      width: 100%;
      height: 200px;
          margin-bottom: 20px;
    }
    
  }
  
  .card-img {
    width: 100%;
    height: auto;
    position: absolute;
    margin-left: 50%;
    transform: translateX(-50%);
    
    @media (max-width: 1140px) {
          margin: 0;
    transform: none;
    width: 100%;
    height: auto;
    }
    
  }

  .card-body {
    flex: 2;
    padding: 0 0 0 1.25rem;
    
    @media (max-width: 576px) {
      padding: 0;
    }
    
  }

</style>
</body>

</html>