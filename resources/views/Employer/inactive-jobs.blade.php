@extends('Employer.master')

@section('body')
    <div class="page-content-area">
        <!-- Dashboard Section -->
        <section class="section-padding dashboard-section mb-5">
            <div class="container">
				@if(Session::has('flash_message'))
					<div class="flash-alertmsg">
					   <div class="alert alert-{{ (Session::get('status')) ? Session::get('status') : 'primary' }} alert-dismissible fade show">
						  {!!html_entity_decode( Session::get('flash_message') )!!}
						  <button type="button" class="flash_alertmsg_close close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
					   </div>
				   </div>
				@endif
                <div class="row">
                    <div class="col-lg-4 mb-box">
                        <div class="dash-data-card mb-0 boxshadow-none">
                            <div class="active-job-area">
                                <div class="active-job-img">
                                    <img src="{{asset('assets')}}/images/dashboard/skill/google.svg" alt="">
                                </div>
                                @foreach($company as $val)
                                <h5>{{ $val->company_name}}</h5>
                                <p>Since : {{$val->company_year}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 mb-box">
                        <div class="active-job-list-box">
                            {{session()->get('message')}}
                            @foreach($inactive_job as $val)
                                @if(isset($data['job_status']) == 0)
                                    <div class="actjob-box">
                                        <a href="{{url('/employer-job-listing')}}/{{$val->job_slug}}" class="actjob-left">
                                            <div class="actjob-img">
                                                <img src="{{asset('assets')}}/images/dashboard/skill/google.svg" alt="">
                                            </div>
                                            <div class="actjob-detail">
                                                <h5>{{$val->job_title}}</h5>
                                                <ul class="d-block">
                                                    <li>
														<img src="{{asset('assets')}}/images/dashboard/jobs/location.svg" alt="">
														<span>{{$val->city}}, {{$val->state}}.</span>
													</li>
													<li>
														<img src="{{asset('assets')}}/images/dashboard/jobs/email.svg" alt="">
														<span>Experience :
															<?php
																if($val->experience_custom == "experience"){
																	$min_year   = floor($val->min_experience / 12);
																	$min_month  = floor($val->min_experience % 12);
																	$max_year   = floor($val->max_experience / 12);
																	$max_month  = floor($val->max_experience % 12);

																	$min_str = (($min_year) > 0) ? $min_year.' Years ': '';
																	$min_str .= (($min_month) > 0) ? $min_month.' Months' : '';
																	$max_str = (($max_year) > 0) ? $max_year.' Years ': '';
																	$max_str .= (($max_month) > 0) ? $max_month.' Months' : '';

																	$full_str = !empty($min_str) ? $min_str.' - ' : '';
																	$full_str .= (!empty($max_str)) ? $max_str : '';
																	echo $full_str;
																}else{
																	echo ucfirst($val->experience_custom);
																}
															?>
														</span>
													</li>
                                                    <li>
														<img src="{{asset('assets')}}/images/dashboard/jobs/rupee.svg" alt="">
														<span>Salary : {{$val->min_salary}}-{{$val->max_salary}} ({{$val->salary_type}})</span>
													</li>
                                                </ul>
                                            </div>
                                        </a>
                                        <div class="act-badge-button">
                                            <div class="act-actions">
                                                <a
													href="{{url('/employer-edit-post')}}/{{$val->job_slug}}"
													class="act-btn edit-act bootstrap_tooltip" title="Job Edit"
												>
													<img src="{{asset('assets')}}/images/dashboard/post/edit.svg" alt="">
												</a>
                                                <a
													href="{{url('/activate-inactive-job')}}/{{$val->job_slug}}"
													class="act-btn reshape-act successalert bootstrap_tooltip" title="Job Active"
												>
													<img src="{{asset('assets')}}/images/dashboard/post/reshape.svg" alt="">
												</a>
                                                <button
													data-id="{{$val->id}}"
													class="act-btn delete-act deletalert bootstrap_tooltip" title="Job Delete"
												><img src="{{asset('assets')}}/images/dashboard/post/delete.svg" alt=""></button>
                                            </div>
                                            <div class="act-tags">
												@php $job_type = "Full Time"; @endphp
												@if($val->job_type == 'Permanent')
													@php $job_type = "Full Time" @endphp
												@else
													@if($val->job_contractual_type)
														@php $job_type = $val->job_contractual_type; @endphp
													@else
														@php $job_type = "Part Time"; @endphp
													@endif
												@endif
                                                <div class="act-tag {{ ($job_type == 'Full Time') ? 'blue-tag' : 'yellow-tag' }}">
													{{$job_type}}
												</div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="no_inactive_jobs">No Saved Jobs Found.</div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="dash-pagination pagination-right">
                            {{$inactive_job->links('Jobs/pagination')}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection