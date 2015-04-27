@extends('pages.master')
@section('title')
	Citizen Report 
@stop
@section('home_active')
	class="active"
@stop
@section('javascript')
	<script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
    	$('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>
@stop

@section('slider')
	<div class="row slider text-center">
		<div class="col-md-8">
			<div class="col-md-10 slider_text">
				<h2>Punya Keluhan Untuk Pemkot Bandung ?</h2>
				<h3>Didieu Tempatna</h3>
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
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/app.css">

	<div class="row grids_of_3">

				@if (Session::has('notification'))
					@if (!empty(Session::get('notification')))
						<div class="alert alert-success">
							<h3> Your Notification </h3>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							
							Maaf, pengaduan Anda dengan rincian berikut : <BR><BR>
							@foreach (Session::get('notification') as $pengaduan)
								Judul : "{{ $pengaduan->judul }}". Dikirim tanggal : {{ $pengaduan->created_at }} <BR>
							@endforeach 
							<BR>dengan berbagai pertimbangan tidak kami tindak lanjuti
				
						</div>
					@endif
				@endif

				<div class="col-md-4 grid1_of_3">
					  <h2>Adukan</h2>
					  <img src="images/icon1.png" class="img-responsive"/>
					  <p>Laporkan pengaduan, keluhan, dan saran anda untuk pemerintah kota Bandung. Instansi kami yang terkait akan segera menindaklanjutinya</p>
				     
				</div>
				<div class="col-md-4 grid1_of_3">
					<h2>Monitor</h2>
					  <img src="images/icon2.png" class="img-responsive"/>
					  <p>Anda dapat memantau perkembangan dari aduan anda dan mendapatkan keterangan langsung dari instansi yang menangani pengaduan anda.</p>
				      					
				</div>
				<div class="col-md-4 grid1_of_3">
					<h2>Terima Hasilnya</h2>
					  <img src="images/icon3.png" class="img-responsive"/>
					  <p>Instansi terkait akan menangani pengaduan anda dan anda dapat memberikan feedback serta penilaian terhadap hasil penanganannya.</p>
				     
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