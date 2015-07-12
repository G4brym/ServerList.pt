<?php
$server = DB::table('mcservers')->where('mcs_id', '=', $id)->first();
?>
@extends('layout.index')
@section('head')
<style>
.top-img {
	padding-top: 10px;
	padding-bottom: 10px;
	text-align: left;
	color: #f8f8f8;
	background:     linear-gradient(
      rgba(0, 0, 0, 0.25), 
      rgba(0, 0, 0, 0.25)
    ),
	url(<?php 
	if(!utilities::MCSVhasbackground($server->mcs_id)){ 
		echo URL::to('/resources/images/minecraft/backgrounds/default-background.jpg'); 
	} else { 
		echo URL::to('/resources/images/minecraft/backgrounds/'.$server->mcs_id.'.jpg'); 
	} 
	?>) no-repeat center center;
}
</style>
@stop
@section('header')
@if($server->mcs_header == 1)
	<!-- Header Carousel -->
	<header>
		<div class="top-img">
			<div class="container server-background">

				<div class="row">
					<div class="col-lg-12">
						<div class="intro-message pull-left">
							<h2 style="color: #f5f5f5;"><strong>{{ $server->mcs_name }}</strong></h1><br>
							<h3 style="color: #e0e0e0;"><font face="Roboto_Condensed">{{ $server->mcs_msg }}<?php if(isset($server->mcs_website)){ echo '<small> - <a href ="' . $server->mcs_website . '" target="_blank">' . $server->mcs_website . '</a></small>'; } ?></font></h3>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container -->

		</div>
		<!-- /.intro-header -->
	</header>
@endif
@stop
@section('body')
<div class="row">
	<div class="col-md-8">
		<ul class="nav nav-tabs">
			<li class="active"><a aria-expanded="false" href="#info" data-toggle="tab" style="background: #5c6bc0; color: #FFFFFF;"><i class="fa fa-info-circle"></i> Informações</a></li>
			<li><a aria-expanded="true" href="#vote" data-toggle="tab" style="background: #5c6bc0; color: #FFFFFF;"><i class="fa fa-thumbs-o-up"></i> Votar</a></li>
			<li><a aria-expanded="true" href="#banners" data-toggle="tab" style="background: #5c6bc0; color: #FFFFFF;"><i class="fa fa-picture-o"></i> Banners</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade active in" id="info">
			  <br>
			  <!-- Table -->
			  <table class="table table-striped table-hover">
				<tbody>
				  <tr>
					<th scope="row" class="col-md-3">MOTD</th>
					<td class="col-md-9">{{ $server->mcs_motd }}</td>
				  </tr>
				  <tr>
					<th scope="row">Estado</th>
					<td><script>document.write(status({{ $server->mcs_status }}));</script> <small class="pull-right">verificado pela última vez há {{ time::ago(settings::get('lastCheck')) }}</small></td>
				  </tr>
				  <tr>
					<th scope="row">Endereço De IP</th>
					<td><?php if($server->mcs_aliase == null){ echo $server->mcs_ip.":".$server->mcs_port; } else { echo $server->mcs_aliase; } ?></td>
				  </tr>
@if($server->mcs_website != null)
					<tr>
					<th scope="row">Website</th>
						<td><a href="{{ $server->mcs_website }}" target="_blank">{{ $server->mcs_website }}</a></td>
				  </tr>
