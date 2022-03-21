<div class="container">
<div class="section-title" data-aos="fade-left">
                    <h2>Our Results Define US</h2>
                    <!-- <p>What are they saying</p> -->
                </div>
    <div class="row">
    <div class="col-md-4 col-sm-6">
            <div class="counter green">
                <span class="counter-value">2000</span>
                <h3>Total Students</h3>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="counter green">
                <span class="counter-value">300</span>
                <h3>JEE qualifiers</h3>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="counter green">
                <span class="counter-value">200</span>
                <h3>NEET qualifiers</h3>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
 $(document).ready(function(){
    $('.counter-value').each(function(){
        $(this).prop('Counter',0).animate({
            Counter: $(this).text(),
        },{
            duration: 3500,
            easing: 'swing',
            step: function (now){
                $(this).text(Math.ceil(now));
                
            }
        });
    });
});
</script>