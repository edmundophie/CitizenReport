@extends('pages.master')
@section('title')
	Daftar Pengaduan - Citizen Report
@stop
@section('css')
	<link rel="stylesheet" href="css/daftarpengaduan.css">
@stop
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="index">Home</a></li>
	  <li class="">Daftar Pengaduan</li>
	</ol>
@stop
@section('daftar_pengaduan_active')
	class="active"
@stop

@section('body')
	<div class="body-container">
		
		<div class="row pull-right">
			<select class="form-control" name="sortby" id="pilSorting">
				<option value="" selected disabled>Urutkan berdasarkan</option>
				<option value="">Status pengaduan</option>
				<option value="">Tanggal</option>
				<option value="">Kategori</option>
			</select>
		</div>
		<div class="clearfix"></div>
		<br>
		<div class="row list-pengaduan">
			<div class="row">
				<div class="col-sm-9">
					<h2><a href="#">Tanggul Sungai Cikapundung Jebol</a></h2>
				</div>
				<div class="col-sm-3 hidden-xs hidden-sm tanggal-pengaduan">19 Desember 2014</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					Pelapor : <a href="#">Ridwan Kamil</a>
				</div>
				<div class="col-xs-6 visible-xs visible-sm tanggal-pengaduan">19 Desember 2014</div>
				<div class="col-xs-6 kategori"><span class="hidden-xs hidden-sm label label-primary">Infrastruktur</span></div>
			</div>
			<div class="kategori"><span class="hidden-md hidden-lg label label-primary">Infrastruktur</span></div>
			<p>Cras mattis consectetur purus sit amet fermentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia bibendum nulla sed consectetur. Curabitur blandit tempus porttitor. Maecenas faucibus mollis interdum. Nullam quis risus eget urna mollis ornare vel eu le...<a href="#">Read more</a></p>
			<button class="btn btn-warning">On Progress</button>
		</div>
		
		<div class="row list-pengaduan">
			<div class="row">
				<div class="col-sm-9">
					<h2><a href="#">Banyak Taik Kuda di Depan Kampus ITB Ganesha</a></h2>
				</div>
				<div class="col-sm-3 hidden-xs hidden-sm tanggal-pengaduan">2 April 2015</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					Pelapor : <a href="#">Prof. Akhmaloka</a>
				</div>
				<div class="col-xs-6 visible-xs visible-sm tanggal-pengaduan">2 April 2015</div>
				<div class="col-xs-6 kategori"><span class="hidden-xs hidden-sm label label-primary">Kebersihan</span></div>
			</div>
			<div class="kategori"><span class="hidden-md hidden-lg label label-primary">Kebersihan</span></div>
			<p>Cras mattis consectetur purus sit amet fermentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia bibendum nulla sed consectetur. Curabitur blandit tempus porttitor. Maecenas faucibus mollis interdum. Nullam quis risus eget urna mollis ornare vel eu le...<a href="#">Read more</a></p>
			<button class="btn btn-default">Pending</button>
		</div>

		<div class="row list-pengaduan">
			<div class="row">
				<div class="col-sm-9">
					<h2><a href="#">Monyet Kabur dari Kebun Binatang ke Kampus ITB</a></h2>
				</div>
				<div class="col-sm-3 hidden-xs hidden-sm tanggal-pengaduan">12 Februari 2015</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					Pelapor : <a href="#">Jokowi</a>
				</div>
				<div class="col-xs-6 visible-xs visible-sm tanggal-pengaduan">12 Februari 2015</div>
				<div class="col-xs-6 kategori"><span class="hidden-xs hidden-sm label label-primary">Umum</span></div>
			</div>
			<div class="kategori"><span class="hidden-md hidden-lg label label-primary">Umum</span></div>
			<p>Cras mattis consectetur purus sit amet fermentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia bibendum nulla sed consectetur. Curabitur blandit tempus porttitor. Maecenas faucibus mollis interdum. Nullam quis risus eget urna mollis ornare vel eu le...<a href="#">Read more</a></p>
			<button class="btn btn-success">Handled</button>
		</div>

		<!-- Pagination -->
		<nav>
			<ul class="pager">
				<li>
					<a href="#" aria-label="Previous">
						<span aria-hidden="true">Previous</span>
					</a>
				</li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li>
					<a href="#" aria-label="Next">
						<span aria-hidden="true">Next</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
@stop