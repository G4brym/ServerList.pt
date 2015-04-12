@extends('layout.panel')
@section('body')
				<div class="row">
					<div class="col-md-12">
						<h1 class="page-header">Adicionar Um Novo Servidor</h1>
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bar-chart-o fa-fw"></i> Detalhes Do Servidor
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">

						{{ Form::open(array('route' => 'newmcserver', 'class'=>'form-horizontal')) }}
							<h3 class="col-md-offset-2">Geral</h3>
							<div class="form-group">
							  <label for="serverName" class="col-lg-2 control-label">Nome Do Servidor<span style="color: #f44336; font-size: 120%;">*</span></label>
							  <div class="col-lg-4">
								{{ Form::text('serverName', '', array('class' => 'form-control', 'autofocus' => 'autofocus', 'required' => 'required', 'maxlength' => '100')) }}
							  </div>
							</div>
							<div class="form-group">
							  <label for="serverDesc" class="col-lg-2 control-label">Descrição<span style="color: #f44336; font-size: 120%;">*</span></label>
							  <div class="col-lg-4">
								{{ Form::text('serverDesc', '', array('class' => 'form-control', 'maxlength' => '255', 'required' => 'required')) }}
							  </div>
							</div>
							<div class="form-group">
							  <label for="serverSite" class="col-lg-2 control-label">Website</label>
							  <div class="col-lg-4">
								{{ Form::text('serverSite', '', array('class' => 'form-control', 'maxlength' => '100')) }}
							  </div>
							</div>
							<div class="form-group">
							  <label for="banner" class="col-lg-2 control-label">Banner</label>
							  <div class="col-lg-4">
								  {{ Form::file('banner') }}
								  <span class="label label-warning">A resolução maxima é 468x60 pixels. O ficheiro pode ter no maximo 1MB. As extenções permitidas são: jpg, png, gif</span>
							  </div>
							</div>
							<hr>
							<h3 class="col-md-offset-2">Servidor</h3>
							<div class="form-group">
							  <label for="serverIp" class="col-lg-2 control-label">Endereço De IP<span style="color: #f44336; font-size: 120%;">*</span></label>
							  <div class="col-lg-4">
								{{ Form::text('serverIp', '', array('class' => 'form-control', 'required' => 'required', 'maxlength' => '35')) }}
								<span class="label label-warning">Ex: 199.000.000.222</span>
							  </div>
							</div>
							<div class="form-group">
							  <label for="serverPort" class="col-lg-2 control-label">Porta<span style="color: #f44336; font-size: 120%;">*</span></label>
							  <div class="col-lg-2">
								{{ Form::text('serverPort', '', array('class' => 'form-control', 'required' => 'required', 'maxlength' => '6')) }}
								<span class="label label-warning">Ex: 25565</span>
							  </div>
							</div>
							<div class="form-group">
							  <label for="serverAliase" class="col-lg-2 control-label">Aliase</label>
							  <div class="col-lg-4">
								{{ Form::text('serverAliase', '', array('class' => 'form-control', 'maxlength' => '100')) }}
								<span class="label label-warning">Ex: play.mydomain.com</span>
							  </div>
							</div>
							<div class="form-group">
							  <label for="serverType" class="col-lg-2 control-label">Tipo De Versão</label>
							  <div class="col-lg-3">
								  {{ Form::select('serverType', ['0' => 'Antiga', '1' => 'Recente'], 0, ['class' => 'form-control']) }}
								  <span class="label label-warning">Antiga -> Versão 1.6.4 ou menor <strong>|</strong> Recente -> Versão 1.7.0 ou maior</span>
							  </div>
							</div>
							<hr>
							<h3 class="col-md-offset-2">Votifier <small><a href="http://dev.bukkit.org/server-mods/votifier/">(http://dev.bukkit.org/server-mods/votifier/)</a></small></h3>
							<div class="form-group">
							  <label for="serverV" class="col-lg-2 control-label">Ativar Votifier</label>
							  <div class="col-lg-10">
								<div class="checkbox">
								  <label>
									{{ Form::checkbox('serverV', 1, false) }}
								  </label>
								</div>
							  </div>
							</div>
							<div style="display:none;">
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
							{{Form::submit('Adicionar Servidor', array('class'=>'btn btn-success col-md-offset-2'))}}
							<div class="pull-right"><span style="color: #f44336; font-size: 150%;">*</span> = obrigatório</div>
						{{ Form::close() }}
							
						</div>
						<!-- /.panel-body -->
					</div>
					</div>
					<!-- /.col-lg-12 -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
@stop