<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="Keywords" content="">
		<meta name="Description" content="">
		<title>BookXchange</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="{{asset('web_asset/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('web_asset/assets/css/style.css')}}" rel="stylesheet">
		<link href="{{asset('web_asset/css/addbook.css')}}" rel="stylesheet">
		<link href="{{asset('web_asset/css/about.css')}}" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/d3540e9bfd.js" crossorigin="anonymous"></script>
		<!-- Owl Stylesheets -->
		<link rel="stylesheet" href="{{asset('web_asset/assets/owlcarousel/assets/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('web_asset/assets/owlcarousel/assets/owl.theme.default.min.css')}}">
	</head>
	<body>
		<!-- header -->
		<header class="siteHeaderMain">
			<div class="siteHeader">
				<div class="container">
					<div class="d-flex flex-wrap justify-content-center">
						<h1 class="site-brand pull-left d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
							<a class="navbar-brand" href="#">
								<span class="logoText">{{Config::get('constants.site_name')}}</span>
							</a>
						</h1>
						<!-- Hamburger icon -->
						<input class="side-menu" type="checkbox" id="side-menu"/>
						<label class="hamb" for="side-menu"><span class="hamb-line"></span></label>
						<!-- /Hamburger Icon -->
						<div class="mainMenu pull-right">
							<ul class="nav nav-pills menu">
								@if(session('user_id') == 0) 
								<li class="nav-item"><a href="/bookXchange/home" class="nav-link active" aria-current="page">Home</a></li>	
								<li class="nav-item"><a href="/bookXchange/about" class="nav-link">About</a></li>
								<li class="nav-item"><a href="/bookXchange/signin" class="nav-link"><i class="fa fa-lock"></i>&nbsp;&nbsp;Sign In</a></li>
								@else
								<li class="nav-item"><a href="/bookXchange/dashboard" class="nav-link active" aria-current="page">Dashboard</a></li>
								<li class="nav-item"><a href="/bookXchange/request" class="nav-link"><i class="fa fa-exchange"
                    aria-hidden="true"></i>&nbsp;&nbsp;
                  Request</a></li>
				  <li class="nav-item"><a href="/bookXchange/addbook" class="nav-link"><i class="fa fa-plus"
                    aria-hidden="true"></i>&nbsp;&nbsp;
                  Add Book</a></li>
              <li class="nav-item"><a href="/bookXchange/myaccount" class="nav-link"><i class="fa fa-user-o"></i>&nbsp;&nbsp;
                My Account</a></li>	
								
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- header -->