@extends('pages.skpd.master')
@section('title')
	Daftar Pengaduan - Citizen Report
@stop
@section('css')
	
@stop
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{ URL::asset('index') }}">Home</a></li>
	  <li class="">Daftar Pengaduan</li>
	</ol>
@stop
@section('daftar_pengaduan_active')
	class="active"
@stop

@section('javascript')
	<script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
    	window.setTimeout(function () {
		    $(".alert-success").slideUp(500, function () {
		        $(this).remove();
		    });
		}, 9000);
    </script>
@stop

@section('body')
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/app.css">

	<div class="body-container">
		@if (Session::has('notification'))
			<div class="alert alert-success">
				<h3> Your Notification </h3>
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				
				Aduan baru yang masuk : <BR><BR>
				@foreach (Session::get('notification') as $pengaduan)
					Judul : "{{ $pengaduan->judul }}". Dikirim tanggal : {{ $pengaduan->created_at }} <BR>
				@endforeach 
	
			</div>
		@endif

		<!-- Single button -->
		<div class="text-right col-xs-12">
			<div class="btn-group">
				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					Urutkan <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><a href="{{ URL::asset('daftar-pengaduan/status')}}">Status pengaduan</a></li>
					<li><a href="{{ URL::asset('daftar-pengaduan/tanggal')}}">Tanggal</a></li>
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
		<br>
		<div class="col-xs-12">

			<!-- List pengaduan -->
			<table class="table table-striped">
				<tr>
					<th>Judul</th>
					<th>Tanggal</th>
					<th>Status</th>
				</tr>
				@foreach($listPengaduan as $pengaduan)
				@if($pengaduan->getDataAduan()['id_status']!=1 && $pengaduan->getDataAduan()['id_status']!=6)
				<tr>
					<td><a href="{{ URL::to('pengaduan/'.$pengaduan->getDataAduan()['slug']) }}">{{ $pengaduan->getDataAduan()['judul'] }}</a></td>
					<td>{{ $pengaduan->getDataAduan()['created_at'] }}</td>
					<td><span class="label label-{{ $pengaduan->getStatus()->getDataStatus()['color_code'] }}">{{ $pengaduan->getNamaStatus() }}</span></td>
				</tr>
				@endif
				@endforeach
			</table>

			<!-- Pagination -->
			<nav class="text-center">
				<ul class="pagination">
					<li>
						<a href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li>
						<a href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
@stop