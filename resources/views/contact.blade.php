<!DOCTYPE html>
<html lang="en">

@include('Layouts.head')

<body>

@include('Layouts.header')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Contact Us</h2>
        <p>Reach Out To Us</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <!-- <div data-aos="fade-up">
        <iframe style="border:0; width: 30%; height: 250px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d124411.85681794892!2d77.6472499589811!3d12.980131979980541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae0def7e439621%3A0x77f12818aee83ff6!2sImmadihalli%2C%20Whitefield%2C%20Bengaluru%2C%20Karnataka%20560066!5e0!3m2!1sen!2sin!4v1644141249707!5m2!1sen!2sin" frameborder="0" allowfullscreen></iframe>
        </div> -->

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">

            <div class="address" data-aos="flip-left">
                <iframe style="border:0; width: 100%; height: 150px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d124411.85681794892!2d77.6472499589811!3d12.980131979980541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae0def7e439621%3A0x77f12818aee83ff6!2sImmadihalli%2C%20Whitefield%2C%20Bengaluru%2C%20Karnataka%20560066!5e0!3m2!1sen!2sin!4v1644141249707!5m2!1sen!2sin" frameborder="0" allowfullscreen></iframe>
              </div><br>
              <div class="address" data-aos="flip-left">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Whitefield,Bengaluru</p>
                <p> Karnataka 560066 </p>
              </div>

              <div class="email" data-aos="flip-left">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><a href="mailto:info@kpoints.com"><b>info@kpoints.com</b></a></p>
              </div>

              <!-- <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p><a href="tel:+917010140023"><b>+91 7010140023</b></a></p>
              </div> -->

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="flip-right">
            <form action="contact-submit" method="post" role="form" class="form-group" border="0">
              <div class="row">
                <div class="col-md-6 form-group">
                @csrf
                  <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6 form-group">
                @csrf
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6 form-group">
                @csrf
                  <input type="text" name="class" class="form-control" id="class" placeholder="Class and Board" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="exams" id="exams" placeholder="Entrance exams if any">
                </div>
              </div>
              <br>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <br>
              <center><button class="btn btn-success"type="submit">Send Message</button></center>
            </form>

          </div>

        </div>

      </div>
      <br>
      <br>
      <br>
      <br>
      <center><h3>Share Your Experience</h3></center>
      <br>
      <div class="container"  data-aos="fade-up">
        <div class="col d-flex justify-content-center">
        <div class="col-lg-8 mt-5 mt-lg-0">
            <form action="feedback-submit" method="post" role="form" class="form-group" border="0">
              <div class="row">
                <div class="col-md-6 form-group">
                @csrf
                  <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6 form-group">
                @csrf
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6 form-group">
                @csrf
                  <input type="text" name="class" class="form-control" id="class" placeholder="Class and Board" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="exams" id="exams" placeholder="Entrance exams if any">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6 form-group">
                @csrf
                  <input type="text" name="subject" class="form-control" id="class" placeholder="Subject taught" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="percent" id="exams" placeholder="Percentage or Rank" required>
                </div>
              </div>
              <br>
                <div class="stars">
                <input class="star star-1" id="star-1" type="radio" value="5" name="star"/>
                <label class="star star-1" for="star-1"></label>
                <input class="star star-2" id="star-2" type="radio" value="4" name="star"/>
                <label class="star star-2" for="star-2"></label>
                <input class="star star-3" id="star-3" type="radio" value="3" name="star"/>
                <label class="star star-3" for="star-3"></label>
                <input class="star star-4" id="star-4" type="radio" value="2" name="star"/>
                <label class="star star-4" for="star-4"></label>
                <input class="star star-5" id="star-5" type="radio" value="1" name="star"/>
                <label class="star star-5" for="star-5"></label>
                </div>
                <br>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Write your feedback here" required></textarea>
              </div>
              <br>
              <center><button class="btn btn-success"type="submit">Send Feedback</button></center>
            </form>

          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->


  @include('Layouts.footer')

<script type="text/javascript">
     document.getElementById('contact').className = 'active';
</script>

</body>

</html>