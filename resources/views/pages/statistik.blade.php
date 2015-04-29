@extends('pages.master')
@section('title')
	Statistik - Citizen Report
@stop
@section('css')
	<link rel="stylesheet" href="{{ URL::asset('css/statistik.css') }}">
@stop
@section('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/raphael.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/g.raphael-min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/g.bar-min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/g.dot-min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/g.line-min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/g.pie-min.js') }}"></script>
@stop
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="index">Home</a></li>
	  <li class="">Statistik</li>
	</ol>
@stop
@section('statistik_active')
	class="active"
@stop

<script>
    window.onload = function(){
        var pie = new Raphael(document.getElementById('paneldiv'), '100%', 250);

        pie.piechart(
            100,
            120,
            100,
            [
                @foreach($kategori->jumlah as $temp)
                    {{$temp}},
                @endforeach
            ],
            {legend: [
                @foreach($kategori->kategori as $temp)
                    "{{$temp}}",
                @endforeach
            ]}
        );

        var line = new Raphael(document.getElementById('paneldiv2'), '100%', 250);

        var linex = 10;
        var liney = 10;
        var linexlen = 450;
        var lineylen = 225;
        var linegutter = 20;
        var linexdata = [0, 2, 4, 6, 8, 10];
        var chrt = line.linechart(linex, liney, linexlen, lineylen, linexdata,
            [
                @foreach($jumAduan->jumlah as $temp)
                    {{$temp}},
                @endforeach
            ],
        {
            gutter: linegutter,
            nostroke: false,
            axis: "0 0 0 1",
            symbol: "circle",
            smooth: false
        });

        Raphael.g.axis(
            linex + linegutter,
            liney + lineylen - linegutter,
            linexlen - 2 * linegutter, null, null,
            linexdata.length - 1,
            0, [
                @foreach($jumAduan->date as $temp)
                    "{{$temp}}",
                @endforeach
            ],
            line
        );

        var bar = Raphael(document.getElementById('paneldiv3'), '100%', 400);
        var bardata = new Array();
        var data1 = [
                        @foreach($jumAduan->jumlah as $temp)
                            {{$temp}},
                        @endforeach
                    ];
        var data2 = [
                        @foreach($jumAduanClosed->jumlah as $temp)
                            {{$temp}},
                        @endforeach
                    ];
        bardata[0] = data1;
        bardata[1] = data2;

        var txtAttr = { font: "12px 'Fontin Sans', Fontin-Sans, sans-serif" };

        var barchart = bar.barchart(10, 10, 1000, 300, bardata, {gutter: 30, vgutter: 30, smooth: false, legend: ['a','b']});

        var x, y;
        for (i = 0; i < data1.length; i++) {
            x = barchart.bars[0][i].x;
            y = barchart.bars[0][i].y;
            bar.label(x, y, barchart.bars[0][i].value);
        }

        for (i = 0; i < data2.length; i++) {
            x = barchart.bars[1][i].x;
            y = barchart.bars[1][i].y;
            bar.label(x, y, barchart.bars[1][i].value);
        }

        bar.label(450, 350, 'jumlah pengaduan').attr({fill: "#2f69bf"});
        bar.text(450, 350, 'jumlah pengaduan').attr(txtAttr);
        bar.label(650, 350, 'jumlah pengaduan yang ditindaklanjuti').attr({fill: "#a2bf2f"});
        bar.text(650, 350, 'jumlah pengaduan yang ditindaklanjuti').attr(txtAttr);

        Raphael.g.axis(30, 300, 960, null, null, data1.length - 1,0,
                    [
                        @foreach($jumAduan->date as $temp)
                            "{{$temp}}",
                        @endforeach
                    ],
                    bar
        );
    };
</script>

@section('body')

    <div class="body-container">

        <div class="col-sm-6">
            <div class="panel panel-default statistik-panel" id="paneldiv">
                <h1>Distribusi Pengaduan Berdasarkan Kategori</h1>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="panel panel-default statistik-panel" id="paneldiv2">
                <h1>Jumlah Pengaduan Per Bulan</h1>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="row pull-left kategori">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Kategori <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::asset('statistik/') }}">Semua</a></li>
                        @foreach($listKategori as $kategori)
                            <li><a href="{{ URL::asset('statistik/'.$kategori['id']) }}">{{ $kategori['nama'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="panel panel-default statistik-panel" id="paneldiv3">

            </div>
        </div>
    </div>
@stop