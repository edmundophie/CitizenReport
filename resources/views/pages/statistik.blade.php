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
        var canvas = new Raphael(document.getElementById('paneldiv'), 500, 250);
        canvas.setSize();

        canvas.piechart(
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

        //canvas.circle(320, 400, 180).animate({fill: "#223fa3", stroke: "#000", "stroke-width": 80, "stroke-opacity": 0.5}, 2000);
        //canvas.circle(50, 50, 20).attr({fill: "#ff0000", stroke: "#fff", "stroke-width": 2}).darker(6);
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
            <div class="panel panel-default statistik-panel" id="paneldiv">
                <h1>Distribusi Pengaduan Berdasarkan Kategori</h1>
            </div>
        </div>

    </div>
@stop