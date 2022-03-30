<!DOCTYPE html>
<html lang="en">
@include('popups.demopopup')
@include('Layouts.head')

<body>


@include('Layouts.header')

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>About KPoints</h2>
                <!-- <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p> -->
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
        
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <!-- <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <img src="/assets/img/about-us.jpg" class="img-fluid" alt="">
                    </div> -->
                    <div class="col content">
                        <p>
                            <div class="section-title">
                            <h2 data-aos="fade-left">About KPoints</h2>
                            </div>
                        <b>KPoints</b> started in 2021, with the vision of creating a Teachers' Community for excellence in education. We are specialised in providing online tutorial classes and career counselling to students to achieve their dreams. 
                    </p>
                        <p>
                        KPoints strive to provide a learning experience that enhances the significance for our students in a professional, supportive and ethical environment. Hence, the student will now enjoy learning rather than ignore it. Our motto is to become a leader in providing successful academic results for our students through a culture of innovation, commitment and service.
                    </p>
                        <!-- <ul>
                            <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                        </ul> -->
                        <p>
</br>
                        <div class="section-title">
                            <h2 data-aos="fade-left">About Founder</h2>
                            </div>
                       <p><b>Mr Sunil Sangam</b> is the founder of KPoints. A Biotechnology Engineering graduate started teaching Mathematics, Biology and Chemistry to the students in his early engineering days and gained a reputation in educating individuals. He believes learning should be open to all and tries to educate individuals in an accessible and understandable manner. As a successful educator, he has trained & inspired 300+ students to achieve their dreams. </p>
                    </p>
                    </div>
                </div>

            </div>
        </section>
        <!-- End About Section -->


        @include('Layouts.counter')



    </main>
    <!-- End #main -->

    @include('Layouts.footer')

<script type="text/javascript">
     document.getElementById('about').className = 'active';
</script>

</body>

</html>