@extends('public_sec.home_layout')
@section('content')
    	<!-- Start Banner -->
	<div class="ulockd-home-slider">
		<div class="container-fluid">
			<div class="row">
				<div class="pogoSlider" id="js-main-slider">
					<div class="pogoSlider-slide" data-transition="fade" data-duration="1500" style="background-image: url({{asset('user_side/images/slider-01.jpg')}})" >
						<div class="lbox-caption pogoSlider-slide-element">
							<div class="lbox-details">
								<h1>Welcome to MIR LAB</h1>
								
							</div>
						</div>
					</div>
					<div class="pogoSlider-slide" data-transition="fade" data-duration="1500" style="background-image: url({{asset('user_side/images/slider-02.jpg')}})">
						<div class="lbox-caption pogoSlider-slide-element">
							<div class="lbox-details">
								<h1>We are Expert in The Field of Health Lab</h1>
							</div>
						</div>
					</div>
						
					</div>
				</div><!-- .pogoSlider -->
			</div>
		</div>
	</div>
	<!-- End Banner -->

    <!-- Start About us -->
	<div id="about" class="about-box">
		<div class="about-a1">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="title-box">
							<h2>About Us</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="row align-items-center about-main-info">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<h1> Welcome to Mir Lab </h1>
								<br><h6>Mir Clinial Lab and Healthcare has been providing quality diagnostic services in Gujrat since 1990.
									<br><br> Over the past 32 years, we have focused on the provision of innovative and high-quality pathology services, and have expanded into multiple related areas of healthcare.
									<br><br> Since our inception, we have delivered healthcare services to our patients with timely results and accurate diagnosis.
									<br><br> The lab operates 24 hours a day, every day of the year, ensuring our patients can avail our services at all times. </h6>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="about-m">
									<ul id="banner">
										<li>
											<img src="{{ asset('user_side/images/about-img-01.jpg') }}" alt="">
										</li>
										<li>
											<img src="{{ asset('user_side/images/about-img-02.jpg') }}" alt="">
										</li>
										<li>
											<img src="{{ asset('user_side/images/about-img-03.jpg') }}" alt="">
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About us -->

    <!-- Start Services -->
	<div id="services" class="services-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-box">
						<h2>Services</h2>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-12">
					<div class="owl-carousel owl-theme">
						<div class="item">
							<div class="serviceBox">
								<div class="service-icon"><i class="fa fa-h-square" aria-hidden="true"></i></div>
								<h3 class="title">TEST DETAILS</h3>
								<p class="description">
									You can View Our Available Tests Here.
								</p>
								<a href="{{ route('test.list') }}" class="new-btn-d br-2">View Test</a>
							</div>
						</div>
						<div class="item">
							<div class="serviceBox">
								<div class="service-icon"><i class="fa fa-heart" aria-hidden="true"></i></div>
								<h3 class="title">PATIENT REPORTS</h3>
								<p class="description">
									You can View Your Reports Here. 
								</p>
								<a href="{{ route('test.patient.list') }}" class="new-btn-d br-2">View Report</a>
							</div>
						</div>
						<div class="item">
							<div class="serviceBox">
								<div class="service-icon"><i class="fa fa-hospital-o" aria-hidden="true"></i></div>
								<h3 class="title">PRE-BOOKING/HOME-SAMPLING</h3>
								<p class="description">
									You Can Book Your Test Here!
								</p>
								<a href="{{ route('test.patient.book') }}" class="new-btn-d br-2">BOOK NOW</a>
							</div>
						</div>
						
						
					</div>
				</div>
			</div>			
		</div>
	</div>
	<!-- End Services -->
	
	
@endsection