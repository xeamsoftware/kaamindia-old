@extends('Employer.master')
@section('body')
<div class="page-content-area">	
	<section class="section-padding dashboard-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="dash-header-flex">
						<div class="dash-page-title">
							<div class="page-back-btn">
								<a href="{{url('/active-jobs')}}">
									<i class="feather icon-arrow-left"></i>
									<span>Back</span>
								</a>
							</div>
							<h5>Candidates</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h5 class="profile-head mb-4">User Experience Design</h5>
				</div>
			</div>
			<div class="row">
				@if(count($candidate_details) > 0)
					@foreach($candidate_details as $candidate_detail)
						<div class="col-lg-4 mb-box">							
							<div class="cand-box">
								@if($candidate_detail->resume)
									<a href="{{ asset('assets') }}/resume/{{ $candidate_detail->resume }}" download class="cand-download-btn">
										<img src="{{asset('assets')}}/images/dashboard/download-resume.png" alt="">
									</a>
								@endif
								<a href="{{url('/candidate-detail')}}/{{$job_slug}}/{{$candidate_detail->user_id}}" class="cand-link-box">
									<div class="cand-img">
										@if ($candidate_detail->image)
											<img src="{{asset('assets')}}/photo/pic/{{ $candidate_detail->image }}" alt="profile_{{$candidate_detail->name}}">
										@else
											<img src="{{asset('assets')}}/images/default-user.png" alt="profile_{{$candidate_detail->name}}">
										@endif
									</div>									
									<div class="cand-detail">
										<h4>{{$candidate_detail->first_name}} {{$candidate_detail->last_name}}</h4>
										<h5>{{$candidate_detail->education}}</h5>
										<h6>Skills :<span>{{($candidate_detail->skills) ? $candidate_detail->skills : "-"}}</span></h6>
										<h6>Experience :<span>{{$candidate_detail->experience}} Year</span></h6>
									</div>
									<div class="cand-btn">
										<div class="cand-view-btn">View Details</div>
									</div>
								</a>
							</div>
						</div>
					@endforeach
				@else
					<div class="no_active_jobs">No Candidate Found.</div>
				@endif
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="dash-pagination pagination-right">
						{{$candidate_details->links('Jobs/pagination')}}
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection