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
@section('manajemen_skpd_active')
	class="active"
@stop

@section('body')
<div class="body-container">
	<div class="col-sm-6">
		<h2 class="title">Edit SKPD</h2>
		<hr style="margin-top:0">
		{!! Form::open(array('action' => 'SKPDController@update', 'class' => 'form-horizontal')) !!}
			<input type="hidden" name="id_skpd" value="{{$skpd->id_user}}">
			<div class="form-group">
				<label for="inputNama" class="col-sm-3 control-label">Nama SKPD</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="nama" id="inputNama" placeholder="Nama SKPD" value="{{$skpd->nama}}" required>
				</div>
			</div>
			<div class="form-group">
				<label for="inputAlamat" class="col-sm-3 control-label">Alamat</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="alamat" id="inputAlamat" placeholder="Alamat" value="{{$skpd->alamat}}" required>
				</div>
			</div>
			<div class="form-group">
				<label for="inputTelepon" class="col-sm-3 control-label">Telepon</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="telepon" id="inputTelepon" placeholder="Telepon" value="{{$skpd->telp	}}" required>
				</div>
			</div>
			<div class="form-group">
				<label for="inputKategori" class="col-sm-3 control-label">Kategori</label>
				<div class="col-sm-9">
					<select class="form-control" name="id_kategori" id="inputKategori">
						@foreach($listKategori as $kategori)
							@if($skpd->id_kategori==$kategori['id'])
								<option value="{{ $kategori['id'] }}" selected>{{ $kategori['nama'] }}</option>
							@else
								<option value="{{ $kategori['id'] }}">{{ $kategori['nama'] }}</option>
							@endif
						@endforeach
					</select>
				</div>
			</div>
			<br>
			<div class="form-group">
				<label for="inputUsername" class="col-sm-3 control-label">Username</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="username" id="inputUsername" placeholder="Username" value="{{$skpd->username}}" required>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword" class="col-sm-3 control-label">Password Baru</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="password" id="inputPassword" placeholder="Password" value="{{$skpd->password}}" required>
				</div>
			</div>
			<div class="form-group">
				<label for="confirmPassword" class="col-sm-3 control-label">Ulangi Password</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Konfirmasi Password" value="{{$skpd->password}}" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<button type="submit" onclick="return checkPassword()" class="btn btn-default">Edit Akun</button>
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