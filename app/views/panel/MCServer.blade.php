<?php
$server = DB::table('mcservers')->where('mcs_id', '=', $id)->first();
?>
@extends('layout.panel')
@section('head')
<style>
.top-img {
    padding-top: 50px;
    padding-bottom: 50px;
    text-align: center;
    color: #f8f8f8;
    background: url({{ URL::to('<?php if(!utilities::MCSVhasbackground($server->mcs_id)){ echo URL::to('/resources/images/minecraft/backgrounds/default-background.jpg'); } else { echo URL::to('/resources/images/minecraft/backgrounds/'.$server->mcs_id.'.jpg'); } ?>') }}) no-repeat center center;
	background-attachment: fixed;
}
</style>
@stop
@section('body')
	<!-- Header Carousel -->
	<header>
		<div class="top-img">
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