@extends('layouts.app')

@section('content')
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

    <!-- Start Banner Area -->

    <section class="banner-area f5f6fa-bg-color">
        <img class="banner-area-two-img" src="{{ asset('images/inner_hero_05.png') }}" alt="">

        <div class="container-fluid social">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content">
                        <h1 class="wow fadeInDown" data-wow-delay="1s">PDF Band Music</h1>
                        <h2 class="wow fadeInDown" data-wow-delay="1s">Practice and Play Along Website</h2>
                        <p class="wow fadeInUp" data-wow-delay="1s">Take your time and explore this exciting new practice tool. You will find all exercises from the Sound Fundamentals Band Method Books as well as sheet music from the PDF Band Music library. Have Fun!</p>

                        <a href="login.html" class="default-btn wow fadeInLeft" data-wow-delay="0.9s"> 
                            Login
                            
                        </a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="banner-img wow fadeInRight" data-wow-delay="1s">
                        <img src="{{ asset('images/hero.jpg') }}" alt="Image">
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Affordable Area -->
    <section class="affordable-area  pb-70" style="padding-top: 30px;">
        <div class="container">
            <div class="section-title">

                <h2>Careful Practice Creates Master Musicians</h2>

            </div>

            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-affordable one">
                        <i class="">
                            <img src="{{ asset('images/coverBook1.png') }}" alt="">
                       </i>

                        <h3>Sound Fundamentals Book 1</h3>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single-affordable two">
                        <i class="">
                            <img src="{{ asset('images/coverBook2.png') }}" alt="">
                        </i>
                        <h3>Sound Fundamentals Book 2</h3>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single-affordable one">
                        <i class="">
                            <img src="{{ asset('images/coverBook3.jpg') }}" alt="">
                       </i>

                        <h3>The Really Big Student Songbook</h3>
                    </div>
                </div>






    </section>
    <!-- End Affordable Area -->

    <!-- Start Education Area -->
    <section class="education-area-two  f5f6fa-bg-color  ptb-100 ">
        <img class="education-area-two-img" src="{{ asset('images/inner_hero_04.png') }}" alt="">

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="education-img-wrap mb-4">
                        <div>
                            <img src="{{ asset('images/about.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="education-content">
                        <!-- <span class="top-title">Education For All</span> -->
                        <h2>Sound <br> <span>Fundamentals</span></h2>

                        <p>
                            Sound Fundamentals hits all the right notes and meets all music curricular standards. The carefully crafted comprehensive method builds solid musicianship and at the same time excites students to practice throughout the year. There are also complete arrangements
                            for that important first concert.
                        </p>
                        <!-- <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <li>
                                        <i class="bx bx-check"></i> No transaction fees
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-6">
                                <ul>
                                    <li>
                                        <i class="bx bx-check"></i> No technical headaches
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection