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

	if($server->mcs_qport == null){
		mcservers::checkQuery($server->mcs_id, $server->mcs_ip, $server->mcs_port, $day, $month, $year);
	} else {
		mcservers::checkNoQuery($server->mcs_id, $server->mcs_ip, $server->mcs_qport, $day, $month, $year);
	}

}

settings::set('lastCheck', time());











?>