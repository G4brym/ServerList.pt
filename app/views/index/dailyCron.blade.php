<?php
$code = "q2nQNl8k4xlfPEa8kEBCqIixrnxn8jJwgY6cgzYA6AixW3nX7kdVbBNbuNpO";

if(!isset($_GET['a'])){
	die();
} elseif($_GET['a'] != $code){
	die();
}

$day = date("j");
$month = date("n");
$year = date("Y");

$servers = DB::table('mcservers')->get();

foreach($servers as $server){
	//4320 = cada dia tem 1440 minutos, check passa de 10 em 10 mins = 144 checks por dia, * 30 dias = 4320
	$Checks = count(DB::table('mcserverschecks')->where('mcsc_sid', '=', $server->mcs_id)->orderBy('mcsc_id', 'desc')->take(4320)->get());
	$OnlineTimes = count(DB::table('mcserverschecks')->where('mcsc_sid', '=', $server->mcs_id)->where('mcsc_online', '=', 1)->orderBy('mcsc_id', 'desc')->take(4320)->get());
	$TotalPlayers = DB::table('mcserverschecks')->where('mcsc_sid', '=', $server->mcs_id)->orderBy('mcsc_id', 'desc')->take(4320)->sum('mcsc_players');

	if($Checks == 0){
		$Checks = 1;
	}
	
	$uptime = round(($OnlineTimes * 100) / $Checks);
	
	DB::table('mcservers')->where('mcs_id', $server->mcs_id)->update(
		array('mcs_uptime' => $uptime,
			  'mcs_tvotes' => 0
	));
}









?>