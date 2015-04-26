@extends('pages.skpd.master')
@section('title')
    {{ $pengaduan->getDataAduan()['judul'] }} - Citizen Report
@stop
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/detailpengaduan.css') }}">
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css"> -->
@stop
@section('javascript')
    <!--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>-->
@stop
@section('breadcrumb')
    <ol class="breadcrumb">
      <li><a href="{{ URL::asset('index') }}">Home</a></li>
      <li><a href="{{ URL::asset('daftar-pengaduan') }}">Daftar Pengaduan</a></li>
      <li class="">{{ $pengaduan->getDataAduan()['judul'] }}</li>
    </ol>
@stop

@section('body')

    <div class="body-container">
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
                <div class="col-sm-6">
                    <a href="{{URL::asset('pengaduan-lampiran/'.$pengaduan->getDataAduan()['lampiran'])}}"><span class="glyphicon glyphicon-paperclip"></span></a> Lampiran tersedia
                    @if($pengaduan->getDataAduan()['laporan'] != "NULL")
                    | <a href="{{URL::asset('pengaduan-lampiran/'.$pengaduan->getDataAduan()['laporan'])}}"><span class="glyphicon glyphicon-file"></span></a> Laporan tersedia
                    @endif
                </div>
            </div>
            @elseif($pengaduan->getDataAduan()['laporan'] != "NULL")
            <div class="row hidden-xs hidden-sm">
                <div class="col-sm-6">
                    <a href="{{URL::asset('pengaduan-laporan/'.$pengaduan->getDataAduan()['laporan'])}}"><span class="glyphicon glyphicon-file"></span></a> Laporan tersedia
                </div>
            </div>
            @endif

            <div class="row hidden-md hidden-lg">
                @if($pengaduan->getDataAduan()['lampiran'] != "NULL")
                <div class="col-xs-6">
                    <a href="{{URL::asset('pengaduan-lampiran/'.$pengaduan->getDataAduan()['lampiran'])}}"><span class="glyphicon glyphicon-paperclip"></span></a>
                    @if($pengaduan->getDataAduan()['laporan'] != "NULL")
                    | <a href="{{URL::asset('pengaduan-laporan/'.$pengaduan->getDataAduan()['laporan'])}}"><span class="glyphicon glyphicon-file"></span></a>
                    @endif
                </div>
                <div class="col-xs-6 kategori"><span class="label label-primary">{{ $pengaduan->getNamaKategori() }}</span></div>
                @elseif($pengaduan->getDataAduan()['laporan'] != "NULL")
                    <a href="{{URL::asset('pengaduan-laporan/'.$pengaduan->getDataAduan()['laporan'])}}"><span class="glyphicon glyphicon-file"></span></a>
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
            <div class="clearfix"></div>
            <hr>
            <div class="progress">
                <div class="progress-bar progress-bar-{{ $pengaduan->getStatus()->getDataStatus()['color_code'] }} progress-bar-striped" role="progressbar" aria-valuenow="{{ $pengaduan->getProgress() }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $pengaduan->getProgress() }}%">
                    <span>{{ $pengaduan->getNamaStatus() }}</span>
                </div>
            </div>

            {!! Form::open(array('url' => 'pengaduan/upload-laporan', 'method' => 'post', 'files' => 'true')) !!}
                <div class="input-group col-xs-12 col-sm-6">
                <input type="hidden" name="slug" value="{{ $pengaduan->getDataAduan()['slug'] }}">
                <input type="hidden" name="kategori" value="{{ $pengaduan->getDataAduan()['id_kategori'] }}">
                    <input type="file" class="form-control" name="laporan">
                    <span class="input-group-btn">
                        <button class="btn btn-default" style="height:34px" type="submit" >Upload Laporan</button>
                    </span>
                </div><!-- /input-group -->
            {!! Form::close() !!}

        </div>

        @if($pengaduan->getDataAduan()['id_status'] != 5)
        <div class="row status-pengerjaan">
            <h3 style="margin-top:0;margin-bottom:0;">Status</h3>
            <hr style="margin-top:0">
            @if($pengaduan->getDataAduan()['id_status']==2 || $pengaduan->getDataAduan()['id_status']==3)
            {!! Form::open(array('url' => 'pengaduan/update-status', 'method' => 'post', 'class' => 'form-inline')) !!}
                <select name="status" id="" class="form-control">
                    @if($pengaduan->getDataAduan()['id_status'] == 2)
                    <option value="3">On Progress</option>
                    <option value="4">Finished</option>
                    @else@if($pengaduan->getDataAduan()['id_status'] == 3)
                    <option value="4">Finished</option>
                    @endif
                </select>
                <div class="input-group col-xs-12 col-sm-6">
                    <input type="hidden" name="slug" value="{{ $pengaduan->getDataAduan()['slug'] }}">
                    <input type="text" class="form-control" name="komentar_status" placeholder="Komentar terkait status pengerjaan...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" style="height:34px" type="submit" >Update Status</button>
                    </span>
                </div><!-- /input-group -->
            {!! Form::close() !!}
            @else
            <div class="alert alert-success" style="margin-bottom:0">
                <h3 style="display:inline"><span class="label label-success">FINISHED</span></h3>
                Menunggu konfirmasi pelapor...
            </div>
            @endif
        </div>
        @endif

        <div class="row keterangan-status">
            <h3>Komentar</h3>
            <hr style="margin-top:0">
            @if($pengaduan->getDataAduan()['id_skpd']==Session::get('id_user'))
            <div class="beri-komentar">
            {!! Form::open(array('url' => 'komentar/insert', 'method' => 'post')) !!}
                <input type="hidden" name="id_pengaduan" value="{{$pengaduan->getDataAduan()['id']}}">
                <input type="hidden" name="slug" value="{{ $pengaduan->getDataAduan()['slug'] }}">
                <div class="form-group">
                    <textarea class="form-control" name="komentar" id="inputKomentar" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default col-xs-12 col-sm-3">Beri komentar</button>
                </div>
            {!! Form::close() !!}
            </div>
            <div class="clearfix"></div>
            @endif
            @foreach($listKomentar as $komentar)
                <hr>
                @if($komentar->is_skpd)
                    <div class="komentar">
                        <img src="{{ URL::asset('avatar/'.$komentar->avatar) }}" class="col-xs-1 img-circle" alt="dinas-pu">
                        <p class="col-xs-10 bg-info">{{ $komentar->komentar }}</p>
                    </div>
                @else
                    <div class= "komentar">
                        <p class="col-xs-offset-1 col-xs-10 bg-warning">{{ $komentar->komentar }}</p>
                        <img src="{{ URL::asset('avatar/'.$komentar->avatar) }}" class="col-xs-1 img-circle" alt="ridwan-kamil">
                    </div>
                @endif
                <div class="clearfix"></div>
            @endforeach
        </div>
    </div>


     <script>
 //    $(document).ready(function() {
 //        $('.body-container')
 //            .find('[name="status"]')
 //                .selectpicker()
 //                .change(function(e) {
 //                    $('.body-container').formValidation('revalidateField', 'status');
 //                })
 //                .end()
 //            .formValidation({
 //                framework: 'bootstrap',
 //                excluded: ':disabled',
 //                icon: {
 //                    valid: 'glyphicon glyphicon-ok',
 //                    invalid: 'glyphicon glyphicon-remove',
 //                    validating: 'glyphicon glyphicon-refresh'
 //                },
 //                fields: {
 //                    status: {
 //                        validators: {
 //                            notEmpty: {
 //                                message: 'Please select status.'
 //                            }
 //                        }
 //                    }
 //                }
 //            });
 //    });
 //    </script>
@stop