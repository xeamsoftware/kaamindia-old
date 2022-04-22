@extends('auth.master')
@section('body')
	<div class="page-ath-wrap page-form-left">
		<div class="page-back-btn">
			<a href="{{url('/')}}">
				<i class="feather icon-arrow-left"></i>
				<span>Back</span>
			</a>
		</div>
		<div class="page-ath-gfx">
			<a href="{{url('/')}}" class="page-ath-logo">
				<h5>Blue Collar</h5>
			</a>
			<div class="page-ath-image">
				<img src="{{ asset('assets') }}/images/auth-img/login-in-as.svg" alt="">
			</div>
		</div>
		<div class="page-ath-content">
			<div class="page-ath-form">
				<div class="page-ath-title">
					<h2>Email Address Verifed</h2>
					<div class="form-footer-link">
						<p>Email has been verifed by contimouse login <a href="{{ url('/login-as-employer-or-jobseeker') }}"> Login</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection