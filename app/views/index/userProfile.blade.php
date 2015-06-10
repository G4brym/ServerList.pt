<?php
$user = Auth::User();
?>
@extends('layout.index')
@section('body')
<div class="row">
	<div class="col-md-8">
	<ul class="nav nav-tabs" role="tablist" id="myTab">
	  <li class="active"><a href="#changePW" role="tab" data-toggle="tab">Trocar Password</a></li>
	  <li><a href="#logs" role="tab" data-toggle="tab">Logs</a></li>
	</ul>

	<div class="tab-content">
	  <div class="tab-pane active" id="changePW">
		<div class="well">
				{{ Form::open(array('route' => 'changePW', 'class'=>'form-horizontal')) }}
									
						<div class="form-group">
						  <label for="oldpassword" class="col-lg-3 control-label">Password Antiga</label>
						  <div class="col-lg-5">
						  {{Form::password('oldpassword', array('class'=>'form-control', 'autofocus' => 'autofocus', 'maxlength' => 20, 'required' => 'required'))}}
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="newpassword" class="col-lg-3 control-label">Nova Password</label>
						  <div class="col-lg-5">
						  {{Form::password('newpassword', array('class'=>'form-control', 'maxlength' => 20, 'required' => 'required'))}}
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="shortSiteName" class="col-lg-3 control-label">Captcha</label>
						  <div class="col-lg-5">
							{{Form::captcha()}}
						  </div>
						</div>
				
					<div style="margin-top:10px" class="form-group">
						<!-- Button -->

						<div class="col-lg-10 col-lg-offset-3">
							{{ Form::submit('Trocar Password', array('class'=>'btn btn-warning btn-sm')) }}

						</div>
					</div>   
				{{ Form::close() }}  
		</div>
	  </div>
	  <div class="tab-pane" id="logs">
			<div class="panel panel-default">
		      <!-- Default panel contents -->
		      <div class="panel-heading"><span class="glyphicon glyphicon-eye-open"></span> Ultimos 10 Registos</div>

		      <!-- Table -->
		      <table class="table">
		        <thead>
		          <tr>
		            <th>Ação</th>
		            <th>IP</th>
		            <th>Data</th>
		          </tr>
		        </thead>
		        <tbody>
		@foreach (DB::table('logs')->where('logs_userid', '=', $user->id)->orderby('logs_id', 'DESC')->take(10)->get() as $logs)
		          <tr>
		            <td>{{$logs->logs_action}}</td>
		            <td>{{$logs->logs_ip}}</td>
		            <td>{{$logs->logs_date}}</td>
		          </tr>
		@endforeach
		        </tbody>
		      </table>
		    </div>
	  </div>
	</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-info">
			  <!-- Default panel contents -->
			  <div class="panel-heading"><i class="fa fa-info-circle"></i> Votos</div>

			  <!-- Table -->
			  <table class="table">
				<tbody>
				  <tr>
					<th scope="row" class="col-md-4">Total De Votos</th>
					<td class="col-md-8">{{ $user->votes }}</td>
				  </tr>
				</tbody>
			  </table>
			</div>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- SVL MCServer -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3899991868406055"
     data-ad-slot="5240810521"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<br>
	</div>
</div>
@stop