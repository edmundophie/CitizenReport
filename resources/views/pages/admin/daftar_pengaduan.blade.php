@extends('pages.admin.master')
@section('title')
	Daftar Pengaduan - Citizen Report
@stop
@section('css')
	<link rel="stylesheet" href="{{ URL::asset('css/admin-daftarpengaduan.css') }}">
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

@section('body')
	<div class="body-container">
		@if(Session::has('message'))
			@if(Session::get('message')=="FORWARDED")
				<div class="alert alert-success" role="alert"><strong>Sudah diteruskan!</strong>  Pengaduan berhasil diteruskan ke SKPD.</div>	
			@elseif(Session::get('message')=="REJECTED")
				<div class="alert alert-success" role="alert"><strong>Sudah ditolak!</strong>  Pengaduan telah ditolak.</div>	
			@elseif(Session::get('message')=="DELETED")
				<div class="alert alert-success" role="alert"><strong>Sudah dihapus!</strong>  Pengaduan berhasil dihapus dari database.</div>	
			@endif
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
					<li><a href="{{ URL::asset('daftar-pengaduan/kategori')}}">Unvalidated</a></li>
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
		<br>
		<div class="list-group col-xs-3">
<!-- <div id="search-box">
	    <div class="input-group">

	      <input type="text" class="form-control" placeholder="Alamat...">
	      <div class="input-group-btn">
	        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Cari IMB <span class="caret"></span></button>
	        <ul class="dropdown-menu dropdown-menu-right" role="menu">
	          <li><a href="#">Cari Ijin Parkir</a></li>
	        </ul>
	      </div>
	    </div>
	</div>
			<br>-->
			<a href="{{ URL::to('/daftar-pengaduan/default') }}" class="list-group-item">Semua </a>
			@foreach($listKategori as $kategori)
			<a href="{{ URL::to('/daftar-pengaduan/kategori/'.$kategori['id']) }}" class="list-group-item"><span class="badge">{{ $kategori->count }}</span>  {{ $kategori->nama }}</a>
			@endforeach
		</div>
		<div class="col-xs-9">
			@if(count($listPengaduan)>0)
			<!-- List pengaduan -->
			<table class="table table-striped">
				<tr>
					<th>Judul</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
				@foreach($listPengaduan as $pengaduan)
				<tr>
					<td><a href="{{ URL::to('pengaduan/'.$pengaduan->getDataAduan()['slug']) }}">{{ $pengaduan->getDataAduan()['judul'] }}</a></td>
					<td>{{ $pengaduan->getDataAduan()['created_at'] }}</td>
					<td><span class="label label-{{ $pengaduan->getStatus()->getDataStatus()['color_code'] }}">{{ $pengaduan->getNamaStatus() }}</span></td>
					<td>
						<div class="dropdown">
							<button class="btn btn-sm btn-block btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
							Aksi
							<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
								@if($pengaduan->getDataAduan()['id_status']==1)
								<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ URL::to('pengaduan/'.$pengaduan->getDataAduan()['slug'].'/forward') }}"><span class="glyphicon glyphicon-share-alt"></span> Forward</a></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ URL::to('pengaduan/'.$pengaduan->getDataAduan()['slug'].'/reject') }}" onclick="return confirm('Anda yakin ingin menolak pengaduan ini?')"><span class="glyphicon glyphicon-ban-circle"></span> Reject</a></li>
								@endif
								<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ URL::to('pengaduan/'.$pengaduan->getDataAduan()['slug'].'/delete') }}" onclick="return confirm('Anda yakin ingin menghapus pengaduan ini?')"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
							</ul>
						</div>
					</td>
				</tr>
				@endforeach
			</table>
			@else
				<div class="alert alert-success" role="alert"><strong>Daftar Pengaduan Kosong!</strong> Belum ada pengaduan yang dibuat.</div>	
        	@endif

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