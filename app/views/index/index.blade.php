@extends('layout.index')
@section('header')
	<!-- Header Carousel -->
	<header>
		<div class="intro-header">
			<div class="container">

				<div class="row">
					<div class="col-lg-12">
						<div class="intro-message">
							<h1 style="color: #009688;">ServerList <span style="color: #4CAF50;">Por</span><span style="color: #ffeb3b;">t</span><span style="color: #F44336;">ugal</span></h1>
							<h3><span style="color: #2196F3;">Os Melhores Servidores Tugas Num Unico Sitio</span></h3>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container -->

		</div>
		<!-- /.intro-header -->
	</header>
@stop
@section('body')
<?php
	$status = new mcservers();
	$response = $status->getStatus('mc.portugalfunmaps.org', 25565);
	if(!$response) {
		echo"The Server is offline!";
	} else {
		echo"<img width=\"64\" height=\"64\" src=\"".$response['favicon']."\" /> <br>
		The Server ".$response['hostname']." is running on ".$response['version']." and is online,
		currently are ".$response['players']." players online
		of a maximum of ".$response['maxplayers'].". The motd of the server is '".$response['motd']."'. 
		The server has a ping of ".$response['ping']." milliseconds.<br><br>";
		var_dump($response);
	}
	
?>
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4><i class="fa fa-fw fa-check"></i> 100% Português</h4>
					</div>
					<div class="panel-body">
						<p>Feito por portugueses para os portugueses.</p>
						<a href="#" class="btn btn-info">Forum</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4><i class="fa fa-fw fa-gift"></i> Launcher Proprio</h4>
					</div>
					<div class="panel-body">
						<p>Não tens o Minecraft comprado? <br>Podes agora utilizar o nosso launcher para Minecraft original e crackeado.</p>
						<a href="#" class="btn btn-info">Sabe Mais Aqui</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4><i class="fa fa-fw fa-compass"></i> Os Melhores Servidores Tugas</h4>
					</div>
					<div class="panel-body">
						<p>Aqui encontras os melhores servidores tugas em varias plataformas</p>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->

		<!-- Portfolio Section -->
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Servidores Disponiveis</h2>
			</div>
			<div class="col-md-4 col-sm-6">
				<a href="portfolio-item.html">
					<h4><center>Minecraft</center></h4>
					<img class="img-responsive img-portfolio img-hover" src="{{ URL::to('/resources/images/website/minecraft-thumbnail.jpg') }}" alt="">
				</a>
			</div>
			<div class="col-md-4 col-sm-6">
				<a href="portfolio-item.html">
					<h4><center>Counter-Strike: Global Offensive</center></h4>
					<img class="img-responsive img-portfolio img-hover" src="{{ URL::to('/resources/images/website/csgo-thumbnail.jpg') }}" alt="">
				</a>
			</div>
		</div>
		<!-- /.row -->

		<br>

		<!-- Features Section -->
		<div class="row">
			<div class="col-md-6">
				<h2 class="page-header">Descobre O Nosso Launcher Para Minecraft</h2>
				<p>O Nosso Launcher Conta Atualmente Com As Seguintes Funcionalidades:</p>
				<ul>
					<li>Suporte para Minecraft original e pirata</li>
					<li>Suporte para as versões mais populares do Minecraft</li>
					<li>Entre Outras...</li>
				</ul>
			</div>
			<div class="col-md-6">
				<img class="img-responsive" src="{{ URL::to('/resources/images/website/launcher.jpg') }}" alt="">
			</div>
		</div>
		<!-- /.row -->
@stop