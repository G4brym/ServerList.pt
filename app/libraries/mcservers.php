<?php

use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;
use xPaw\MinecraftQuery;
use xPaw\MinecraftQueryException;


Class mcservers {

    public static function ping($ip, $port, $timeout = 1){

		$Timer = MicroTime( true );

		$Info = false;
		$Query = null;

		try
		{
			$Query = new MinecraftPing($ip, $port, $timeout);

			$Info = $Query->Query( );

			if( $Info === false )
			{

				$Query->Close( );
				$Query->Connect( );

				$Info = $Query->QueryOldPre17( );
			}
		}
		catch( MinecraftPingException $e )
		{
			$Exception = $e;
		}

		if( $Query !== null )
		{
			$Query->Close( );
		}

		$Timer = Number_Format( MicroTime( true ) - $Timer, 2, '.', '' );
		
		return $Info;
	}
	
    public static function motd($motd){

		$colors = array("§1", "§2", "§3", "§4", "§5", "§6", "§7", "§8", "§9", "§a", "§b", "§c", "§d", "§e", "§f", "§A", "§B", "§C", "§D", "§E", "§F", "§k", "§l", "§m", "§n", "§o", "§r", "§K", "§L", "§M", "§N", "§O", "§R");
		$motd = str_replace($colors, "", $motd);
		
		return $motd;

	}
	
    public static function getVersion($id){

		$versions = mcservers::getVersions();
		if(array_key_exists($id, $versions)){
			return $versions[$id];
		} else {
			return false;
		}

	}
	
    public static function getVersions(){
		
		$versions = array("1.8.7" => "1.8.7",
						  "1.8.6" => "1.8.6",
					   	  "1.8.5" => "1.8.5",
					   	  "1.8.4" => "1.8.4",
					   	  "1.8.3" => "1.8.3",
					   	  "1.8.2" => "1.8.2",
					   	  "1.8.1" => "1.8.1",
					   	  "1.8" => "1.8",
					   	  "1.7.10" => "1.7.10",
					   	  "1.7.9" => "1.7.9",
					   	  "1.7.8" => "1.7.8",
					   	  "1.7.6" => "1.7.6",
					   	  "1.7.5" => "1.7.5",
					   	  "1.7.4" => "1.7.4",
					   	  "1.7.2" => "1.7.2",
					   	  "1.7" => "1.7",
					   	  "1.6.4" => "1.6.4",
					   	  "1.6.2" => "1.6.2",
					   	  "1.5.2" => "1.5.2",
					   	  "1.4.7" => "1.4.7",
					   	  "1.4.6" => "1.4.6",
					   	  "1.2.5" => "1.2.5");
		
		return $versions;

	}
	
    public static function playerHasVoted($sid, $player){

		$day = date("j");
		$month = date("n");
		$year = date("Y");
		
		$vote = DB::table('mcserversvotes')->where('mcsv_sid', '=', $sid)->where('mcsv_player', '=', $player)->where('mcsv_day', '=', $day)->where('mcsv_month', '=', $month)->where('mcsv_year', '=', $year)->first();
		
		if(count($vote)){
			return true;
		} else {
			return false;
		}

	}
	
    public static function ipHasVoted($sid, $ip){

		$day = date("j");
		$month = date("n");
		$year = date("Y");
		
		$vote = DB::table('mcserversvotes')->where('mcsv_sid', '=', $sid)->where('mcsv_ip', '=', $ip)->where('mcsv_day', '=', $day)->where('mcsv_month', '=', $month)->where('mcsv_year', '=', $year)->first();
		
		if(count($vote)){
			return true;
		} else {
			return false;
		}

	}
	
    public static function getAVGPlayersMC($sid, $day, $month, $year){

		$avg = DB::table('mcserverschecks')->where('mcsc_sid', '=', $sid)->where('mcsc_day', '=', $day)->where('mcsc_month', '=', $month)->where('mcsc_year', '=', $year)->avg('mcsc_players');
		return round($avg, 1);

	}
	
    public static function isOnline($ip, $port, $timeout = 1){

		$Info = false;
		$Query = null;

		try
		{
			$Query = new MinecraftPing($ip, $port, $timeout);

			$Info = $Query->Query( );

			if( $Info === false )
			{

				$Query->Close( );
				$Query->Connect( );

				$Info = $Query->QueryOldPre17( );
			}
		}
		catch( MinecraftPingException $e )
		{
			$Exception = $e;
		}

		if( $Query !== null )
		{
			$Query->Close( );
		}
		
		if($Info === false){
			return false;
		} else {
			return true;
		}
	}
	
    public static function checkNoQuery($sid, $ip, $port, $day, $month, $year, $timeout = 2){

		$timer = MicroTime( true );

		$info = false;
		$query = null;

		try
		{
			$query = new MinecraftPing($ip, $port, $timeout);

			$info = $query->Query( );

			if( $info === false )
			{

				$query->Close( );
				$query->Connect( );

				$info = $query->QueryOldPre17( );
			}
		}
		catch( MinecraftPingException $e )
		{
			$Exception = $e;
		}

		if( $query !== null )
		{
			$query->Close( );
		}

		$timer = Number_Format( MicroTime( true ) - $timer, 2, '.', '' );
		
		if($info == false){
			DB::table('mcserverschecks')->insert(
				array('mcsc_sid' => $sid,
					  'mcsc_online' => 0,
					  'mcsc_players' => 0,
					  'mcsc_ping' => 0,
					  'mcsc_day' => $day,
					  'mcsc_month' => $month,
					  'mcsc_year' => $year)
			);
			DB::table('mcservers')->where('mcs_id', $sid)->update(
				array('mcs_players' => 0,
					  'mcs_status' => 0)
			);
		} else {
			DB::table('mcserverschecks')->insert(
				array('mcsc_sid' => $sid,
					  'mcsc_online' => 1,
					  'mcsc_players' => $info["players"]["online"],
					  'mcsc_ping' => $timer,
					  'mcsc_day' => $day,
					  'mcsc_month' => $month,
					  'mcsc_year' => $year)
			);
			DB::table('mcservers')->where('mcs_id', $sid)->update(
				array('mcs_maxplayers' => $info["players"]["max"],
					  'mcs_players' => $info["players"]["online"],
					  'mcs_status' => 1,
					  'mcs_motd' => mcservers::motd(substr($info["description"], 0, 255))
			));
		}
	}
		
    public static function checkQuery($sid, $ip, $port, $day, $month, $year, $timeout = 2){

		$timer = MicroTime( true );

		$query = new MinecraftQuery( );

		try
		{
			$query->Connect($ip, $port, $timeout);
		}
		catch( MinecraftQueryException $e )
		{
			$Exception = $e;
		}

		$timer = Number_Format( MicroTime( true ) - $timer, 2, '.', '' );
		
		return $query;
		
		$info = $query->GetInfo();
		
		if($info === false){
			DB::table('mcserverschecks')->insert(
				array('mcsc_sid' => $sid,
					  'mcsc_online' => 0,
					  'mcsc_players' => 0,
					  'mcsc_ping' => 0,
					  'mcsc_day' => $day,
					  'mcsc_month' => $month,
					  'mcsc_year' => $year)
			);
			DB::table('mcservers')->where('mcs_id', $sid)->update(
				array('mcs_players' => 0,
					  'mcs_status' => 0)
			);
		} else {
			DB::table('mcserverschecks')->insert(
				array('mcsc_sid' => $sid,
					  'mcsc_online' => 1,
					  'mcsc_players' => $info["Players"],
					  'mcsc_ping' => $timer,
					  'mcsc_day' => $day,
					  'mcsc_month' => $month,
					  'mcsc_year' => $year)
			);
			DB::table('mcservers')->where('mcs_id', $sid)->update(
				array('mcs_maxplayers' => $info["MaxPlayers"],
					  'mcs_players' => $info["Players"],
					  'mcs_status' => 1,
					  'mcs_map' => substr($info["Map"], 0, 50),
					  'mcs_plugins' => substr($info["Plugins"], 0, 255),
					  'mcs_motd' => mcservers::motd(substr($info["HostName"], 0, 255))
			));
		}
	}
}