@extends('layout.index')
@section('header')
	<!-- Header Carousel -->
	<header>
		<div class="intro-minecraft">
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
<?php $servers = DB::table('mcservers')->where('mcs_premium', '=', '0')->get(); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th class="col-md-1"><i class="fa fa-picture-o"></i> Icon</th>
								<th class="col-md-5"><i class="fa fa-server"></i> Servidor</th>
								<th class="col-md-2"><i class="fa fa-users"></i> Jogadores</th>
								<th class="col-md-1"><i class="fa fa-signal"></i> Uptime</th>
								<th class="col-md-1"><i class="fa fa-thumbs-o-up"></i> Votos</th>
								<th class="col-md-2"><i class="fa fa-tag"></i> Etiquetas</th>
							</tr>
						</thead>
						<tbody>
							@foreach($servers as $server)
								<tr>
									<td>{{ $server->mcs_favicon }}</td>
									<td>{{ $server->mcs_motd }}</td>
									<td>45/{{ $server->mcs_maxplayers }}</td>
									<td>90%</td>
									<td>504</td>
									<td>Spigot Minigames</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /.row -->
@stop