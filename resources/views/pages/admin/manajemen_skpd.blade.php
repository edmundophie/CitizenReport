@extends('pages.admin.master')
@section('title')
	asdManajemen SKPD - Citizen Report
@stop
@section('css')
@stop
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="index">Home</a></li>
	  <li class="">Manajemen SKPD</li>
	</ol>
@stop
@section('manajemen_skpd_active')
	class="active"
@stop

@section('body')
<div class="body-container">
	@if(Session::has('message'))
	<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> {{Session::get('message')}}</div>	
	@endif
	<div class="col-sm-6">
		<h2 class="title">Daftar SKPD</h2>
		<hr style="margin-top:0">
		<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th>Dinas</th>		
				<!-- <th>Kategori</th> -->
				<th class="col-xs-2"></th>
			</tr>
			</thead>
			<tbody>
			@foreach($listSKPD as $skpd)
			<tr>
				<td>{{$skpd->nama}}</td>
<!-- 				<td>{{$skpd->kategori}}</td> -->
				<td>
					<div class="pull-right">
					<a href="{{URL::to('edit-skpd/'.$skpd['id'])}}" ><span class="glyphicon glyphicon-pencil text-success"> </span></a> 
					<a href="{{URL::to('delete-skpd/'.$skpd['id'])}}" onclick="return confirm('Anda yakin ingin menghapus SKPD ini?')"> <span class="glyphicon glyphicon-remove text-danger"> </span></a>
					</div>
				</td>
			</tr>		
			@endforeach	
			</tbody>
		</table>
	</div>

	<div class="col-sm-6">
		<h2 class="title">Tambah SKPD</h2>
		<hr style="margin-top:0">
		{!! Form::open(array('action' => 'SKPDController@insert', 'class' => 'form-horizontal')) !!}
			<div class="form-group">
				<label for="inputNama" class="col-sm-3 control-label">Nama SKPD</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="nama" id="inputNama" placeholder="Nama SKPD" required>
				</div>
			</div>
			<div class="form-group">
				<label for="inputAlamat" class="col-sm-3 control-label">Alamat</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="alamat" id="inputAlamat" placeholder="Alamat" required>
				</div>
			</div>
			<div class="form-group">
				<label for="inputTelepon" class="col-sm-3 control-label">Telepon</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="telepon" id="inputTelepon" placeholder="Telepon" required>
				</div>
			</div>
			<div class="form-group">
				<label for="inputKategori" class="col-sm-3 control-label">Kategori</label>
				<div class="col-sm-9">
					<select class="form-control" name="id_kategori" id="inputKategori">
						@foreach($listKategori as $kategori)
						<option value="{{ $kategori['id'] }}">{{ $kategori['nama'] }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<br>
			<div class="form-group">
				<label for="inputUsername" class="col-sm-3 control-label">Username</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="username" id="inputUsername" placeholder="Username" required>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword" class="col-sm-3 control-label">Password</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" required>
				</div>
			</div>
			<div class="form-group">
				<label for="confirmPassword" class="col-sm-3 control-label">Ulangi Password</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Konfirmasi Password" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<button type="submit" onclick="return checkPassword()" class="btn btn-default">Buat Akun</button>
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