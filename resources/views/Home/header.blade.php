<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="apple-touch-fullscreen" content="yes" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <title>Blue Collar - India’s Largest Blue Collar Job Platform</title>
        <!-- Favicon -->
        <!-- <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets') }}/images/favicon/apple-touch-icon.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets') }}/images/favicon/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets') }}/images/favicon/favicon-16x16.png" /> -->
        <link rel="manifest" href="{{ asset('assets') }}/images/favicon/site.webmanifest" />
        <link rel="mask-icon" href="{{ asset('assets') }}/images/favicon/safari-pinned-tab.svg" color="#5bbad5" />
        <meta name="msapplication-TileColor" content="#da532c" />
        <meta name="theme-color" content="#ffffff" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/animate.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/fontawesome.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/feathericon.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/owl.carousel.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/perfect-scrollbar.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/select2.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/quill-snow.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/croppie.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/style.css" />
        <script>
            var home_url = "{{ URL('/') }}";
        </script>
    </head>

    <body>
        <!-- loader -->
        <div class="preloader">
            <div class="cube-wrapper">
                <div class="cube-folding">
                    <span class="leaf1"></span>
                    <span class="leaf2"></span>
                    <span class="leaf3"></span>
                    <span class="leaf4"></span>
                </div>
                <span class="loading" data-name="Loading">Loading</span>
            </div>
        </div>

        <!-- Header -->
        <header class="header-wrapper">
            <div class="container">
                <div class="header-part">
					<div class="logo-part">
						<a href="{{ url('/') }}">
							<img src="{{asset('assets')}}/images/kaamindia-logo.png" alt="">
						</a>
					</div>
                    <div class="menu-part mr-auto">
                        <nav class="nav-bar">
                            <ul class="d-lg-flex menu-lists">
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('/about')}}">About Us</a></li>
                                <li><a href="{{url('/contact')}}">Contact Us</a></li>
                                <li><a href="{{url('/faq')}}">FAQs</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="menu-part mr-auto">
                        <nav class="nav-bar">
                            <ul class="d-lg-flex menu-lists">
                                <li class="d-lg-none"><a href="{{ url('/jobs') }}">Jobs</a></li>
                                <li class="d-lg-none"><a href="{{ url('/signup') }}">Register</a></li>
                                <li class="d-lg-none"><a href="{{ url('/login-as-employer-or-jobseeker') }}">Login</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="account-right">
                        <ul class="d-flex align-items-center">
                            <div class="login-button-group">
                                @auth
									<li class="d-none d-lg-block">
										<div class="header-btn signup-btn dropdown">
											<div class="header-profile-user" data-toggle="dropdown" data-display="static">
												<a href="javascript:void(0);">
													@if (!empty(auth()->user()->uimage) && file_exists(public_path("assets/photo/pic/". auth()->user()->uimage->image)))
													<img src="public/assets/photo/pic/{{ auth()->user()->uimage->image }}" class="profile-img" />
													@else
													<img src="{{ asset('assets') }}/images/default-user.png" alt="" class="profile-img" />
													@endif
													<span>{{ auth()->user()->user_type == 2 ? auth()->user()->first_name . ' ' . auth()->user()->last_name : auth()->user()->name }}</span>
												</a>
											</div>
											<div class="dropdown-menu">
												<div class="actions-links-data">
													<ul>
														@if (auth()->user()->user_type == 0 || auth()->user()->user_type == 1)
														<li>
															<a href="{{ url('/employerviewprofile') }}">View Profile</a>
														</li>
														@endif @if (auth()->user()->user_type == 2)
														<li>
															<a href="{{ url('/jobsviewprofile') }}">View Profile</a>
															<a href="{{ url('/jobs') }}">Jobs</a>
														</li>
														@endif
														<li>
															<form id="logout_form" action="{{ route('logout') }}" method="post">
																@csrf
																<a href="javascript:{}" onclick="document.getElementById('logout_form').submit();">Logout</a>
															</form>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</li>
								@else
									<li class="d-none d-lg-block">
										<a class="header-btn signup-btn" href="{{ url('/jobs') }}">
											<i class="fas fa-sign-in-alt mr-1"></i> <span>Jobs</span>
										</a>
										<a class="header-btn signup-btn" href="{{ url('/signup') }}">
											<i class="fas fa-sign-in-alt mr-1"></i> <span>Register</span>
										</a>
										<a class="header-btn signin-btn" href="{{ url('/login-as-employer-or-jobseeker') }}">
											<i class="fas fa-sign-in-alt mr-1"></i> <span>Login</span>
										</a>
									</li>
                                @endauth
                            </div>
                        </ul>
                    </div>
                    <div class="toggle-btn d-lg-none">
                        <a href="javascript:void(0);"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>