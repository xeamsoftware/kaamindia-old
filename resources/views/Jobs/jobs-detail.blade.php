@extends('Jobs.master') @section('body')
<div class="page-content-area">
    <!-- Dashboard Section -->
    <section class="section-padding dashboard-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dash-header-flex">
                        <div class="dash-page-title">
                            <div class="page-back-btn">
                                <a href="{{url('/jobs')}}">
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
                                    <img src="{{asset('assets')}}/images/dashboard/jobs/job-role.svg" alt="" />
                                    <h6>Job Role</h6>
                                    <p>{{$tbl_job->job_role}}</p>
                                </div>
                                <div class="job-flexbox">
                                    <img src="{{asset('assets')}}/images/dashboard/jobs/job-type.svg" alt="" />
                                    <h6>Job Type</h6>
                                    <p>{{$tbl_job->job_type}}</p>
                                </div>
                                <div class="job-flexbox">
                                    <img src="{{asset('assets')}}/images/dashboard/jobs/experience.svg" alt="" />
                                    <h6>Experience</h6>
                                    <p>
										<?php
											if($tbl_job->experience_custom == "fresher"){
												echo $tbl_job->experience_custom;
											}else{
												$min_year = floor($tbl_job->min_experience / 12);
												$min_month = floor($tbl_job->min_experience % 12);
												$max_year = floor($tbl_job->max_experience / 12);
												$max_month = floor($tbl_job->max_experience % 12);
												$min_str = (($min_year) > 0) ? $min_year.' Years ': '';
												$min_str .= (($min_month) > 0) ? $min_month.' Months' : '';
												$max_str = (($max_year) > 0) ? $max_year.' Years ': '';
												$max_str .= (($max_month) > 0) ? $max_month.' Months' : '';
												$full_str = !empty($min_str) ? $min_str.' - ' : '';
												$full_str .= (!empty($max_str)) ? $max_str : '';
												echo $full_str;
											}
										?>
                                    </p>
                                </div>
                                <div class="job-flexbox">
                                    <img src="{{asset('assets')}}/images/dashboard/jobs/qualification.svg" alt="" />
                                    <h6>Qualification</h6>
                                    <p>{{$tbl_job->qualification}}</p>
                                </div>
                            </div>
                            <div class="job-dtl-data">
                                <div class="row">
                                    <div class="col-md-4 text-left">
                                        <h6>Salary :<span>{{$tbl_job->min_salary}} -{{$tbl_job->max_salary}}/-</span></h6>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <h6>No. Of Openings: <span>{{$tbl_job->company_opening}}</span></h6>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <h6>Work From Home :<span class="home-value">{{$tbl_job->work_home}}</span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="job-dtl-data">
                                <h6>Gender :<span>{{$tbl_job->gender}}</span></h6>
                            </div>
                            <div class="job-dtl-data">
                                <h6>Skills :<span>{{ (@unserialize($tbl_job->skills) == true) ? implode(',',unserialize($tbl_job->skills)) : $tbl_job->skills }}</span></h6>
                            </div>
                            <div class="job-desc">
                                <h6>Job Description</h6>
                                <p>{!! $tbl_job->job_desc !!}</p>
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
                                <img src="{{asset('assets')}}/images/dashboard/skill/google.svg" alt="" />
                            </div>
                            <h5>{{$tbl_job->company_name}}</h5>
                            <div class="company-detail-data">
                                <div class="cmpny-data">
                                    <img src="{{asset('assets')}}/images/dashboard/jobs/location.svg" alt="" />
                                    <div class="cmpny-text">
                                        <h6>Location</h6>
                                        <p>{{$tbl_job->city}},{{$tbl_job->state}}</p>
                                    </div>
                                </div>
								@if($tbl_job->job_contact_information_type == "job_contactperson_info")
									<div class="cmpny-data">
										<img src="{{asset('assets')}}/images/dashboard/jobs/email.svg" alt="">
										<div class="cmpny-text">
											<h6>Name</h6>
											<p><a href="javascript:void(0);">{{$tbl_job->con_name}}</a></p>
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
								@else
									<div class="cmpny-data">
										<img src="{{asset('assets')}}/images/dashboard/jobs/email.svg" alt="">
										<div class="cmpny-text">
											<h6>Name</h6>
											<p><a href="javascript:void(0);">{{$company_personal_info->name}}</a></p>
										</div>
									</div>
									<div class="cmpny-data">
										<img src="{{asset('assets')}}/images/dashboard/jobs/email.svg" alt="">
										<div class="cmpny-text">
											<h6>Email</h6>
											<p><a href="javascript:void(0);">{{$company_personal_info->email}}</a></p>
										</div>
									</div>
									<div class="cmpny-data">
										<img src="{{asset('assets')}}/images/dashboard/jobs/phone.svg" alt="">
										<div class="cmpny-text">
											<h6>Phone</h6>
											<p><a href="javascript:void(0);">+91 {{$company_personal_info->mobile_number}}</a></p>
										</div>
									</div>
								@endif
                                <div class="cmpny-data">
                                    <img src="{{asset('assets')}}/images/dashboard/jobs/clock.svg" alt="" />
                                    <div class="cmpny-text">
                                        <h6>Job Timing</h6>
                                        @if($tbl_job->company_job_days =='Monday to Friday')
                                        <ul>
                                            <li>Monday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Tuesday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Wednesday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Thursday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Friday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Saturday : Close</li>
                                            <li>Sunday : Close</li>
                                        </ul>

                                        @elseif($tbl_job->company_job_days =='Monday to Saturday')

                                        <ul>
                                            <li>Monday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Tuesday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Wednesday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Thursday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Friday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Saturday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Sunday : Close</li>
                                        </ul>

                                        @else($tbl_job->company_job_days =='Monday to Sunday')

                                        <ul>
                                            <li>Monday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Tuesday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Wednesday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Thursday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Friday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Saturday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                            <li>Sunday : {{$tbl_job->job_time_start}} - {{$tbl_job->job_time_end}}</li>
                                        </ul>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			@auth
				@if(auth()->user()->user_type == 2)
					<div class="row">
						<div class="col-md-12">
							<div class="apply-now-btn text-center">
								@if(empty($applied_job))
									<button
										class="default-btn applyalert"
										data-id="{{$tbl_job->id}}"
										data-userid="{{ !empty($user_id) ? $user_id : '' }}"
										data-login-url="{{url('/job-login')}}"
									>Apply Now</button>
								@else
								<button class="default-btn" data-id="{{$tbl_job->id}}" data-userid="{{ !empty($user_id) ? $user_id : '' }}" disabled style="background-color: gray;">
									Already Applied
								</button>
								@endif
							</div>
						</div>
					</div>
				@endif
			@endauth
        </div>
    </section>
</div>
@endsection