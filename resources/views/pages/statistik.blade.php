@extends('pages.master')
@section('title')
	Statistik - Citizen Report
@stop
@section('css')
	<link rel="stylesheet" href="css/statistik.css">
@stop
@section('javascript')
    <script type="text/javascript" src="js/raphael.js"></script>
    <script type="text/javascript" src="js/g.raphael-min.js"></script>
    <script type="text/javascript" src="js/g.bar-min.js"></script>
    <script type="text/javascript" src="js/g.dot-min.js"></script>
    <script type="text/javascript" src="js/g.line-min.js"></script>
    <script type="text/javascript" src="js/g.pie-min.js"></script>
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
        var pie = new Raphael(document.getElementById('paneldiv'), 500, 250);

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

        var line = new Raphael(document.getElementById('paneldiv2'), 500, 250);

        var x = 10;
        var y = 10;
        var xlen = 450;
        var ylen = 225;
        var gutter = 20;
        var xdata = [0, 2, 4, 6, 8, 10];
        var chrt = line.linechart(x, y, xlen, ylen, xdata,
            [
                @foreach($jumAduan->jumlah as $temp)
                    {{$temp}},
                @endforeach
            ],
        {
            gutter: gutter,
            nostroke: false,
            axis: "0 0 0 1",
            symbol: "circle",
            smooth: true
        });

        Raphael.g.axis(
            x + gutter,
            y + ylen - gutter,
            xlen - 2 * gutter, null, null,
            xdata.length - 1,
            0, [
                @foreach($jumAduan->date as $temp)
                    "{{$temp}}",
                @endforeach
            ],
            line
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

    </div>
@stop