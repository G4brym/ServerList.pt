@extends('layout.index')
@section('body')
<?php

$servers = DB::table('mcservers')->where('mcs_premium', '=', '0')->count();

$pages = ceil($servers/20);

if(isset($_GET["page"])){
	if($_GET["page"] < 1 || $_GET["page"] > $pages){
		$page = 1;
	} else {
		$page = $_GET["page"];
	}
} else {
	$page = 1;
}

$skip = $page * 20 - 20;

$normalServers = DB::table('mcservers')->where('mcs_premium', '=', '0')->skip($skip)->take(20)->get();
$premiumServers = DB::table('mcservers')->where('mcs_premium', '=', '1')->get();

$i = $skip + 1;
?>
<div class="row">
			
<!-- Servidores Premium -->
			<div class="col-md-10 col-md-offset-1">
				<h2>
					<i class="fa fa-trophy"></i> Servidores Premium <a href="{{ URL::to('/panel/minecraft') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Adiciona O Teu Servidor</a>
				</h2>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th class="col-md-6"><i class="fa fa-server"></i> Servidor</th>
								<th class="col-md-2"><i class="fa fa-users"></i> Jogadores</th>
								<th class="col-md-2"><i class="fa fa-signal"></i> Uptime</th>
								<th class="col-md-2"><i class="fa fa-tag"></i> Etiquetas</th>
							</tr>
						</thead>
						<tbody>
							@foreach($premiumServers as $server)
								<tr>
									<td><a href="{{ URL::to('minecraft/'.$server->mcs_id) }}"><img src="<?php if(!utilities::MCSVhasBanner($server->mcs_id)){ echo URL::to('/resources/images/minecraft/banners/default-banner.jpg'); } else { echo URL::to('/resources/images/minecraft/banners/'.$server->mcs_id); } ?>" alt="Server Banner" height="60" width="468"></a><br><?php if($server->mcs_aliase == null){ echo'<span class="label label-default" style="background: #3f51b5;">'.$server->mcs_ip.':'.$server->mcs_port.'</span>'; } else { echo'<span class="label label-default" style="background: #3f51b5;">'.$server->mcs_aliase.':'.$server->mcs_port.'</span>'; } ?> <script>document.write(status({{ $server->mcs_status }}));</script></td>
									<td>{{ $server->mcs_players }}/{{ $server->mcs_maxplayers }}<br><br>Emanuel, Joaquim ...</td>
									<td><script>document.write(uptime({{ $server->mcs_uptime }}));</script></td>
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
								<tr>
									<td><a href="{{ URL::to('minecraft/'.$server->mcs_id) }}"><img src="<?php if($server->mcs_favicon == null){ echo URL::to('/resources/images/minecraft/banners/default-square.png'); } else { echo $server->mcs_favicon; } ?>" alt="Server Favicon" height="64" width="64"></a><br><span class="label label-info">Rank: {{ $i++ }}</span></center></td>
									<td><a href="{{ URL::to('minecraft/'.$server->mcs_id) }}"><img src="<?php if(!utilities::MCSVhasBanner($server->mcs_id)){ echo URL::to('/resources/images/minecraft/banners/default-banner.jpg'); } else { echo URL::to('/resources/images/minecraft/banners/'.$server->mcs_id); } ?>" alt="Server Banner" height="60" width="468"></a><br><?php if($server->mcs_aliase == null){ echo'<span class="label label-default" style="background: #3f51b5;">'.$server->mcs_ip.':'.$server->mcs_port.'</span>'; } else { echo'<span class="label label-default" style="background: #3f51b5;">'.$server->mcs_aliase.':'.$server->mcs_port.'</span>'; } ?> <script>document.write(status({{ $server->mcs_status }}));</script></td>
									<td>{{ $server->mcs_players }}/{{ $server->mcs_maxplayers }}<br><br>Emanuel, Joaquim ...</td>
									<td><script>document.write(uptime({{ $server->mcs_uptime }}));</script></td>
									<td>{{ $server->mcs_mvotes }}</td>
									<td><span class="label label-success">Spigot</span> <span class="label label-primary">MiniGames</span></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /.row -->
<?php
echo '
<center>
<nav>
  <ul class="pagination">';

if($page == 1){
	echo '
	<li class="disabled">
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>';
} else {
	echo '
	<li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>';
}

//escreve as paginas anteriores
for ($i = $page - 4; $i < $page; $i++){
	if($i > 0){
		echo '<li><a href="'.URL::to('/minecraft?page='.$i).'">'.$i.'</a></li>';
	}
}

//escreve a pagina atual
echo '<li class="active"><a>'.$page.'</a></li>';

//escreve as paginas seguintes
for ($i = $page + 1; $i <= $page + 4; $i++){
	if($i <= $pages){
		echo '<li><a href="'.URL::to('/minecraft?page='.$i).'">'.$i.'</a></li>';
	}
}

if($page == $pages){
	echo '
	<li class="disabled">
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>';
} else {
	echo '
	<li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>';
}

echo '
  </ul>
</nav>
</center>';
?>
@stop