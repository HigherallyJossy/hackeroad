
<!DOCTYPE html>
<!-- saved from url=(0022) -->
<html lang="en">
<head>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="keywords" content="hackeroad">
	<meta name="author" content="Artemova">
	<meta content='hackeroad' name='description'>
	
	<meta content='hackeroad' name='twitter:card'>
	<meta content='hackeroad' name='twitter:site'>
	<meta content='hackeroad' property='og:title'>
	<meta content='hackeroad' property='og:description'>	
	<meta content='' property='og:url'>

	<title>Hackeroad</title>
	
	<link href="{{ asset('assets/css/bootstrap4.min.css') }}" rel="stylesheet">		
	<link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/hexasync.css') }}" rel="stylesheet">
	<style>
		form{text-align: center;}
	</style>
</head>
<body id="page-top">
	<header class="bg-main bg-primary text-white">
		<div id="particles-js">
			<canvas class="particles-js-canvas-el" width="1282" height="944" style="width: 100%; height: 100%;"></canvas>
		</div>
		<nav class="navbar osahan-navbar navbar-expand-lg navbar-dark" id="mainNav">
			<div class="container">
				<a class="navbar-brand js-scroll-trigger" href="/">
				<img src="{{ asset('assets/imge/logo.jpg') }}" style="height:60px;" lt="">
				</a>
				
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="/">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger active" href="#service">Our Service</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="#download">Featured</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="#support">Support</a>
						</li>
					</ul>
				</div>
				<a class="btn btn-danger" href="#plan">Get Started</a>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
		</nav>
		<section class="banner-block pb-0" id="banner">
			<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					@if(!empty(session('success')))
						<div class="alert alert-success alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Success!</strong> {{ session('success') }}
						</div>
					@elseif(!empty(session('error')))
						<div class="alert alert-success alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Error!</strong> {{ session('error') }}
						</div>
					@endif
				</div>
				
				<div class="col-md-12 text-center">
					<h1 class="text-white">Hackeroad</h1>
					
					<p class="lead mb-5 text-white"></p>
					
					<p class="mb-0"><a href="#download" class="btn btn-outline-light">Get Hackeroad</a></p>
					<h2 class="text-white mt-5"><strong>Enjoy unrestricted access worldwide</strong></h2>
					
				</div>
			</div>
			</div>
		</section>
		<div class="effectiv">
			<img class="svg" src="http://huanjingvpn.com/img/bg.svg" alt="">
		</div>
	</header>

	<section class="features-block" id="service">
		<div class="container">
			<div class="section-title text-center">
				<h2>OUR SERVICE</h2>
				<span class="section-title-line"></span>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="features-item text-center">
						<h5 class="mb-4">Modifications and Termination of Service</h5>
						<p>Hackeroad app shall not be liable (either expressly or impliedly) to you or to any third party in damages, compensation, costs or otherwise under any written law, common law or legal theory for the change in the prices listed.</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="features-item text-center">
						<h5 class="mb-4">General Power-Leveling Terms of Service</h5>
						<p>Should there be any unsatisfactory issues, you are welcomed to talk to us and Hackeroad app will work our best to fix it to your satisfaction. All issues should be addressed to us within a 24 hours time frame from the date and time of delivery else all delivered orders will be deem as accepted with complete satisfaction.</p>
						
					</div>
				</div>
				<div class="col-md-4">
					<div class="features-item text-center">
						<h5 class="mb-4">24/7 support</h5>
						<p>You are welcomed to leave positive or negative remarks as Hackeroad app always strive to provide the best service to our customers. Your Satisfaction is Our Motivation.</p>
						<p>Get help in seconds instead of days.</p>
						<p>Ask us a question by email and chat!</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="bg-primary" id="download">
		<div class="section-title text-center">
			<h2 class="text-white">Featured Images</h2>
			<span class="section-title-line"></span>
		</div>
		<div class="container">

		
 
			<div class="row" style="text-align: center">
				<div class="col-md-4" id="win_download">
					<div class="system_logo">
					<img src="{{ asset('assets/imge/image2.jpg') }}" style="margin-bottom:20px;" alt="">
					</div>					
				</div>
				<div class="col-md-4" id="linux_download">
					<div class="system_logo">
						<img src="{{ asset('assets/imge/image1.jpg') }}" style="margin-bottom:20px;" alt="">
					</div>					
				</div>
				<div class="col-md-4" id="android_download">
					<div class="system_logo">
						<img src="{{ asset('assets/imge/image3.jpg') }}" style="margin-bottom:20px;" alt="">
					</div>					
				</div>
			</div>
		</div>
	</section>
	<section class="testimonials-block" id="plan">
		<div class="container">
			
				
			<div class="text-center">
				<h2>Choose your Hackeroad plan</h2>
				<br>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<form action="{{ route('paymentlist') }}" method="post">
						@csrf
						<input type="hidden" value="45" name="price">							
						<button type="submit" class="pricing_item" data="0">
						<img src="{{ asset('assets/imge/btn45.png') }}" style="width:200px;" alt="">													
						</button>
					</form>
						
				</div>
				<div class="col-sm-4">
					<form action="{{ route('paymentlist') }}" method="post">
						@csrf
						<input type="hidden" value="200" name="price">							
						<button type="submit" class="pricing_item" data="0">
							<img src="{{ asset('assets/imge/btn200.png') }}" style="width:200px;" alt="">				
						</button>
					</form>					
				</div>
				<div class="col-sm-4">
					<form action="{{ route('paymentlist') }}" method="post">
						@csrf
						<input type="hidden" value="300" name="price">							
						<button type="submit" class="pricing_item" data="0">
							<img src="{{ asset('assets/imge/btn300.png') }}" style="width:200px;" alt="">			
						</button>
					</form>
				</div>
			</div>	
			
		</div>
	</section>
	<section class="bg-primary" id="support">
		<div class="section-title text-center">
			<h2 class="text-white">How to contact Hackeroad Support</h2>
		</div>
		<div class="row" style="text-align: center">

			<div class="col-12 text-white">
					<i class="fa fa-envelope"></i> Send an email: <a class="text-warning" href="mailto: support@huanjingvpn.com">support@hackeroad.com</a>
			</div>
		</div>
	</section>
	

	<footer class="py-5 text-center ">
		<div class="container">
			<h5 class="text-white mt-0 mb-0">© 2020 Haceroad. All rights reserved.</h5>
		</div>
	</footer>
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>	
	<script src="{{ asset('assets/js/wow.min.js') }}"></script>	
	<script src="{{ asset('assets/js/custom.js') }}"></script>
	
</body>
</html>