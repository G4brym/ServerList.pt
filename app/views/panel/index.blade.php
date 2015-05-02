<?php
$players = array();
//7 dias atraz
$players[7] = 0;
//6 dias atraz
$players[6] = 0;
//5 dias atraz
$players[5] = 0;
//4 dias atraz
$players[4] = 0;
//3 dias atraz
$players[3] = 0;
//2 dias atraz
$players[2] = 0;
//1 dias atraz
$players[1] = 0;

$servers = DB::table('mcservers')->where('mcs_uid', '=', Auth::user()->id)->get();
foreach($servers as $server){
	$players[7] = $players[7] + mcservers::getAVGPlayersMC($server->mcs_id, date("j",strtotime('-7 days')), date("n",strtotime('-7 days')), date("Y",strtotime('-7 days')));
	$players[6] = $players[6] + mcservers::getAVGPlayersMC($server->mcs_id, date("j",strtotime('-6 days')), date("n",strtotime('-6 days')), date("Y",strtotime('-6 days')));
	$players[5] = $players[5] + mcservers::getAVGPlayersMC($server->mcs_id, date("j",strtotime('-5 days')), date("n",strtotime('-5 days')), date("Y",strtotime('-5 days')));
	$players[4] = $players[4] + mcservers::getAVGPlayersMC($server->mcs_id, date("j",strtotime('-4 days')), date("n",strtotime('-4 days')), date("Y",strtotime('-4 days')));
	$players[3] = $players[3] + mcservers::getAVGPlayersMC($server->mcs_id, date("j",strtotime('-3 days')), date("n",strtotime('-3 days')), date("Y",strtotime('-3 days')));
	$players[2] = $players[2] + mcservers::getAVGPlayersMC($server->mcs_id, date("j",strtotime('-2 days')), date("n",strtotime('-2 days')), date("Y",strtotime('-2 days')));
	$players[1] = $players[1] + mcservers::getAVGPlayersMC($server->mcs_id, date("j",strtotime('-1 days')), date("n",strtotime('-1 days')), date("Y",strtotime('-1 days')));
}



?>
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
	echo "{ d: '".date("Y-m-d",strtotime('-'.$i.' days'))."', j: ".$players[$i]."},";
}

echo "{ d: '".date("Y-m-d",strtotime('-1 days'))."', j: ".$players[1]."}";
?>
  ],
  xkey: 'd',
  ykeys: 'j',
  labels: ['Média De Jogadores'],
  resize: true
});
</script>
@stop