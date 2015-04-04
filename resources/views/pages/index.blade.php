@extends('pages.master')
@section('title')
	Citizen Report 
@stop
@section('home_active')
	class="active"
@stop

@section('slider')
	<div class="row slider text-center">
		<div class="col-md-8">
			<div class="col-md-10 slider_text">
				<h2>Punya Keluhan Untuk Pemkot Bandung ?</h2>
				<h3>Disini Tempatnya</h3>
			</div>
		</div>
		<div class="col-md-4">
			<div class="slider_img">
				<img src="images/pic1.png" alt="" class="img-responsive"/>
			</div>
		</div>
	</div>
@stop

@section('body')
<div class="row grids_of_3">
				<div class="col-md-4 grid1_of_3">
					  <h2>Statistik</h2>
					  <img src="images/icon1.png" class="img-responsive"/>
					  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				     <div class="rd_more1">
						<a href="single-page.html"><button class="btn_style">lebih lanjut</button></a>
					</div>					
				</div>
				<div class="col-md-4 grid1_of_3">
					<h2>Social Media</h2>
					  <img src="images/icon2.png" class="img-responsive"/>
					  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				      <div class="rd_more1">
						<a href="single-page.html"><button class="btn_style">lebih lanjut</button></a>
					</div>					
				</div>
				<div class="col-md-4 grid1_of_3">
					<h2>Trending</h2>
					  <img src="images/icon3.png" class="img-responsive"/>
					  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				     <div class="rd_more1">
						<a href="single-page.html"><button class="btn_style">lebih lanjut</button></a>
					</div>	
				</div>
			    <div class="clearfix"></div>
	</div>
	<div class="row grids_btm top">
		<div class="col-md-6">
			<div class="grid_list">
				<div class="images_1_of_1">
					<p>27</p>
				</div>
				<div class="grid_1_of_1">
					  	<h3>Pembuatan paspor di kantor imigrasi lamban</h3>
						<p>Cum sociis natoque penatibus et dis parturient montes, nascetur ridiculus mus. Cras mattis purus sit amet...<span class="hide">sed do eiusmod tempor incididunt magna aliqua...</span> </p>	   
	 			</div>
	 			 <div class="clearfix"></div>
			</div>
			</div>
			<div class="col-md-6">
				<div class="grid_list">
				<div class="images_1_of_1">
					<p>24</p>
				</div>
					<div class="grid_1_of_1">
					  	<h3>Pembuatan E-KTP tak kunjung selesai di kantor camat Coblong</h3>
						<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Vestibulum id ligula porta felis euismod semper...<span class="hide">sed do eiusmod tempor incididunt magna aliqua.</span> </p>   
	 				</div>
				</div>
				 <div class="clearfix"></div>
			</div>
	</div>
	<div class="row grids_btm top">
		<div class="col-md-6">
			<div class="grid_list">
				<div class="images_1_of_1">
					<p>19</p>
				</div>
				<div class="grid_1_of_1">
					  	<h3>Banyak calo saat mengurus pajak reklame di kantor pajak</h3>
						<p>Nullam quis risus eget urna mollis ornare vel eu leo. Nulla vitae elit libero, a pharetra augue...<span class="hide">sed do eiusmod tempor incididunt magna aliqua.</span> </p>	   
	 			</div>
	 			 <div class="clearfix"></div>
			</div>
			</div>
			<div class="col-md-6">
				<div class="grid_list">
				<div class="images_1_of_1">
					<p>15</p>
				</div>
					<div class="grid_1_of_1">
					  	<h3>Parkir liar kendaraan di sepanjang jalan dago</h3>
						<p>Morbi risus, porta ac consectetur ac, vestibulum at eros. Nullam quis risus eget urna mollis ornare vel eu leo...<span class="hide">sed do eiusmod tempor incididunt magna aliqua...</span> </p>   
	 				</div>
				</div>
				 <div class="clearfix"></div>
			</div>
	</div>
@stop