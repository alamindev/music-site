<!-- Start Preloader Area -->
    <div class="loader-wrapper">
        <div class="loader">
            <div class="dot-wrap">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </div>
    <!-- End Preloader Area -->

    <!-- Start Navbar Area -->
    <div class="navbar-area navbar-area-two">
        <!-- Menu For Mobile Device -->
        <div class="mobile-nav">
            <a href="index.html" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>
        </div>

        <!-- Menu For Desktop Device -->
        <div class="main-nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo">
                    </a>

                    <div class="collapse navbar-collapse mean-menu">
                        <ul class="navbar-nav ml-auto mr-3">
                            <li class="nav-item">
                                <a href="{{ route('index') }}" class="nav-link">
									Home
								</a>
                            </li>

                            <li class="nav-item">
                                <a href="practice-record.html" class="nav-link">
									Practice Record
								</a>
                            </li>
                            <li class="nav-item">
                                <a href="1_book.html" class="nav-link">
									Choose Exercises
								</a>
                            </li> 

   @guest
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">
									Login
								</a>
                            </li>  
                                        @endguest
                        </ul>
 
                        @guest
                        <div class="others-option">
                            <div class="register">
                                <a href="{{ route('register') }}" class="default-btn desktop-login-btn">
									Register Now
								</a>
                            </div>
                        </div> 

                        @endguest
                        @auth 
                             <div class="header-menu"> 
                            <div class="user-area dropdown float-right">
                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle" width="40" src="{{ asset('assets/images/admin.jpg') }}" alt="User Avatar">
                                </a>

                                <div class="user-menu dropdown-menu">
                                    <a class="nav-link" href="{{ route('profile') }}">My Profile</a> 
                                      <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <i class="fa fa-power -off"></i>
                                                {{ __('Logout') }}
                                                </a>  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form> 
                                </div>
                            </div>

                        </div>
                        @endauth
                    </div>
                </nav>
            </div>
        </div>

        <!-- Start Others Option For Responsive -->
        <div class="others-option-for-responsive">
            <div class="container">
                <div class="dot-menu">
                    <div class="inner">
                        <div class="circle circle-one"></div>
                        <div class="circle circle-two"></div>
                        <div class="circle circle-three"></div>
                    </div>
                </div>

                <div class="container">
                    <div class="option-inner">
                        <div class="others-option justify-content-center d-flex align-items-center">

                            <div class="register">
                                <a href="registration.html" class="default-btn">
										Register Now
									</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Others Option For Responsive -->
    </div>
    <!-- End Navbar Area -->