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
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default" style="height: 155px;">
					<div class="panel-heading">
						<h4><i class="fa fa-fw fa-check"></i> 100% Português</h4>
					</div>
					<div class="panel-body">
						<p>Feito por portugueses para os portugueses.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default" style="height: 155px;">
					<div class="panel-heading">
						<h4><i class="fa fa-fw fa-gift"></i> Launcher Proprio</h4>
					</div>
					<div class="panel-body">
						<p>Não tens o Minecraft comprado? <br>Podes agora utilizar o nosso launcher para Minecraft original e crackeado.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default" style="height: 155px;">
					<div class="panel-heading">
						<h4><i class="fa fa-fw fa-compass"></i> Os Melhores Servidores Tugas</h4>
					</div>
					<div class="panel-body">
						<p>Aqui encontras os melhores servidores tugas em varias plataformas de jogo.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->
		<!-- Portfolio Section -->
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Jogos Disponíveis</h2>
			</div>
			<a href="{{ URL::to('/minecraft') }}">
				<div class="cover-card col-md-4 col-sm-6" style="background: url({{ URL::to('/resources/images/website/minecraft-thumbnail.jpg') }}) no-repeat center top;background-size:cover;">
					<p>
						Minecraft
					</p>
				</div>
			</a>
			<a>
				<div class="cover-card col-md-4 col-sm-6" style="background: url({{ URL::to('/resources/images/website/csgo-thumbnail.jpg') }}) no-repeat center top;background-size:cover;">
					<p>
						Counter-Strike: Global Offensive<br><br><strong>Em Breve</strong>
					</p>
				</div>
			</a>
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
				<a href="https://mega.co.nz/#!b9wXgQyQ!4BqnCsFLOVf2sHKU3XTQhXQmOJPwNn3scngvERA9tmM" target="_blank" class="btn btn-info"><i class="fa fa-windows"></i> Download Windows</a> <a href="https://mega.co.nz/#!uohGAaKJ!RMp9PB6heXLqiVKb_t51X_rnNsQWvC1motN8bE1r8zk" target="_blank" class="btn btn-info"><i class="fa fa-linux"></i> Download Linux/MAC</a>
			</div><br>
			<div class="col-md-6">
				<img class="img-responsive" src="{{ URL::to('/resources/images/website/launcher.jpg') }}" alt="">
			</div>
		</div>
		<!-- /.row -->
@stop