<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PMB - UkIP</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Health Care Medical Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Novena HTML Template v1.0">
  
  <!-- theme meta -->
  <meta name="theme-name" content="novena" />

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.png" />

  <!-- 
  Essential stylesheets
  =====================================-->
  <link rel="stylesheet" href="{{asset('assets/v1/plugins/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/v1/plugins/icofont/icofont.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/v1/plugins/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="v{{asset('assets/v1/plugins/slick-carousel/slick/slick-theme.css')}}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('assets/v1/css/style.css')}}">

</head>

<body id="top">

<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@gmail.com"><i class="icofont-support-faq mr-2"></i>supportpmbukip@gmail.com</a></li>
						
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:+23-345-67890">
							<span>Call Now : </span>
							<span class="h4">0823-4565-13456</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">
                    <img src="{{asset('assets/v1/images/logo.png')}}" alt="" class="img-fluid" style="width: 40px;height: 40px">
                  <span>PMB UKIP</span>
			</a>

			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
				aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icofont-navigation-menu"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarmain">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="about.html">Jalur Seleksi</a></li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="department.html" id="dropdown02" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Informasi <i class="icofont-thin-down"></i></a>
						<ul class="dropdown-menu" aria-labelledby="dropdown02">
							<li><a class="dropdown-item" href="department.html">Program Studi</a></li>
							<li><a class="dropdown-item" href="department-single.html">Pengumuman</a></li>
							<li><a class="dropdown-item" href="department-single.html">Informasi pendaftaran</a></li>
						</ul>
					</li>
					@auth
					<li class="nav-item"><a class="nav-link" href="/dashboard/{{auth()->user()->id}}">Dashboard</a></li>
					@endauth
					@guest
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
					@endguest
				</ul>
			</div>
		</div>
	</nav>
</header>