@extends('layout.panel')
@section('body')
<?php
$mcservers = DB::table('mcservers')->where('mcs_uid', '=', Auth::User()->id)->get();





?>
<h2>Minecraft</h2>
@if(!count($mcservers))
	<center>
		<span class="label label-info">Não Tens Nenhum Servidor De Minecraft Registado</span><br><br>
		<a href="{{ URL::to('/panel/minecraft/new') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Servidor</a>
	</center>
@else
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th class="col-md-5"><i class="fa fa-server"></i> Servidor</th>
								<th class="col-md-2"><i class="fa fa-users"></i> Jogadores</th>
								<th class="col-md-2"><i class="fa fa-signal"></i> Uptime</th>
								<th class="col-md-1"><i class="fa fa-thumbs-o-up"></i> Votos</th>
								<th class="col-md-2"><i class="fa fa-wrench"></i> Gerir</th>
							</tr>
						</thead>
						<tbody>
							@foreach($mcservers as $server)
								<tr>
									<td><a href="{{ URL::to('/panel/minecraft/'.$server->mcs_id) }}"><img src="<?php if(!utilities::MCSVhasBanner($server->mcs_id)){ echo URL::to('/resources/images/minecraft/banners/default-banner.jpg'); } else { echo URL::to('/resources/images/minecraft/banners/'.$server->mcs_id); } ?>" alt="Server Banner" height="60" width="468"></a><br><?php if($server->mcs_aliase == null){ echo'<span class="label label-default" style="background: #3f51b5;">'.$server->mcs_ip.':'.$server->mcs_port.'</span>'; } else { echo'<span class="label label-default" style="background: #3f51b5;">'.$server->mcs_aliase.':'.$server->mcs_port.'</span>'; } ?> <script>document.write(status({{ $server->mcs_status }}));</script></td>
									<td>{{ $server->mcs_players }}/{{ $server->mcs_maxplayers }}<br><br>Emanuel, Joaquim ...</td>
									<td><script>document.write(uptime({{ $server->mcs_uptime }}));</script></td>
									<td>{{ $server->mcs_mvotes }}</td>
									<td><center><a href="{{ URL::to('/panel/minecraft/'.$server->mcs_id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Editar Servidor</a><br><br><a href="{{ URL::to('/panel/minecraft/'.$server->mcs_id) }}" class="btn btn-danger"><i class="fa fa-pencil"></i> Apagar Servidor</a></center></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
@endif









@stop