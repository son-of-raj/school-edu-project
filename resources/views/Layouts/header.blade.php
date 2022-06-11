<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <!-- <h1 class="logo me-auto"><a href="/">KPoints</a></h1> -->
    <!-- Uncomment below if you prefer to use an image logo -->
    <a href="/" id="logo" class="me-auto logo">
      <img src="{{ URL::to('assets/Logo_02.png') }}" alt="" class="img-fluid">
    </a>
    <a href="/" id="mobile_logo" class="me-auto logo">
      <img src="{{ URL::to('assets/mobile_logo.png') }}" alt="" class="img-fluid">
    </a>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a id="home" href="/">Home</a></li>
        <li><a id="about" href="about">About</a></li>
        <li><a id="fee_structure" href="student_form">Fee Enquiry</a></li>
        <li><a id="show_notes" href="/show_notes">Study Material</a></li>
        <li><a id="contact" href="contact">Contact</a></li>
        
    
    @if (Auth::user())
    <li class="dropdown"><a href="#"><span>Admin</span><i class="bi bi-chevron-down"></i></a>
      <ul>
      <li><a href="#">
      <li><a id="admin_dashboard"  href="admin_dashboard"><span>Dashboard</span></a></li>
      <li><a id="admin_add_notes"  href="admin_add_notes"><span>Add Topics</span></a></li>
      <li><a id="add_subtopic_notes"  href="add_subtopic_notes"><span>Add Notes</span></a></li>
      <li><a id="logout"  href="logout"><span>Logout</span></a></li>
    </li>
    </ul>
      </li>
    @endif
    
      </ul>
      </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
    <a href="demo" style="color: white" class='get-started-btn'>Get Demo</a>
    <!-- .navbar -->

  </div>
</header><!-- End Header -->