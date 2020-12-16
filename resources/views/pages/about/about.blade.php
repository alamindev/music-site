@extends('layouts.app')
@section('title')
about-us
@endsection
@section('content')
    <section class="education-area-two " style="padding: 150px 0px 100px;">
       
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
            <div class="row pt-5">
                <div class="col-lg-12">
                    <p>
                        PDF Band Music is an online seller of original sheet music for instrumental ensembles. The founding members of PDF Band Music are two music teachers with zeal to promote music education in our schools. Discovering new composers and offering great music
                        online is one extension of the work these music educators do each day.
                    </p>
                    <p>
                        Sheet music from PDF Band Music is exactly the same as music purchased from normal music retailers. PDF Band music may be used for concert and contests in exactly the same way as normal printed sheet music. The two primary differences between PDF Band
                        Music and other retailer music outlets are:
                    </p>
                    <div class="listing-row">
                        <div class="img">
                            <img src="assets/img/play.svg" alt="" style="height: 20px;">
                            <h6>
                                When you purchase music from PDF Band Music you actually purchase a downloadable PDF file which is delivered to you electronically within minutes. Using this PDF file you can print multiple copies of any needed part or score. You can feel "guilt free"
                                as you stand in front of the copy machine duplicating parts and extra scores.
                            </h6>
                        </div>
                        <div class="img">
                            <img src="assets/img/play.svg" alt="" style="height: 20px;">
                            <h6>
                                The cost of PDF sheet music is dramatically lower than printed sheet music. We do not have the costs associated with printing and shipping, and we pass these savings directly to you.
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
