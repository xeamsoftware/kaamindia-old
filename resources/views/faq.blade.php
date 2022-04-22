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
                                <h2>FAQs</h2>
                                <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print.</p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="page-heading-img">
                                <img src="{{asset('assets')}}/images/faqs/title-img.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FAQs section -->
            <section class="section-padding faq-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="faq-search-section faq-bg">
                                <div class="faq-input-box">
                                    <i class="feather icon-search faq-icon"></i>
                                    <input type="text" class="faq-input">
                                </div>
                                <button type="button" class="faq-submit">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="faq-left-card">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <img src="{{asset('assets')}}/images/faqs/job-posting.png" alt="">
                                            <h6>Job Posting</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <img src="{{asset('assets')}}/images/faqs/genral-issue.png" alt="">
                                            <h6>General Issues</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <img src="{{asset('assets')}}/images/faqs/wallet.png" alt="">
                                            <h6>Wallet</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <img src="{{asset('assets')}}/images/faqs/how-we-wrok.png" alt="">
                                            <h6>How We Work?</h6>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="faq-accordion-section" id="accordionExample">
                                <h5>Frequently Asked Questions</h5>
                                <div class="faq-qa-card">
                                    <div class="faq-qa-head" data-toggle="collapse" data-target="#faq1" aria-expanded="true">
                                        <div class="faq-btn">I can't remember mu user id and/ or password, can you reset it?</div>
                                        <div class="faq-qa-icon"><i class="feather icon-plus"></i></div>
                                    </div>
                                    <div class="faq-collapse collapse show" id="faq1">
                                        <div class="faq-qa-body">
                                            <p>Track your results on the local or global market , depending on your needs. You can track everything in the most popular search engines – Google, Bing, Yahoo and Yandex. Improve your search performance and increase traffic with our turn-key.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-qa-card">
                                    <div class="faq-qa-head" data-toggle="collapse" data-target="#faq2" aria-expanded="false">
                                        <div class="faq-btn">What are the definition of the different types of jobs?</div>
                                        <div class="faq-qa-icon"><i class="feather icon-plus"></i></div>
                                    </div>
                                    <div class="faq-collapse collapse" id="faq2">
                                        <div class="faq-qa-body">
                                            <p>Track your results on the local or global market , depending on your needs. You can track everything in the most popular search engines – Google, Bing, Yahoo and Yandex. Improve your search performance and increase traffic with our turn-key.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-qa-card">
                                    <div class="faq-qa-head" data-toggle="collapse" data-target="#faq3" aria-expanded="false">
                                        <div class="faq-btn">When can I expect to hear back from the hiring department?</div>
                                        <div class="faq-qa-icon"><i class="feather icon-plus"></i></div>
                                    </div>
                                    <div class="faq-collapse collapse" id="faq3">
                                        <div class="faq-qa-body">
                                            <p>Track your results on the local or global market , depending on your needs. You can track everything in the most popular search engines – Google, Bing, Yahoo and Yandex. Improve your search performance and increase traffic with our turn-key.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-qa-card">
                                    <div class="faq-qa-head" data-toggle="collapse" data-target="#faq4" aria-expanded="false">
                                        <div class="faq-btn">How do I create an account?</div>
                                        <div class="faq-qa-icon"><i class="feather icon-plus"></i></div>
                                    </div>
                                    <div class="faq-collapse collapse" id="faq4">
                                        <div class="faq-qa-body">
                                            <p>Track your results on the local or global market , depending on your needs. You can track everything in the most popular search engines – Google, Bing, Yahoo and Yandex. Improve your search performance and increase traffic with our turn-key.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-qa-card">
                                    <div class="faq-qa-head" data-toggle="collapse" data-target="#faq5" aria-expanded="false">
                                        <div class="faq-btn">I can't remember my user id and/ or password, can you reset it?</div>
                                        <div class="faq-qa-icon"><i class="feather icon-plus"></i></div>
                                    </div>
                                    <div class="faq-collapse collapse" id="faq5">
                                        <div class="faq-qa-body">
                                            <p>Track your results on the local or global market , depending on your needs. You can track everything in the most popular search engines – Google, Bing, Yahoo and Yandex. Improve your search performance and increase traffic with our turn-key.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-qa-card">
                                    <div class="faq-qa-head" data-toggle="collapse" data-target="#faq6" aria-expanded="false">
                                        <div class="faq-btn">I am having trouble with the online process, is there an alternative method to apply?</div>
                                        <div class="faq-qa-icon"><i class="feather icon-plus"></i></div>
                                    </div>
                                    <div class="faq-collapse collapse" id="faq6">
                                        <div class="faq-qa-body">
                                            <p>Track your results on the local or global market , depending on your needs. You can track everything in the most popular search engines – Google, Bing, Yahoo and Yandex. Improve your search performance and increase traffic with our turn-key.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-qa-card">
                                    <div class="faq-qa-head" data-toggle="collapse" data-target="#faq7" aria-expanded="false">
                                        <div class="faq-btn">What are the definition of the different types of jobs?</div>
                                        <div class="faq-qa-icon"><i class="feather icon-plus"></i></div>
                                    </div>
                                    <div class="faq-collapse collapse" id="faq7">
                                        <div class="faq-qa-body">
                                            <p>Track your results on the local or global market , depending on your needs. You can track everything in the most popular search engines – Google, Bing, Yahoo and Yandex. Improve your search performance and increase traffic with our turn-key.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-qa-card">
                                    <div class="faq-qa-head" data-toggle="collapse" data-target="#faq8" aria-expanded="false">
                                        <div class="faq-btn">My does my CV / Resume fail to upload?</div>
                                        <div class="faq-qa-icon"><i class="feather icon-plus"></i></div>
                                    </div>
                                    <div class="faq-collapse collapse" id="faq8">
                                        <div class="faq-qa-body">
                                            <p>Track your results on the local or global market , depending on your needs. You can track everything in the most popular search engines – Google, Bing, Yahoo and Yandex. Improve your search performance and increase traffic with our turn-key.</p>
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