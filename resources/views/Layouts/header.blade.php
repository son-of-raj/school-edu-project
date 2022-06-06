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
        <!-- <li><a href="subjects">Subjects</a></li> -->
        <!-- <li><a href="Form">Upload Form</a></li> -->
        <!-- <li><a href="trainers.html">Courses</a></li> -->
        <li><a id="contact" href="contact">Contact</a></li>
        
       
        <!-- <li class="dropdown"><a href="#"><span>Subjects</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li class="dropdown"><a href="#"><span>Class XI</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="#">
              <li class="dropdown"><a href="#"><span>Science (Boards)</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                <li><a href="#">
                <li><a href="subjects1"><span>Biology</span></a></li>
                <li><a href="subjects"><span>Chemistry</span></a></li>
                <li><a href="#"><span>Mathematics</span></a></li>
                <li><a href="#"><span>Physics</span></a></li>
                </a>
              </li>
              </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Science (NEET)</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                <li><a href="#">
                <li><a href="#"><span>Biology</span></a></li>
                <li><a href="#"><span>Chemistry</span></a></li>
                <li><a href="#"><span>Physics</span></a></li>
                </a>
                </li>
              </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Science (JEE)</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                <li><a href="#">
                <li><a href="#"><span>Chemistry</span></a></li>
                <li><a href="#"><span>Mathematics</span></a></li>
                <li><a href="#"><span>Physics</span></a></li>
                </a>
                </li>
              </ul>
              </li>
                <li class="dropdown"><a href="#"><span>Commerce</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                <li><a href="#">
                <li><a href="#"><span>Applied Mathematics</span></a></li>
                <li><a href="#"><span>Economics</span></a></li>
                <li><a href="#"><span>Business Studies</span></a></li>
                <li><a href="#"><span>Accounts</span></a></li>
                </a>
                </li>
              </ul>
              </li>
                </a>
            </li>
          </ul>
          </li>
            <li class="dropdown"><a href="#"><span>Class XII</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">
                  <li class="dropdown"><a href="#"><span>Science (Boards)</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                    <li><a href="#">
                    <li><a href="#"><span>Biology</span></a></li>
                    <li><a href="#"><span>Chemistry</span></a></li>
                    <li><a href="#"><span>Mathematics</span></a></li>
                    <li><a href="#"><span>Physics</span></a></li>
                    </a>
                  </li>
                  </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Science (NEET)</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                    <li><a href="#">
                    <li><a href="#"><span>Biology</span></a></li>
                    <li><a href="#"><span>Chemistry</span></a></li>
                    <li><a href="#"><span>Physics</span></a></li>
                    </a>
                    </li>
                  </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Science (JEE)</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                    <li><a href="#">
                    <li><a href="#"><span>Chemistry</span></a></li>
                    <li><a href="#"><span>Mathematics</span></a></li>
                    <li><a href="#"><span>Physics</span></a></li>
                    </a>
                    </li>
                  </ul>
                  </li>
                    <li class="dropdown"><a href="#"><span>Commerce</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                    <li><a href="#">
                    <li><a href="#"><span>Applied Mathematics</span></a></li>
                    <li><a href="#"><span>Economics</span></a></li>
                    <li><a href="#"><span>Business Studies</span></a></li>
                    <li><a href="#"><span>Accounts</span></a></li>
                    </a>
                    </li>
                  </ul>
                  </li>
                    </a>
                </li>
              </ul>
            </li>
          
      </li> -->
      </ul>
      </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
    <!-- .navbar -->

    <a href="demo" class="get-started-btn">Get Demo</a>
    @if (Auth::user())
    <a id="admin_dashboard" class="get-started-btn" href="admin_dashboard">Admin</a>
    @endif
    @if (Auth::user())
    <a id="admin_add_notes" class="get-started-btn" href="admin_add_notes">Add notes</a>
    @endif
    @if (Auth::user())
    <a id="logout" class="get-started-btn" href="logout">Logout</a>
    @endif
  
  </div>
</header><!-- End Header -->