<?php
$server = DB::table('mcservers')->where('mcs_id', '=', $id)->first();
?>
@extends('layout.panel')
@section('body')
						{{ Form::open(array('route' => 'updatemcserver', 'class'=>'form-horizontal', 'files' => true)) }}
						{{ Form::hidden('sid', $id) }}
							<h3 class="col-md-offset-2">Geral</h3>
							<div class="form-group">
							  <label for="serverName" class="col-lg-2 control-label">Nome Do Servidor<span style="color: #f44336; font-size: 120%;">*</span></label>
							  <div class="col-lg-4">
								{{ Form::text('serverName', $server->mcs_name, array('class' => 'form-control', 'autofocus' => 'autofocus', 'required' => 'required', 'maxlength' => '100')) }}
							  </div>
							</div>
							<div class="form-group">
							  <label for="serverDesc" class="col-lg-2 control-label">Descrição<span style="color: #f44336; font-size: 120%;">*</span></label>
							  <div class="col-lg-4">
								{{ Form::text('serverDesc', $server->mcs_desc, array('class' => 'form-control', 'maxlength' => '255', 'required' => 'required')) }}
							  </div>
							</div>
							<div class="form-group">
							  <label for="serverSite" class="col-lg-2 control-label">Website</label>
							  <div class="col-lg-4">
								{{ Form::text('serverSite', $server->mcs_website, array('class' => 'form-control', 'maxlength' => '100')) }}
							  </div>
							</div>
							<div class="form-group">
							  <label for="serverMsg" class="col-lg-2 control-label">Lema</label>
							  <div class="col-lg-4">
								{{ Form::text('serverMsg', $server->mcs_msg, array('class' => 'form-control', 'maxlength' => '100')) }}
								<span class="label label-warning">Ex: Onde Os Blocos Nascem</span>
							  </div>
							</div>
							<div class="form-group">
							  <label for="banner" class="col-lg-2 control-label">Banner</label>
							  <div class="col-lg-4">
								  {{ Form::file('banner') }}
								  <span class="label label-warning">A resolução têm de ser de 468x60 pixels. O ficheiro pode ter no maximo 1MB. As extenções permitidas para os banners são .jpg, .png e .gif</span>
								  <span class="label label-danger">Se quiser manter o banner atual, não selecione nada neste campo</span> 
							 </div>
							</div>
							<hr>
							<h3 class="col-md-offset-2">Servidor</h3>
							<div class="form-group">
							  <label for="serverIp" class="col-lg-2 control-label">Endereço De IP<span style="color: #f44336; font-size: 120%;">*</span></label>
							  <div class="col-lg-4">
								{{ Form::text('serverIp', $server->mcs_ip, array('class' => 'form-control', 'required' => 'required', 'maxlength' => '35', 'readonly' => 'readonly')) }}
								<span class="label label-warning">Ex: 199.000.000.222</span>
							  </div>
							</div>
							<div class="form-group">
							  <label for="serverPort" class="col-lg-2 control-label">Porta<span style="color: #f44336; font-size: 120%;">*</span></label>
							  <div class="col-lg-2">
								{{ Form::text('serverPort', $server->mcs_port, array('class' => 'form-control', 'required' => 'required', 'maxlength' => '6', 'readonly' => 'readonly')) }}
								<span class="label label-warning">Ex: 25565</span>
							  </div>
							</div>
							<div class="form-group">
							  <label for="serverAliase" class="col-lg-2 control-label">Aliase</label>
							  <div class="col-lg-4">
								{{ Form::text('serverAliase', $server->mcs_aliase, array('class' => 'form-control', 'maxlength' => '100')) }}
								<span class="label label-warning">Ex: play.mydomain.com</span>
							  </div>
							</div>
							<hr>
							<h3 class="col-md-offset-2">Votifier <small><a href="http://dev.bukkit.org/server-mods/votifier/">(http://dev.bukkit.org/server-mods/votifier/)</a></small></h3>
							<div class="form-group">
							  <label for="serverV" class="col-lg-2 control-label">Ativar Votifier</label>
							  <div class="col-lg-10">
								<div class="checkbox">
								  <label>
									@if($server->mcs_votifier == 0)
										{{ Form::checkbox('serverV', 1, false, ['id' => 'votifier_field', 'onclick' => 'Votifier();']) }}
									@else
										{{ Form::checkbox('serverV', 1, true, ['id' => 'votifier_field', 'onclick' => 'Votifier();', 'checked' => 'checked']) }}
									@endif
								  </label>
								</div>
							  </div>
							</div>
							<div id="votifier_divfield" style="display:<?php if($server->mcs_votifier == 0){ echo "none"; } else { echo "block"; } ?>;">
								<div class="form-group">
								  <label for="serverVPort" class="col-lg-2 control-label">Porta do Votifier</label>
								  <div class="col-lg-2">
									{{ Form::text('serverVPort', '', array('class' => 'form-control')) }}
								  </div>
								</div>
								<div class="form-group">
								  <label for="serverVPKey" class="col-lg-2 control-label">Public Key do Votifier</label>
								  <div class="col-lg-10">
									{{ Form::text('serverVPKey', '', array('class' => 'form-control')) }}
								  </div>
								</div>
							</div>
							<hr>
							{{Form::submit('Guardar Servidor', array('class'=>'btn btn-success col-md-offset-2'))}}
							<div class="pull-right"><span style="color: #f44336; font-size: 150%;">*</span> = obrigatório</div>
						{{ Form::close() }}
<br>
@stop