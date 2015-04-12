<?php

    use xPaw\MinecraftQuery;
    use xPaw\MinecraftQueryException;
    use xPaw\MinecraftPing;
    use xPaw\MinecraftPingException;

function pingNew($ip, $port){
	
    try
    {
        $Query = new MinecraftPing($ip, $port);

        return $Query->Query();
    }
    catch( MinecraftPingException $e )
    {
        return $error = "error";
    }
    finally
    {
        $Query->Close();
    }
}

function pingOld($ip, $port){
	
    try
    {
        $Query = new MinecraftPing($ip, $port);

        return $Query->QueryOldPre17();
    }
    catch( MinecraftPingException $e )
    {
        return $error = "error";
    }
    finally
    {
        $Query->Close();
    }
}

function addReg($sid, $players, $ping){
	DB::table('mcserverschecks')->insert(
		array('mcsc_sid' => $sid,
			  'mcsc_players' => $players,
			  'mcsc_ping' => $ping,
			  'mcsc_time' => time()
	));
}

function updateServer($sid, $version, $uptime, $maxplayers, $players, $motd, $favicon){
	DB::table('mcservers')->where('mcs_id', $sid)->update(
		array('mcs_version' => $version,
			  'mcs_uptime' => $uptime,
			  'mcs_maxplayers' => $maxplayers,
			  'mcs_players' => $players,
			  'mcs_motd' => $motd,
			  'mcs_favicon' => $favicon
	));
}

$code = "q2nQNl8k4xlfPEa8kEBCqIixrnxn8jJwgY6cgzYA6AixW3nX7kdVbBNbuNpO";

if(!isset($_GET['a'])){
	die();
} elseif($_GET['a'] != $code){
	die();
}

$servers = DB::table('mcservers')->get();

$Query = new MinecraftQuery( );
    try
    {
        $Query->Connect( '77.111.249.164', 25566 );

    }
    catch( MinecraftQueryException $e )
    {
        echo $e->getMessage( );
    }

var_dump($Query);














?>