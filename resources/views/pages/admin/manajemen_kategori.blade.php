@extends('pages.admin.master')
@section('title')
	Manajemen SKPD - Citizen Report
@stop
@section('css')
@stop
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="index">Home</a></li>
	  <li class="">Manajemen SKPD</li>
	</ol>
@stop
@section('manajemen_kategori_active')
	class="active"
@stop

@section('body')
<div class="body-container">
	@if(Session::has('message'))
	<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> {{Session::get('message')}}</div>	
	@endif
	<div class="col-sm-6">
		<h2 class="title">Daftar Kategori</h2>
		<hr style="margin-top:0">
		<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th>Nama</th>		
				<th>Deskripsi</th>
				<th class="col-xs-2"></th>
			</tr>
			</thead>
			<tbody>
			@foreach($listKategori as $kategori)
			<tr>
				<td>{{$kategori->nama}}</td>
				<?php $temp = ($kategori->deskripsi=="")?"-":$kategori->deskripsi;?>
				<td>{{$temp}}</td>
				<td>
					<div class="pull-right">
					<a href="{{URL::to('delete-kategori/'.$kategori->id)}}" onclick="return confirm('Anda yakin ingin menghapus kategori ini?')"> <span class="glyphicon glyphicon-remove text-danger"> </span></a>
					</div>
				</td>
			</tr>	
			@endforeach
			</tbody>
		</table>
	</div>

	<div class="col-sm-6">
		<h2>Tambah Kategori</h2>
		<hr style="margin-top:0">
		{!! Form::open(array('action' => 'KategoriController@insert', 'class' => 'form-horizontal')) !!}
		<div class="form-group">
			<label for="inputNama" class="col-sm-3 control-label">Nama Kategori</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="nama" id="inputNama" placeholder="Nama Kategori" required>
			</div>
		</div>
		<div class="form-group">
			<label for="inputDeskripsi" class="col-sm-3 control-label">Deskripsi</label>
			<div class="col-sm-9">
				<textarea name="deskripsi" id="inputDeskripsi" class="form-control"></textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				<button type="submit" class="btn btn-default">Tambah Kategori</button>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@stop

@section('footer')
<script>
	function checkPassword() {
		var pass1 = document.getElementById('inputPassword').value;
		var pass2 = document.getElementById('confirmPassword').value;
		
		if(pass1==pass2) {
			return true;
		}
		else {
			alert('Password tidak sama');
			return false;
		}
	}
</script>
@stop