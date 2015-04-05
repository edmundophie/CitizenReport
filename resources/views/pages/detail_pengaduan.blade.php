@extends('pages.master')
@section('title')
	Tanggul Sungai Cikapundung Jebol - Citizen Report
@stop
@section('css')
	<link rel="stylesheet" href="{{ URL::asset('css/detailpengaduan.css') }}">
@stop
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{ URL::asset('index') }}">Home</a></li>
	  <li><a href="{{ URL::asset('daftar-pengaduan') }}">Daftar Pengaduan</a></li>
	  <li class="">Tanggul-Sungai-Cikapundung-Jebol</li>
	</ol>
@stop

@section('body')
	<div class="body-container">
		<div class="row list-pengaduan">
			<div class="row">
				<div class="col-sm-9">
					<h2>Tanggul Sungai Cikapundung Jebol</h2>
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
			<div class="row hidden-xs hidden-sm">
				<div class="col-sm-12"><a href="#"><span class="glyphicon glyphicon-paperclip"></span></a> Lampiran tersedia</div>
			</div>
			<div class="row hidden-md hidden-lg">
				<div class="col-xs-6"><a href="#"><span class="glyphicon glyphicon-paperclip"></span></a> Lampiran tersedia</div>
				<div class="col-xs-6 kategori"><span class="label label-primary">Infrastruktur</span></div>
			</div>
			<br>
			<div class="col-xs-12 col-sm-6 col-md-3 gambar-pengaduan"><img src="{{ URL::asset('images/tanggul.jpg') }}" class="img-responsive img-thumbnail" alt="Gambar pengaduan"></div>
			<p>Cras mattis consectetur purus sit amet fermentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia bibendum nulla sed consectetur. Curabitur blandit tempus porttitor. Maecenas faucibus mollis interdum. Nullam quis risus eget urna mollis ornare vel eu le. Maecenas faucibus mollis interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>

			<p>Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>

			<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed posuere consectetur est at lobortis. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nulla vitae elit libero, a pharetra augue. Donec sed odio dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			<hr>
			<div class="progress">
				<div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
					<span>ON PROGRESS</span>
				</div>
			</div>
		</div>

		<div class="row keterangan-status">
			<h3>Komentar</h3>
			<div class="beri-komentar">
				<div class="form-group">
					<textarea class="form-control" name="komentar" id="inputKomentar" rows="3"></textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-default col-xs-12 col-sm-3">Beri komentar</button>
				</div>
			</div>
			<div class="clearfix"></div>
			<hr>
			<div class="komentar">
				<img src="{{ URL::asset('images/avatar-dinaspu.png') }}" class="col-xs-1 img-circle" alt="dinas-pu">
				<p class="col-xs-10 bg-warning">Tanggul sedang diperbaiki dan akan memakan waktu kira-kira 30 hari kerja</p>
			</div>
			<div class="clearfix"></div>
			<div class= "komentar">
				<p class="col-xs-offset-1 col-xs-10 bg-info">Oke baik pak. Terima kasih atas konfirmasinya.</p>
				<img src="{{ URL::asset('images/avatar-emil.png') }}" class="col-xs-1 img-circle" alt="ridwan-kamil">
			</div>
		</div>
	</div>
@stop