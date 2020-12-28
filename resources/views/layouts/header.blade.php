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
            <a href="{{ route('index') }}" class="logo">
                @if($setting->site_logo != null)
                <img width="130" src="{{ url('storage'. $setting->site_logo) }}" alt="Logo">
                @else
                Logo
                @endif
            </a>
            @auth 
                <div class="header-menu d-block d-lg-none" style="z-index: 999;position: absolute;right: 60px;top: 15px;"> 
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(auth()->user()->photo == null)
                                <img class="user-avatar rounded-circle" width="40" src="{{ asset('assets/images/admin.jpg') }}" alt="User Avatar"> 
                            @else
                                <img class="user-avatar rounded-circle" width="40" src="{{ url('storage'. auth()->user()->photo) }}" alt="User Avatar"> 
                            @endif
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

        <!-- Menu For Desktop Device -->
        <div class="main-nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md">
                      <a href="{{ route('index') }}" class="logo">
                        @if($setting->site_logo != null)
                            <img width="120" src="{{ url('storage'. $setting->site_logo) }}" alt="Logo">
                            @else
                            Logo
                            @endif
                        </a>

                    <div class="collapse navbar-collapse mean-menu">
                        <ul class="navbar-nav ml-auto mr-3">
                            <li class="nav-item">
                                <a href="{{ route('index') }}" class="nav-link">
									Home
								</a>
                            </li> 
                            <li class="nav-item">
                                <a href="{{ route('step.book') }}" class="nav-link">
									Choose Exercises
								</a>
                            </li> 
                                @foreach($pages as $page)
                                    @if($page->type == 'header')
                                    <li class="nav-item">
                                        <a href="{{ route('page', $page->slug) }}" class="nav-link">
                                            {{ $page->title }}
                                        </a>
                                    </li> 
                                    @endif
                                @endforeach


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
                             <div class="header-menu d-none d-lg-block"> 
                            <div class="user-area dropdown float-right">
                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      @if(auth()->user()->photo == null)
                                        <img class="user-avatar rounded-circle" width="40" src="{{ asset('assets/images/admin.jpg') }}" alt="User Avatar"> 
                                    @else
                                        <img class="user-avatar rounded-circle" width="40" src="{{ url('storage'. auth()->user()->photo) }}" alt="User Avatar"> 
                                    @endif
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
            @guest
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
                                <a href="{{ route('register') }}" class="default-btn">
										Register Now
									</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endguest
        </div>
        <!-- End Others Option For Responsive -->
    </div> 