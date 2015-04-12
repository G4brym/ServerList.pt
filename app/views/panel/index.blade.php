@extends('layout.panel')
@section('css')
	{{ HTML::style(URL::to('/resources/css/morris.css')) }}
@stop
@section('body')
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Painel De Controlo</h1>
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bar-chart-o fa-fw"></i> Média De Jogadores Online Por Dia
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div id="morris-area-chart"></div>
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
@section('js')
	{{ HTML::script(URL::to('/resources/js/morris.js')) }}
	{{ HTML::script(URL::to('/resources/js/raphael.js')) }}

<script>
	
Morris.Area({
  element: 'morris-area-chart',
  data: [
<?php
for($i = 7; $i >= 2; $i--){
	echo "{ d: '".date("Y-m-d",strtotime('-'.$i.' days'))."', j: 0},";
}

echo "{ d: '".date("Y-m-d",strtotime('-1 days'))."', j: 0}";
?>
  ],
  xkey: 'd',
  ykeys: 'j',
  labels: ['Média De Jogadores'],
  resize: true
});
</script>
@stop