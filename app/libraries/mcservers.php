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
					  'mcs_motd' => substr($info["description"], 0, 255)
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
					  'mcs_motd' => substr($info["HostName"], 0, 255)
			));
		}
	}
}