@endif
				  <tr>
					<th scope="row">Jogadores</th>
					<td>{{ $server->mcs_players."/".$server->mcs_maxplayers }}</td>
				  </tr>
				  <tr>
					<th scope="row">Versão</th>
					<td><span class="label label-info">{{ $server->mcs_version }}</span></td>
				  </tr>
				  <tr>
					<th scope="row">UpTime</th>
					<td><script>document.write(uptime({{ $server->mcs_uptime }}));</script></td>
				  </tr>
				  <tr>
					<th scope="row">Etiquetas</th>
					<td>
						<span class="label" style="background-color: #009688;">{{ mcservers::getServerType($server->mcs_serverType) }}</span>
						<script>document.write(tags({{ $server->mcs_tagAdventure }}, 'Adventure'));</script>
						<script>document.write(tags({{ $server->mcs_tagCreative }}, 'Creative'));</script>
						<script>document.write(tags({{ $server->mcs_tagMinigames }}, 'MiniGames'));</script>
						<script>document.write(tags({{ $server->mcs_tagPrison }}, 'Prison'));</script>
						<script>document.write(tags({{ $server->mcs_tagSurvival }}, 'Survival'));</script>
						<script>document.write(tags({{ $server->mcs_tagWhitelist }}, 'Whitelist'));</script>
					</td>
				  </tr>
				</tbody>
			  </table>
			</div>
			<div class="tab-pane fade" id="vote">
				<br>
				{{ Form::open(array('url' => 'vote', 'class'=>'form-horizontal')) }}
									
						<div class="form-group">
						  <label for="username" class="col-lg-3 control-label">Nome No Minecraft</label>
						  <div class="col-lg-5">
							{{ Form::text('MCUsername', '', array('class' => 'form-control', 'autofocus' => 'autofocus', 'maxlength' => 40, 'required' => 'required')) }}
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="shortSiteName" class="col-lg-3 control-label">Captcha</label>
						  <div class="col-lg-5">
							{{Form::captcha()}}
						  </div>
						</div>
				
					{{ Form::hidden('sid', $id) }}
				
					<div style="margin-top:10px" class="form-group">
						<!-- Button -->

						<div class="col-lg-10 col-lg-offset-3">
							{{ Form::submit('Votar', array('class'=>'btn btn-success btn-sm')) }}

						</div>
					</div>   
				{{ Form::close() }}   
			</div>
			<div class="tab-pane fade" id="banners">
				<br>
				<a href="https://www.serverlist.pt/minecraft/{{ $server->mcs_id }}" target="_blank"><img src="https://www.serverlist.pt/resources/images/minecraft/generatedBanners/{{ $server->mcs_id }}.jpg" border="0"></a>
				<br>
				<textarea style="resize: none; width: 468px;" class="form-control" rows="3" readonly>&lt;a href="https://www.serverlist.pt/minecraft/{{ $server->mcs_id }}" target="_blank"&gt;&lt;img src="https://www.serverlist.pt/resources/images/minecraft/generatedBanners/{{ $server->mcs_id }}.jpg" border="0"&gt;&lt;/a&gt;</textarea>
				<br><br>
				<iframe src="https://www.serverlist.pt/embed/vote?gm=mc&sid={{ $server->mcs_id }}" scrolling="no" marginheight="0" marginwidth="0" allowtransparency="true" frameborder="0" height="30" width="185"></iframe>
				<textarea style="resize: none; width: 468px;" class="form-control" rows="4" readonly>&lt;iframe src="https://www.serverlist.pt/embed/vote?gm=mc&sid={{ $server->mcs_id }}" scrolling="no" marginheight="0" marginwidth="0" allowtransparency="true" frameborder="0" height="30" width="185" &gt;&lt;/iframe&gt;</textarea>
			</div>
		</div>

		<hr>
		
		<div id="disqus_thread"></div>
		<script type="text/javascript">
			/* * * CONFIGURATION VARIABLES * * */
			var disqus_shortname = 'serverllist';

			/* * * DON'T EDIT BELOW THIS LINE * * */
			(function() {
				var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			})();
		</script>
		<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
	</div>
	<div class="col-md-4">
		<div class="panel panel-info">
			  <!-- Default panel contents -->
			  <div class="panel-heading"><i class="fa fa-info-circle"></i> Votos</div>

			  <!-- Table -->
			  <table class="table">
				<tbody>
				  <tr>
					<th scope="row" class="col-md-4">Votos Hoje</th>
					<td class="col-md-8">{{ $server->mcs_tvotes }}</td>
				  </tr>
				  <tr>
					<th scope="row">Votos Este Mês</th>
					<td>{{ $server->mcs_mvotes }}</td>
				  </tr>
				  <tr>
					<th scope="row" class="col-md-12"><iframe src="https://www.serverlist.pt/embed/vote?gm=mc&sid={{ $server->mcs_id }}" scrolling="no" marginheight="0" marginwidth="0" allowtransparency="true" frameborder="0" height="30" width="185"></iframe></th>
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
@if($server->mcs_desc != null)
		<div class="well">
			{{ $server->mcs_desc }}
		</div>
@endif
	</div>
</div>
@stop