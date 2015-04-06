@extends('pages.master')
@section('title')
	Daftar Pengaduan - Citizen Report
@stop
@section('css')
	<link rel="stylesheet" href="{{ URL::asset('css/daftarpengaduan.css') }}">
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
		
		<!-- Single button -->
		<div class="row pull-right">
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					Urutkan <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><a href="{{ URL::asset('daftar-pengaduan/status')}}">Status pengaduan</a></li>
					<li><a href="{{ URL::asset('daftar-pengaduan/tanggal')}}">Tanggal</a></li>
					<li><a href="{{ URL::asset('daftar-pengaduan/kategori')}}">Kategori</a></li>
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
		<br>
		@foreach($listPengaduan as $pengaduan)
            <div class="row list-pengaduan">
                <div class="row">
                    <div class="col-sm-9">
                        <h2><a href="{{ URL::asset('pengaduan/'.$pengaduan->getDataAduan()['slug']) }}">{{ $pengaduan->getDataAduan()['judul'] }}</a></h2>
                    </div>
                    <div class="col-sm-3 hidden-xs hidden-sm tanggal-pengaduan">{{ $pengaduan->getDate() }}</div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        Pelapor : <a href="#">Ridwan Kamil</a>
                    </div>
                    <div class="col-xs-6 visible-xs visible-sm tanggal-pengaduan">{{ $pengaduan->getDate() }}</div>
                    <div class="col-xs-6 kategori"><span class="hidden-xs hidden-sm label label-primary">{{ $pengaduan->getNamaKategori() }}</span></div>
                </div>
                <div class="kategori"><span class="hidden-md hidden-lg label label-primary">{{ $pengaduan->getNamaKategori() }}</span></div>
<<<<<<< HEAD
                {!! $pengaduan->getDeskripsiSingkat() !!}...<a href="detail-pengaduan/{{ $pengaduan->getDataAduan()['slug'] }}">Read more</a></p>
                <button class="btn btn-{{ $pengaduan->getStatus()->getDataStatus()['color_code']}}">{{ $pengaduan->getNamaStatus() }}</button>
=======
                {!! $pengaduan->getDeskripsiSingkat() !!}...<a href="pengaduan/{{ $pengaduan->getDataAduan()['slug'] }}">Read more</a></p>
                <button class="btn btn-warning">{{ $pengaduan->getNamaStatus() }}</button>
>>>>>>> 4b411a60801a27a3e57bfb0d14787777d5c572b1
            </div>
        @endforeach

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