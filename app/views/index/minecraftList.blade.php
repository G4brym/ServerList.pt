@extends('layout.index')
@section('body')
<?php $normalServers = DB::table('mcservers')->where('mcs_premium', '=', '0')->get();
	  $premiumServers = DB::table('mcservers')->where('mcs_premium', '=', '1')->get(); ?>
		<div class="row">
			
<!-- Servidores Premium -->
			<div class="col-md-10 col-md-offset-1">
				<h2>
					<i class="fa fa-trophy"></i> Servidores Premium
				</h2>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th class="col-md-5"><i class="fa fa-server"></i> Servidor</th>
								<th class="col-md-2"><i class="fa fa-users"></i> Jogadores</th>
								<th class="col-md-2"><i class="fa fa-signal"></i> Uptime</th>
								<th class="col-md-3"><i class="fa fa-tag"></i> Etiquetas</th>
							</tr>
						</thead>
						<tbody>
							@foreach($premiumServers as $server)
								<tr>
									<td><a href="#"><img src="http://cdn2.minecraft-mp.com/images/banners/banner-39948-1415524491.gif"></a>{{ $server->mcs_motd }}</td>
									<td>45/{{ $server->mcs_maxplayers }}<br><br>Emanuel, Joaquim ...</td>
									<td><span class="badge" style="background-color: #388e3c;">90%</span><br><span class="badge" style="background-color: #fbc02d;">60%</span><br><span class="badge" style="background-color: #c62828;">20%</span></td>
									<td><span class="label label-success">Spigot</span> <span class="label label-primary">MiniGames</span></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

<!-- Servidores Normais -->
			<div class="col-md-12">
				<hr>
				<h2>
					<i class="fa fa-gamepad"></i> Servidores Normais
				</h2>
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
							@foreach($normalServers as $server)
								<a href="#"><tr>
									<td><center></center><img src="http://cdn.minecraft-mp.com/images/favicon/39948.png">{{ $server->mcs_favicon }}<br><span class="label label-info">Rank: 1</span></center></td>
									<td><img src="http://cdn2.minecraft-mp.com/images/banners/banner-39948-1415524491.gif">{{ $server->mcs_motd }}</td>
									<td>45/{{ $server->mcs_maxplayers }}<br><br>Emanuel, Joaquim ...</td>
									<td><span class="badge" style="background-color: #388e3c;">90%</span><br><span class="badge" style="background-color: #fbc02d;">60%</span><br><span class="badge" style="background-color: #c62828;">20%</span></td>
									<td>504</td>
									<td><span class="label label-success">Spigot</span> <span class="label label-primary">MiniGames</span></td>
								</tr></a>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /.row -->
@stop