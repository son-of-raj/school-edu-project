<!DOCTYPE html>
<html lang="en">

@include('Layouts.head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
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
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact Number" required>
                </div>
              </div>

              <br>
              <div class="row">

                <div class="col form-group">
                <select id ="course" data-placeholder="Select Course" multiple class="chosen-select" name="course">
                    <option value=""></option>
                    <option value="Class XI">Class XI</option>
                    <option value="Class XII">Class XII</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Physics">Physics</option>
                    <option value="JEE mains">JEE mains</option>
                    <option value="NEET">NEET</option>
                 </select>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <br>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Type Your message here" required></textarea>
              </div>
              <br>
              <center><button class="btn btn-success"type="submit" onclick="myFunction()">Send Enquiry</button></center>
              <br>
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



function myFunction() {
  var values = [];
  $('.search-choice').each(function(){
     values.push($(this).text()); 
    });
    let courses = values.toString();
    document.getElementById("course_temp").value = courses; 
    console.log(document.getElementById("course_temp").value);
}
</script>

<style type="text/css">
    
.chosen-container {
    width: 100% !important;
}
</style>
</body>

</html>