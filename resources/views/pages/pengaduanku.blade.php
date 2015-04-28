@extends('pages.master')
@section('title')
	Pengaduanku - Citizen Report
@stop
@section('css')
	
@stop
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{ URL::asset('index') }}">Home</a></li>
	  <li class="">Pengaduanku</li>
	</ol>
@stop

@section('body')
	<div class="body-container">
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