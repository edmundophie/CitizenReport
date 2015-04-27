<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>@yield('title')</title>
<!-- Bootstrap -->
<!-- <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' /> -->
<link href="{{ URL::asset('css/bootstrap-original.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ URL::asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" type="image/png" href="{{ URL::asset('images/favicon.png') }}">
<!--  webfonts  -->
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'> -->
<!-- // webfonts  -->
<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
@yield('css')

<!-- start plugins -->
<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
<!-- <script type="text/javascript" src="{{ URL::asset('js/bootstrap.js') }}"></script> -->
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
@yield('javascript')
</head>
<body>
<div class="header_bg"><!-- start header -->
	<div class="container">
		<div class="row header">
		<nav class="navbar" role="navigation">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="{{ URL::asset('index') }}"><img src="{{ URL::asset('images/logo.png') }}" alt="" class="img-responsive"/> </a>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="menu nav navbar-nav">
		        <li @yield('daftar_pengaduan_active')><a href="{{ URL::asset('daftar-pengaduan/default') }}">daftar pengaduan</a></li>
		        <li @yield('manajemen_skpd_active')><a href="{{URL::to('manajemen-skpd')}}">Manajemen SKPD</a></li>
      			<li @yield('manajemen_kategori_active')><a href="{{URL::to('manajemen-kategori')}}">Manajemen Kategori</a></li>
      		  </ul>
      		  <ul class="menu nav navbar-nav navbar-right">
		      	@if(Session::has('role'))
		      	<li id="notification-menu">
	        		<a href="#" style="padding-left:0px"><span class="glyphicon glyphicon-bell"></span></a>
        		</li> 
        		<li>
		      		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
						{{ Session::get('username')}} <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{URL::to('logout')}}">Logout</a></li>
					</ul>
        		</li>
        		@endif
        	  </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		</div>
		@yield('breadcrumb')
		@yield('slider')
	</div>
</div>
<div class="main"><!-- start main -->
<div class="container main">
	@yield('body')
</div>
</div>
<div class="footer_bg"><!-- start footre -->
	<div class="container">
		<div class="row  footer">
			<div class="col-md-3 span1_of_4">
				<h4>tentang kami</h4>
				<p>Citizen Report bertujuan untuk mengakomodasi pengaduan masyarakat Bandung dan berfungsi sebagai jembatan komunikasi antara masyarakat dan SKPD di kota Bandung. </p>
				<h5>Alamat</h5>
				<p class="top">Jl. Wastukancana No 2 Bandung</p>
				<p>Phone:(022) 4234892</p>	
			</div>
			<div class="col-md-3 span1_of_4">
				<h4>Komentar terbaru</h4>
				<span><a href="#"> Fusce scelerisque massa vitae </a></span>
				<p>25 april 2013</p>
				<span><a href="#">Pellentesque bibendum ante </a></span>
				<p>15 march 2013</p>
				<span><a href="#">Maecenas quis ipsum sed magna </a></span>
				<p>25 april 2013</p>
			</div>
			<div class="col-md-3 span1_of_4">
				<h4>respon terbaru</h4>
				<span><a href="#">It is a long established fact that a reader will looking layout.</a></span>
				<span><a href="#">There are many variations of passages of Lorem Ipsum available words.</a></span>
				<span><a href="#">It is a long established fact that a reader will looking layout.</a></span>
			</div>
			<div class="col-md-3 span1_of_4">
				<h4>statistik</h4>

				<h5>100 pengaduan sudah ditindaklanjuti</h5>
				<h5>72 pengaduan pending</h5>
				<h5>32 pengaduan sedang dikerjakan</h5>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="footer_btm"><!-- start footer_btm -->
	<div class="container">
		<div class="row  footer1">
			<div class="col-md-5">
				<div class="soc_icons">
					<ul class="list-unstyled">
						<li><a class="icon1" href="#"></a></li>
						<li><a class="icon2" href="#"></a></li>
						<li><a class="icon3" href="#"></a></li>
						<li><a class="icon4" href="#"></a></li>
						<li><a class="icon5" href="#"></a></li>
						<div class="clearfix"></div>
					</ul>	
				</div>
			</div>
			<div class="col-md-7 copy">
				<p class="link text-right"><span>&#169; All rights reserved | Design by&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></span></p>
			</div>
		</div>
	</div>
</div>
@yield('footer')
</body>
</html>