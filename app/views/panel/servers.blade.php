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
									<td><a href="{{ URL::to('minecraft/'.$server->mcs_id) }}"><img src="{{ utilities::getMCBanner($server->mcs_id) }}" alt="Server Banner" height="60" width="468"></a><br><?php if($server->mcs_aliase == null){ echo'<span class="label label-default" style="background: #3f51b5;">'.$server->mcs_ip.':'.$server->mcs_port.'</span>'; } else { echo'<span class="label label-default" style="background: #3f51b5;">'.$server->mcs_aliase.':'.$server->mcs_port.'</span>'; } ?> <script>document.write(status({{ $server->mcs_status }}));</script> <span class="label label-primary" style="background-color: #4caf50;">{{ $server->mcs_version }}</span></td>
									<td>{{ $server->mcs_players }}/{{ $server->mcs_maxplayers }}</td>
									<td><script>document.write(uptime({{ $server->mcs_uptime }}));</script></td>
									<td>{{ $server->mcs_mvotes }}</td>
									<td><center><a href="{{ URL::to('/panel/minecraft/'.$server->mcs_id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Editar Servidor</a><br><br><button type="button" class="btn btn-danger" onClick="deleteServer{{$server->mcs_id}}()"><i class="fa fa-pencil"></i> Apagar Servidor</button></center></td>
								</tr>
								<!-- Script do evento -->
								<script>
								function deleteServer{{$server->mcs_id}}() {
								swal({
										  title: "Tens a certeza?",
										  text: "O Servidor Será Removido.",
										  type: "warning",
										  showCancelButton: true,
										  confirmButtonColor: "#DD6B55",
										  confirmButtonText: "Sim, Remova o Servidor!",
										  closeOnConfirm: false
										},
										function(){
										  var url = document.URL + "/remove?id={{$server->mcs_id}}&game=minecraft";
										  window.location.href = url; 
										});
								};
								</script>
							@endforeach
						</tbody>
					</table>
				</div>
@endif









@stop