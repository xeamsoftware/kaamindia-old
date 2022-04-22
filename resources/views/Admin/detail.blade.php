@extends('Admin.addmaster')

@section('body')
    <div class="page-content-area">
        <!-- Dashboard Section -->
        <section class="section-padding dashboard-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dash-header-flex">
                            <div class="dash-page-title">
                                <div class="page-back-btn">
                                    <a href="{{url('/jobseeker')}}">
                                        <i class="feather icon-arrow-left"></i>
                                        <span>Back</span>
                                    </a>
                                </div>
                                <h5>Job Detail</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mb-box">
                        <div class="dash-data-card h-100 mb-0">
                            <div class="jobseeker-detail">
                                <h5 class="job-detail-tile">{{$tbl_job->job_title}}</h5>
                                <div class="job-flex-data">
                                    <div class="job-flexbox">
                                        <img src="{{asset('assets')}}/images/dashboard/jobs/job-role.svg" alt="">
                                        <h6>Job Role</h6>
                                        <p>{{$tbl_job->job_role}}</p>
                                    </div>
                                    <div class="job-flexbox">
                                        <img src="{{asset('assets')}}/images/dashboard/jobs/job-type.svg" alt="">
                                        <h6>Job Type</h6>
                                        <p>{{$tbl_job->job_type}}</p>
                                    </div>
                                    <div class="job-flexbox">
                                        <img src="{{asset('assets')}}/images/dashboard/jobs/experience.svg" alt="">
                                        <h6>Experience</h6>
                                        {{--<p>{{ (@unserialize($tbl_job->min_experience) == true) ? unserialize($tbl_job->min_experience)[0] : $tbl_job->min_experience }} - {{(@unserialize($tbl_job->max_experience) == true) ? unserialize($tbl_job->max_experience)[0]  : $tbl_job->max_experience }}</p>--}}
                                        <p>{{$tbl_job->min_experience}}-{{$tbl_job->max_experience}}</p>
                                    </div>
                                    <div class="job-flexbox">
                                        <img src="{{asset('assets')}}/images/dashboard/jobs/qualification.svg" alt="">
                                        <h6>Qualification</h6>
                                        <p>{{$tbl_job->qualification}}</p>
                                    </div>
                                </div>
                                <div class="job-dtl-data">
                                    <h6>Salary :<span>{{$tbl_job->min_salary}} -{{$tbl_job->max_salary}}/-</span></h6>
                                </div>
                                <div class="job-desc">
                                    <h6>Job Description</h6>
                                    <p>{!! $tbl_job->job_desc !!}</p>
                                </div>
                                <div class="job-dtl-data">
                                    <h6>Skills :<span>{{ (@unserialize($tbl_job->skills) == true) ? implode(',',unserialize($tbl_job->skills)) : $tbl_job->skills }}</span></h6>
                                </div>
                                <div class="job-benefits">
                                    <h6>Benefits</h6>
                                    <ul>
                                        <li>{{$tbl_job->benefits}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-box">
                        <div class="dash-data-card h-100 mb-0">
                            <div class="company-detail-box">
                                <h4 class="company-detail-title">Company Detail</h4>
                                <div class="company-detail-img">
                                    <img src="{{asset('assets')}}/images/dashboard/skill/google.svg" alt="">
                                </div>
                                <h5>Google</h5>
                                <div class="company-detail-data">
                                    <div class="cmpny-data">
                                        <img src="{{asset('assets')}}/images/dashboard/jobs/location.svg" alt="">
                                        <div class="cmpny-text">
                                            <h6>Location</h6>
                                            <p>{{$tbl_job->city}},{{$tbl_job->state}}</p>
                                        </div>
                                    </div>
                                    <div class="cmpny-data">
                                        <img src="{{asset('assets')}}/images/dashboard/jobs/email.svg" alt="">
                                        <div class="cmpny-text">
                                            <h6>Email</h6>
                                            <p><a href="javascript:void(0);">{{$tbl_job->con_email}}</a></p>
                                        </div>
                                    </div>
                                    <div class="cmpny-data">
                                        <img src="{{asset('assets')}}/images/dashboard/jobs/phone.svg" alt="">
                                        <div class="cmpny-text">
                                            <h6>Phone</h6>
                                            <p><a href="javascript:void(0);">+91 {{$tbl_job->con_number}}</a></p>
                                        </div>
                                    </div>
                                    <div class="cmpny-data">
                                        <img src="{{asset('assets')}}/images/dashboard/jobs/clock.svg" alt="">
                                        <div class="cmpny-text">
                                            <h6>Job Timing</h6>
                                            <ul>
                                                @if(!empty($tbl_job->job_time))
                                                    @foreach(unserialize($tbl_job->job_time) as $key => $val)
                                                        @if(empty($val['close']))
                                                            <li><span class="day-name">{{ucfirst($key)}}</span><span> {{$val['start']}} - {{$val['end']}}</span></li>
                                                        @else
                                                            <li><span class="day-name">{{ucfirst($key)}}</span><span> Closed</span></li>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <p>Job Timing is not added yet.</p>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="apply-now-btn text-center">

                            @if(empty($applied_job))
                                <button class="default-btn applyalert" data-id="{{$tbl_job->id}}" data-userid="{{ !empty($user_id) ? $user_id : '' }}">Apply Now</button>
                            @else
                                <button class="default-btn " data-id="{{$tbl_job->id}}" data-userid="{{ !empty($user_id) ? $user_id : '' }}" disabled style="background-color: gray">Already Applied</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection