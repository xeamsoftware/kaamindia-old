@extends('Employer.master')
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
								<a href="{{url('/candidate-job')}}/{{$job_slug}}">
									<i class="feather icon-arrow-left"></i>
									<span>Back</span>
								</a>
							</div>
							<h5>Candidate Details</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 mb-box">
					<div class="dash-data-card h-100 mb-0">
						<div class="profile-area">							
							<div class="profile-image">
								@if ($umage)
									<img src="{{asset('assets')}}/photo/pic/{{ $umage->image }}" alt="profile_{{$candidate_detail->name}}"class="profile-main-image" />
								@else
									<img src="{{asset('assets')}}/images/default-user.png" alt="profile_{{$candidate_detail->name}}" class="profile-main-image" />
								@endif
							</div>
							<h5>{{ $candidate_detail->first_name . ' ' . $candidate_detail->last_name }}</h5>
							<p>{{ $candidate_detail->job_profile }}</p>
						</div>
						<div class="profile-box mb-2">
							<h5 class="profile-head">Skill</h5>
							<div class="skill-tags">
								@php
									$skills = explode(',', $candidate_detail->skills);
								@endphp
								@foreach ($skills as $item)
									<div class="skilldata-tag">{{ $item }}</div>
								@endforeach
							</div>
						</div>
						@if($umage && $umage->resume)
							<div class="profile-box text-center mt-4">
								<a href="{{ asset('assets') }}/resume/{{ $umage->resume }}" download class="download-resume">
									<span>Download Resume</span><img src="public/assets/images/dashboard/download-resume.png" alt="">
								</a>
							</div>
						@endif
					</div>
				</div>				
				<div class="col-lg-8 mb-box">
					<div class="dash-data-card h-100 mb-0">
						<div class="profile-box mb-4">
							<h5 class="profile-head">Basic details</h5>
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="form-set-data">
										<div class="set-label">Mobile no</div>
										<div class="set-input">{{ $candidate_detail->mobile_number }}</div>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-set-data">
										<div class="set-label">Email ID</div>
										<div class="set-input">{{ $candidate_detail->email }}</div>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-set-data">
										<div class="set-label">Job profile</div>
										<div class="set-input">{{ $candidate_detail->job_profile }}</div>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-set-data">
										<div class="set-label">Preferred city for job</div>
										<div class="set-input">{{ $candidate_detail->job_city }}</div>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-set-data">
										<div class="set-label">Education</div>
										<div class="set-input">{{ $candidate_detail->education }}</div>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-set-data">
										<div class="set-label">Current company</div>
										<div class="set-input">{{ $candidate_detail->curlast_company }}</div>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-set-data">
										<div class="set-label">Job type</div>
										<div class="set-input">{{ $candidate_detail->job_time }}</div>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-set-data">
										<div class="set-label">Salary (per month)</div>
										<div class="set-input">{{ $candidate_detail->salary }}</div>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-set-data">
										<div class="set-label">Language</div>
										<div class="set-input">{{ $candidate_detail->language }}</div>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-set-data">
										<div class="set-label">Age</div>
										<div class="set-input">{{ $candidate_detail->age }}</div>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-set-data">
										<div class="set-label">Gender</div>
										<div class="set-input">{{ $candidate_detail->gender }}</div>
									</div>
								</div>
							</div>
						</div>
						<div class="profile-box mb-4">
							<h5 class="profile-head">ID proof details</h5>
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="form-set-data">
										<div class="set-label">ID proof number</div>
										<div class="set-input">1234567890</div>
										<div class="set-image"><img src="public/assets/images/dashboard/profile/proof.jpg" alt=""></div>
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
