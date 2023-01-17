<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>MIR LABORATARY</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('user_side/css/bootstrap.min.css') }}">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="{{ asset('user_side/css/pogo-slider.min.css') }}">
	<!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('user_side/css/style.css') }}">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('user_side/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('user_side/css/custom.css') }}">

<link rel="stylesheet" href="{{ asset('user_side/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('user_side/css/dataTables.bootstrap4.min.css') }}">
<link href="{{ asset('user_side/css/select2.min.css') }}" rel="stylesheet" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

	<!-- LOADER -->
     <!-- <div id="preloader">
		<div class="loader">
			<img src="images/preloader.gif" alt="" />
		</div>
    </div>end loader -->
    <!-- END LOADER -->
	
	<!-- Start header -->
	<header class="top-header">
		<nav class="navbar header-nav navbar-expand-lg">
            <div class="container">
				<a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('user_side/images/logo.png') }}" alt="image"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
					<span></span>
					<span></span>
					<span></span>
				</button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link " href="http://127.0.0.1:8000">Home</a></li>
                        <li><a class="nav-link" href="http://127.0.0.1:8000#about">About Us</a></li>
                        <li><a class="nav-link" href="http://127.0.0.1:8000#services">Services For Patients</a></li>
                    </ul>
                </div>
            </div>
        </nav>
	</header>
	<!-- End header -->
	@yield('content')
	
	
<!-- Start Contact -->
<div id="contact" class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xs-12">
					<div class="left-contact">
						<h2>Address</h2>
						<div class="media cont-line">
							<div class="media-left icon-b">
								<i class="fa fa-location-arrow" aria-hidden="true"></i>
							</div>
							<div class="media-body dit-right">
								<h4>Address</h4>
								<p>Near Service More,G.t Road,Gujrat</p>
							</div>
						</div>
						<div class="media cont-line">
							<div class="media-left icon-b">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="media-body dit-right">
								<h4>Email</h4>
								<a href="#">MIR-LAB@gmail.com</a><br>
							</div>
						</div>
						<div class="media cont-line">
							<div class="media-left icon-b">
								<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
							</div>
							<div class="media-body dit-right">
								<h4>Phone Number</h4>
								<a href="#">0317-0048705</a><br>
							</div>
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
	<!-- End Contact -->
	
	<!-- Start Footer -->
	<footer class="footer-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p class="footer-company-name">All Rights Reserved. &copy; 2022 <a href="#">MIR Lab</a> </p>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="scroll-to-top" class="new-btn-d br-2"><i class="fa fa-angle-up"></i></a>

	<!-- ALL JS FILES -->
	<script src="{{ asset('user_side/js/jquery.min.js') }}"></script>
	<script src="{{ asset('user_side/js/popper.min.js') }}"></script>
	<script src="{{ asset('user_side/js/bootstrap.min.js') }}"></script>
    <!-- ALL PLUGINS -->
	<script src="{{ asset('user_side/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('user_side/js/jquery.pogo-slider.min.js') }}"></script> 
	<script src="{{ asset('user_side/js/slider-index.js') }}"></script>
	<script src="{{ asset('user_side/js/smoothscroll.js') }}"></script>
	<script src="{{ asset('user_side/js/TweenMax.min.js') }}"></script>
	<script src="{{ asset('user_side/js/main.js') }}"></script>
	<script src="{{ asset('user_side/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('user_side/js/images-loded.min.js') }}"></script>	
    <script src="{{ asset('user_side/js/custom.js') }}"></script>

	<script src="{{ asset('user_side/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('user_side/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('user_side/js/select2.min.js') }}"></script>

	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		} );
		$(document).ready(function() {
		$('.test-multiple').select2();
	});
	</script>
</body>
</html>