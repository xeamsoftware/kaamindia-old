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
                                <h2>Contact Us</h2>
                                <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea.</p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="page-heading-img">
                                <img src="{{asset('assets')}}/images/contact-us/title-img.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact section -->
            <section class="section-padding contact-section mt-5 pb-4">
                <div class="banner-pattern pattern2 horizontal-pattern">
                    <img src="{{asset('assets')}}/images/banner-pattern.svg" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="contact-data-box">
                                <div class="contact-head">
                                    <h5>Contact Detail</h5>
                                </div>
                                <div class="support-list">
                                    <div class="support-list-box box-green">
                                        <div class="support-icon">
                                            <img src="{{asset('assets')}}/images/contact-us/location.png" alt="">
                                        </div>
                                        <div class="support-text">
                                            <h4>Address</h4>
                                            <p>52, Sector 48, Viram nagarPune, Maharashtra</p>
                                        </div>
                                    </div>
                                    <div class="support-list-box box-blue">
                                        <div class="support-icon">
                                            <img src="{{asset('assets')}}/images/contact-us/mobile.png" alt="">
                                        </div>
                                        <div class="support-text">
                                            <h4>Phone</h4>
                                            <p><a href="tel:+91 12345 67890">+91 12345 67890 ,</a><a href="tel:+91 99999 00000">+91 99999 00000</a></p>
                                        </div>
                                    </div>
                                    <div class="support-list-box box-red">
                                        <div class="support-icon">
                                            <img src="{{asset('assets')}}/images/contact-us/email.png" alt="">
                                        </div>
                                        <div class="support-text">
                                            <h4>Email</h4>
                                            <p><a href="mailto:yourmail@gmail.com">yourmail@gmail.com</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-data-box">
                                <div class="contact-head">
                                    <h5>Social Connect</h5>
                                </div>
                                <div class="contact-social">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0);" class="fb-btn"><img src="{{asset('assets')}}/images/contact-us/fb.png" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="twi-btn"><img src="{{asset('assets')}}/images/contact-us/twitter.png" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="lin-btn"><img src="{{asset('assets')}}/images/contact-us/linkedin.png" alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 contact-shape">
                            <div class="contact-form-card">
                                <h5>Drop message here</h5>
                                <form action="javascript:void(0);" class="contact-form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="contact-input-box">
                                                    <input type="text" class="contact-control" placeholder="Name">
                                                    <div class="cnt-icon">
                                                        <img src="{{asset('assets')}}/images/contact-us/name.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="contact-input-box">
                                                    <input type="text" class="contact-control" placeholder="Email">
                                                    <div class="cnt-icon">
                                                        <img src="{{asset('assets')}}/images/contact-us/email.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="contact-input-box">
                                                    <input type="text" class="contact-control" placeholder="Subject">
                                                    <div class="cnt-icon">
                                                        <img src="{{asset('assets')}}/images/contact-us/subject.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="contact-input-box">
                                                    <textarea rows="5" class="contact-control" placeholder="Type your message"></textarea>
                                                    <div class="cnt-icon">
                                                        <img src="{{asset('assets')}}/images/contact-us/type-message.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="contact-btn">
                                                <input type="submit" class="contact-submit" value="Send Message" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>

            <!-- map section -->
            <section class="section-padding pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="map-data-box">
                                <div class="contact-head">
                                    <h5>Location</h5>
                                </div>
                                <div class="map-area">
                                    <div id="mappart" class="contact-map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </div>

@endsection