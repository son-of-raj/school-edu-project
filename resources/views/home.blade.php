<!DOCTYPE html>
<html lang="en">
@include('popups.homepop')
@include('Layouts.head')

<body>

@include('Layouts.header')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Nurturing the future</h1><br><h1>to Thrive</h1>
   <!--   <h2>We are team of talented designers making websites with Bootstrap</h2>-->
      <a href="demo" class="btn-get-started">Get Demo</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Welcome to Kpoints</h3>
            <p class="fst-italic paragraph">
            A venture by Mr. Sunil Sangam, a highly regarded online and offline Educator with 7+ years of experience, as a personal and group tutor student and a career counselor.
            </p>
            <!-- <ul>
              <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul> -->
            <p class="paragraph">
            Mr. Sunil with his dedication to share knowledge, has educated and inspired 200+ students. He prides himself on the excellence and accomplishments of his students.
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    @include('Layouts.counter')

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <!-- <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose Mentor?</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
              </p>
              <div class="text-center">
                <a href="about.html" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div> -->
          <div class="col d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-brain"></i>
                    <h4>Experience and Knowledge</h4>
                    <p style="color: black">3+ years of experience, in-depth understanding of the subjects, Ability to relate the subject with real life examples enabling students to  understand better</p>
                  </div>
                </div>
                <div class="col d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-line-chart"></i>
                    <h4>Results</h4>
                    <p style="color: black">1000+ students, 100 % CBSE board results,
                      <br>Highest: 92%  
		                  <br>300+ JEE mains qualifying students
                      <br>Highest: 96.8 percentile 
		                  <br>200+ NEET qualifying students
		                  <br>Highest: 628/720 AIR 4020
                    </p>
                  </div>
                </div>
                <div class="col d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bxs-book-reader"></i>
                    <h4>Comprehensible Teaching</h4>
                    <p style="color: black">Explanations done in easy understandable language with appropriate illustrations, use of humor to enable students concentrate and enjoy the class while learning</p>
                  </div>
                </div>
                <div class="col d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-message-rounded-detail"></i>
                    <h4>Counseling</h4>
                    <p style="color: black">Student and Parent counseling to understand the requirements of both. Helping students create a study plan to overcome their limitations and achieve mutual goal</p>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-book-alt"></i>
                    <h4>Engaging Online Classes</h4>
                    <p style="color: black">Use of the traditional chalk and board method of teaching, using modern digital tools for engaging classes that help students to focus and easily understand</p>
                  </div>
                </div>
                <div class="col d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-book-open"></i>
                    <h4>Notes and Study Material</h4>
                    <p style="color: black">In depth notes , mostly useful for JEE mains and NEET, last minute quick revision notes for all forms of exams, formulae and important data sheets</p>
                  </div>
                </div>
                <div class="col d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-laptop"></i>
                    <h4>Great Online Platform</h4>
                    <p style="color: black">Use of Microsoft teams education which provides excellent platform for teaching and learning with recording feature for online classes and  tests.</p>
                  </div>
                </div>
                <div class="col d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-network-chart"></i>
                    <h4>Digital Tracking</h4>
                    <p style="color: black">Parent login on site feature enables parent to track weekly student progress, submission of homework / assignments, tests and attendance. Parents can also pay, track and download fee invoice online</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Features Section ======= -->
    <!-- <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box">
              <i class="ri-store-line" style="color: #ffbb2c;"></i>
              <h3><a href="">Lorem Ipsum</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
              <h3><a href="">Dolor Sitema</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
              <h3><a href="">Sed perspiciatis</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
              <h3><a href="">Magni Dolores</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-database-2-line" style="color: #47aeff;"></i>
              <h3><a href="">Nemo Enim</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
              <h3><a href="">Eiusmod Tempor</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
              <h3><a href="">Midela Teren</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
              <h3><a href="">Pira Neve</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-anchor-line" style="color: #b2904f;"></i>
              <h3><a href="">Dirada Pack</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-disc-line" style="color: #b20969;"></i>
              <h3><a href="">Moton Ideal</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-base-station-line" style="color: #ff5828;"></i>
              <h3><a href="">Verdo Park</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
              <h3><a href="">Flavor Nivelanda</a></h3>
            </div>
          </div>
        </div>

      </div>
    </section>End Features Section -->

    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Courses</h2>
          <p>Popular Courses</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <div class="col d-flex align-items-stretch">
            <div class="course-item">
              <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <!-- <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Web Development</h4>
                  <p class="price">$169</p>
                </div> -->

                <h3><a href="#">CBSE - XI - Science & Commerce</a></h3>
                <p style="color: black">Class XI  is a straight plunge into the depths of the subjects after passing out from class X & an important stage of Foundation, Learning and clearing their fundamentals for class XII, JEE mains, NEET and other entrances.</p>
                <!-- <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                    <span>Antonio</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;50
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;65
                  </div>
                </div> -->
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col d-flex align-items-stretch mt-4 mt-md-0">
            <div class="course-item">
              <img src="assets/img/course-2.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <!-- <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Marketing</h4>
                  <p class="price">$250</p>
                </div> -->

                <h3><a href="#">CBSE - XII - Science & Commerce</a></h3>
                <p style="color: black">Class XII is the career-defining moment in any student’s life, It is the time to implement logic & understanding of the basics learnt in class XI to excel in class XII boards and proceed  further for higher education in different degree courses.</p>
                <!-- <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                    <span>Lana</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;35
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;42
                  </div>
                </div> -->
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <!-- <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Content</h4>
                  <p class="price">$180</p>
                </div> -->

                <h3><a href="#">JEE mains & IIT Advanced</a></h3>
                <p style="color: black">Joint entrance Examination is a single common examination for admission in to all IIT, NIT & Govt. Funded colleges across India, Which depends on knowledge and concepts from both class XI and class XII.</p>
                <!-- <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
                    <span>Brandon</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;20
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;85
                  </div>
                </div> -->
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <!-- <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Content</h4>
                  <p class="price">$180</p>
                </div> -->

                <h3><a href="course-details.html">NEET</a></h3>
                <p style="color: black">It is a single all India level entrance examination to get admission to almost all medical colleges across India (including private & autonomous colleges), Which depends on knowledge and concepts from both class XI and class XII.</p>
                <!-- <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
                    <span>Brandon</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;20
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;85
                  </div>
                </div> -->
              </div>
            </div>
          </div> <!-- End Course Item-->

        </div>

      </div>
    </section><!-- End Popular Courses Section -->

    <!-- ======= Trainers Section ======= -->
    <!-- <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Walter White</h4>
                <span>Web Development</span>
                <p>
                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Sarah Jhinson</h4>
                <span>Marketing</span>
                <p>
                  Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>William Anderson</h4>
                <span>Content</span>
                <p>
                  Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>End Trainers Section -->

  </main><!-- End #main -->

  @include('Layouts.footer')


  <script type="text/javascript">
     document.getElementById('home').className = 'active';
     
</script>
</body>

</html>
