<?php

use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;


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
		
		if($Info === false){
			return false;
		} else {
			return true;
		}
	}
}