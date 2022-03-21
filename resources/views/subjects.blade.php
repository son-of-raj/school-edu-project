<!DOCTYPE html>
<html lang="en">
@include('Layouts.head')

<body>

@include('Layouts.header')

  <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Subjects</h2>
                <p>Here you will know more about your subjects</p>
            </div>
        </div>
        <!-- End Breadcrumbs -->

    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Subjects</h2>
          <p>Subjects in demand</p>
        </div>

        <div class="container">
  <div class="card-group vgr-cards">
    <div class="card">
      <div class="card-img-body">
        <img class="card-img" src="https://picsum.photos/450/250" alt="Card image cap"></div>
      <div class="card-body">
        <h4 class="card-title">Card title</h4>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action. This is a wider card with supporting text below as a natural lead-in
          to additional content. This content is a little bit longer.</p>
        <a href="#" class="btn btn-outline-primary">Primary</a>
      </div>
    </div>
  </div>
</div>

      </div>
    </section><!-- End Popular Courses Section -->




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