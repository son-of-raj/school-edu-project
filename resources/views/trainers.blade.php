<!DOCTYPE html>
<html lang="en">
@include('Layouts.head')

<body>

@include('Layouts.header')

  <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Trainers</h2>
                <p>Here you will know more about your trainers</p>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th  class="text-center" style="width: 40%;background: #eef1f4;"><h5><b>Trainer Information</b></h5></th>
                        <th class="text-center" style="width: 60%;background: #eef1f4;"><h5><b>Introduction</b></h5></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">
                            <h5>Mr. Sunil</h5>
                            <h6><b>NEET/JEE Trainer</b></h6>
                            <p>A highly regarded online and offline Educator with 7+ years of experience, as a personal and group tutor student and a career counselor</p>
                        </td>
                        <td class="text-center">
                        <iframe width="60%" height="100%" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                        </iframe>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <h5>Mr. Sunil</h5>
                            <h6><b>NEET/JEE Trainer</b></h6>
                            <p>A highly regarded online and offline Educator with 7+ years of experience, as a personal and group tutor student and a career counselor</p>
                        </td>
                        <td class="text-center">
                        <iframe width="60%" height="100%" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                        </iframe>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <h5>Mr. Sunil</h5>
                            <h6><b>NEET/JEE Trainer</b></h6>
                            <p>A highly regarded online and offline Educator with 7+ years of experience, as a personal and group tutor student and a career counselor</p>
                        </td>
                        <td class="text-center">
                        <iframe width="60%" height="100%" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                        </iframe>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

      </div>
    </section>
    <!-- End Trainers Section -->

  </main><!-- End #main -->

  @include('Layouts.footer')


  <script type="text/javascript">
     document.getElementById('home').className = 'active';
     
</script>
</body>

</html>