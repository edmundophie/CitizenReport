@extends('pages.admin.master')
@section('title')
	{{ $pengaduan->getDataAduan()['judul'] }} - Citizen Report
@stop
@section('css')
	<link rel="stylesheet" href="{{ URL::asset('css/detailpengaduan.css') }}">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css">
@stop
@section('javascript')
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>
@stop
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{ URL::asset('index') }}">Home</a></li>
	  <li><a href="{{ URL::asset('daftar-pengaduan/default') }}">Daftar Pengaduan</a></li>
	  <li class="">{{ $pengaduan->getDataAduan()['judul'] }}</li>
	</ol>
@stop

@section('body')

	<div class="body-container">
		@if(Session::get('message')=="PENGADUAN TERKIRIM")
		<div class="alert alert-success" role="alert"><strong>Pengaduan terkirim!</strong> Pengaduan berhasil dikirim ke SKPD terkait.</div>	
		@endif
		@if(Session::get('message')=="HASIL VERIFIKASI ADA")
		<div class="alert alert-success" role="alert"><strong>Data ditemukan!</strong> Silahkan cek hasil verifikasi di bawah ini.</div>	
		@endif
		@if(Session::get('message')=="HASIL VERIFIKASI TIDAK ADA")
		<div class="alert alert-danger" role="alert"><strong>Data tidak ditemukan!</strong> Mohon maaf data tidak ditemukan.</div>	
		@endif
		<div class="row list-pengaduan">
			<div class="row">
				<div class="col-sm-9">
					<h2>{{ $pengaduan->getDataAduan()['judul'] }}</h2>
				</div>
				<div class="col-sm-3 hidden-xs hidden-sm tanggal-pengaduan">{{ $pengaduan->getDataAduan()['created_at'] }}</div>
			</div>

			<div class="row">
				<div class="col-xs-6">
					Pelapor : <a href="#">Ridwan Kamil</a>
				</div>
				<div class="col-xs-6 visible-xs visible-sm tanggal-pengaduan">{{ $pengaduan->getDataAduan()['created_at'] }}</div>
				<div class="col-xs-6 kategori"><span class="hidden-xs hidden-sm label label-primary">{{ $pengaduan->getNamaKategori() }}</span></div>
			</div>
			@if($pengaduan->getDataAduan()['lampiran'] != "NULL")
			<div class="row hidden-xs hidden-sm">
				<div class="col-sm-12"><a href="#"><span class="glyphicon glyphicon-paperclip"></span></a> Lampiran tersedia</div>
			</div>
			@endif
			<div class="row hidden-md hidden-lg">
				@if($pengaduan->getDataAduan()['lampiran'] != "NULL")
				<div class="col-xs-6"><a href="#"><span class="glyphicon glyphicon-paperclip"></span></a> Lampiran tersedia</div>
				<div class="col-xs-6 kategori"><span class="label label-primary">{{ $pengaduan->getNamaKategori() }}</span></div>
				@else
				<div class="col-xs-12 kategori"><span class="label label-primary">{{ $pengaduan->getNamaKategori() }}</span></div>
				@endif
			</div>

			<br>
			@if($pengaduan->getDataAduan()['gambar']!="NULL")
			<div class="col-xs-12 col-sm-6 col-md-3 gambar-pengaduan"><img src="{{ URL::asset('pengaduan-gambar/'.$pengaduan->getDataAduan()['gambar']) }}" class="img-responsive img-thumbnail" alt="Gambar pengaduan"></div>
			@endif
			{!! $pengaduan->getDataAduan()['deskripsi'] !!}
			<hr>
			<div class="progress">
				<div class="progress-bar progress-bar-{{ $pengaduan->getStatus()->getDataStatus()['color_code'] }} progress-bar-striped" role="progressbar" aria-valuenow="{{ $pengaduan->getProgress() }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $pengaduan->getProgress() }}%">
					<span>{{ $pengaduan->getNamaStatus() }}</span>
				</div>
			</div>
			<a href="{{ URL::to('pengaduan/'.$pengaduan->getDataAduan()['slug'].'/delete') }}" onclick="return confirm('Anda yakin ingin menghapus pengaduan ini?')" class="btn btn-danger col-xs-12 col-sm-3 col-md-2" style="margin-right:5px"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
			@if($pengaduan->getNamaStatus()=="Pending")
			<a href="{{ URL::to('pengaduan/'.$pengaduan->getDataAduan()['slug'].'/kirim') }}" onclick="return confirm('Anda yakin ingin meneruskan pengaduan ke SKPD terkait?')" class="btn btn-success col-xs-12 col-sm-3 col-md-2" style="margin-right:5px"><span class="glyphicon glyphicon-send"></span> Kirim ke SKPD</a>
				@if(($pengaduan->getNamaKategori()=="Tata Ruang dan Bangunan") ||($pengaduan->getNamaKategori()=="Transportasi/Perhubungan"))
				{!! Form::open(array('url' => 'pengaduan/verifikasi', 'method' => 'post')) !!}
				<div class="input-group col-xs-12 col-sm-6 col-md-6" style="padding-right:15px; padding-left:15px">
				    <input type="hidden" name="slug" value="{{ $pengaduan->getDataAduan()['slug'] }}">
				    <input type="text" class="form-control" style="height:38px" placeholder="Cari Alamat..." name="alamat" required>
				    <div class="input-group-btn">
				    @if($pengaduan->getNamaKategori()=="Tata Ruang dan Bangunan")
				    <button type="submit" class="btn btn-primary" >Verifikasi IMB</button>
				    @endif
				    @if($pengaduan->getNamaKategori()=="Transportasi/Perhubungan")
				    <button type="submit" class="btn btn-primary" >Verifikasi Parkir</button>
				    @endif
				    </div><!-- /btn-group -->
				</div><!-- /input-group -->
				{!! Form::close() !!}
				@endif
			@endif		
		</div>
		@if(Session::get('message')=="HASIL VERIFIKASI ADA")
		<?php $listIMB = Session::get('hasil'); ?>
		<div class="row hasil-verifikasi">
			<h3>Hasil Verifikasi</h3>
			<hr style="margin-top:0">
			<table class="table table-striped">
				<tr>
					<th>Pemegang Hak</th>
					<th>Tanggal</th>
					<th>Lokasi</th>
					<th>Kategori</th>
				</tr>
				@foreach($listIMB as $IMB)
				<tr>
					<td>{{ $listIMB['pemeganghak'] }}</td>
					<td>{{ $listIMB['updated_at'] }}</td>
					<td>{{ $listIMB['lokasi'] }}</td>
					<td>{{ $listIMB['kategori'] }}</td>
				</tr>
				@endforeach
			</table>
		</div>
		@endif
		<div class="row keterangan-status">
			<h3>Komentar</h3>
			<hr style="margin-top:0">
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


	<script>
    $(document).ready(function() {
        $('.body-container')
            .find('[name="status"]')
                .selectpicker()
                .change(function(e) {
                    $('.body-container').formValidation('revalidateField', 'status');
                })
                .end()
            .formValidation({
                framework: 'bootstrap',
                excluded: ':disabled',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    status: {
                        validators: {
                            notEmpty: {
                                message: 'Please select status.'
                            }
                        }
                    }
                }
            });
    });
    </script>
@stop