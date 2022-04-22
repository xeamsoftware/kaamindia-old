@extends('Home.master')

@section('body')

<div class="page-content-area">

            <!-- Page Section -->
            <section class="section-padding page-title-section pb-0">
                <div class="banner-pattern pattern1">
                    <img src="{{asset('assets')}}/images/banner-pattern.svg" alt="">
                </div>
                <div class="banner-pattern pattern2 horizontal-pattern">
                    <img src="{{asset('assets')}}/images/banner-pattern.svg" alt="">
                </div>
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-6">
                            <div class="page-title-box">
                                <h2>About Us</h2>
                                <p>Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="page-heading-img">
                                <img src="{{asset('assets')}}/images/about-us/title-img.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            
            <!-- About Section -->
            <section class="section-padding about-section">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-5 col-lg-6">
                            <div class="about-img">
                                <img src="{{asset('assets')}}/images/about-us/about-us.png" alt="">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="about-text-box">
                                <h4>About Us The Blue Collar</h4>
                                <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text</p>
                                <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text</p>
                                <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Mission Section -->
            <section class="section-padding pt-0">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 mb-box">
                            <div class="mission-box blue-box">
                                <div class="mission-icon-bg">
                                    <div class="mission-icon">
                                        <img src="{{asset('assets')}}/images/about-us/why-choose-icon.svg" alt="">
                                    </div>
                                </div>
                                <div class="mission-text">
                                    <h5>Why Choose<span>Us.</span></h5>
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-box">
                            <div class="mission-box red-box">
                                <div class="mission-icon-bg">
                                    <div class="mission-icon">
                                        <img src="{{asset('assets')}}/images/about-us/our-mission-icon.svg" alt="">
                                    </div>
                                </div>
                                <div class="mission-text">
                                    <h5>Our<span>Mission.</span></h5>
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-box">
                            <div class="mission-box green-box">
                                <div class="mission-icon-bg">
                                    <div class="mission-icon">
                                        <img src="{{asset('assets')}}/images/about-us/what-we-do.svg" alt="">
                                    </div>
                                </div>
                                <div class="mission-text">
                                    <h5>What We<span>Do.</span></h5>
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Browse-Section -->
            <section class="section-padding browse-section">
                <div class="container">
                    <div class="row flex-row-reverse align-items-center justify-content-between">
                        <div class="col-lg-5">
                            <div class="browse-img-box">
                                <img src="{{asset('assets')}}/images/browse-img.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="browse-box">
                                <h4>7,000+ Browse Jobs</h4>
                                <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum.</p>
                                <a href="/employer-login" class="default-btn white-btn">Sign in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Client Section -->
            <section class="section-padding">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <div class="section-title">
                                <h2>Our Clients</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam etmetus effici turac fringilla lorem facilisis.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mt-5">
                            <div class="client-data-slider owl-carousel owl-theme" id="client-slider">
                                <div class="client-box">
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('assets')}}/images/client-logos/google.svg" alt="">
                                    </a>
                                </div>
                                <div class="client-box">
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('assets')}}/images/client-logos/yahoo.svg" alt="">
                                    </a>
                                </div>
                                <div class="client-box">
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('assets')}}/images/client-logos/flipkart.svg" alt="">
                                    </a>
                                </div>
                                <div class="client-box">
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('assets')}}/images/client-logos/amazon.svg" alt="">
                                    </a>
                                </div>
                                <div class="client-box">
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('assets')}}/images/client-logos/youtube.svg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Testimonial Section -->
            <section class="section-padding testimonial-section">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-6">
                            <div class="testi-heading">
                                <h2>What our client says about us</h2>
                            </div>
                        </div>
                    </div>
                    <div class="testi-main-content">
                        <div class="testimonial-slider owl-carousel owl-theme" id="testimonial-slider">
                            <div class="testi-slide">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-xl-6 col-lg-5">
                                        <div class="testi-user-box">
                                            <div class="testi-img">
                                                <div class="testi-bg-box"></div>
                                                <img src="{{asset('assets')}}/images/testimonial/user1.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="testi-detail-box">
                                            <div class="testi-icon testi-icon1">
                                                <img src="{{asset('assets')}}/images/testimonial/quote-left.svg" alt="">
                                            </div>
                                            <div class="testi-users-text">
                                                <h5>Joncy Roy</h5>
                                                <h6>UI / UX Designer</h6>
                                                <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum.</p>
                                            </div>
                                            <div class="testi-icon testi-icon2">
                                                <img src="{{asset('assets')}}/images/testimonial/quote-right.svg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testi-slide">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-xl-6 col-lg-5">
                                        <div class="testi-user-box">
                                            <div class="testi-img">
                                                <div class="testi-bg-box"></div>
                                                <img src="{{asset('assets')}}/images/testimonial/user1.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="testi-detail-box">
                                            <div class="testi-icon testi-icon1">
                                                <img src="{{asset('assets')}}/images/testimonial/quote-left.svg" alt="">
                                            </div>
                                            <div class="testi-users-text">
                                                <h5>Joncy Roy</h5>
                                                <h6>UI / UX Designer</h6>
                                                <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum.</p>
                                            </div>
                                            <div class="testi-icon testi-icon2">
                                                <img src="{{asset('assets')}}/images/testimonial/quote-right.svg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testi-slide">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-xl-6 col-lg-5">
                                        <div class="testi-user-box">
                                            <div class="testi-img">
                                                <div class="testi-bg-box"></div>
                                                <img src="{{asset('assets')}}/images/testimonial/user1.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="testi-detail-box">
                                            <div class="testi-icon testi-icon1">
                                                <img src="{{asset('assets')}}/images/testimonial/quote-left.svg" alt="">
                                            </div>
                                            <div class="testi-users-text">
                                                <h5>Joncy Roy</h5>
                                                <h6>UI / UX Designer</h6>
                                                <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum.</p>
                                            </div>
                                            <div class="testi-icon testi-icon2">
                                                <img src="{{asset('assets')}}/images/testimonial/quote-right.svg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

@endsection