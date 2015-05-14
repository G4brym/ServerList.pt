<?php

Class banners {

    public static function generateMC(){

		//carrega as Tools
		$offline = imagecreatefrompng(app_path() . '/tools/banners/offline.png');
		$online = imagecreatefrompng(app_path() . '/tools/banners/online.png');
		$backgorund = imagecreatefromjpeg(app_path() . '/tools/banners/background.jpg');
		$statusText = 'Online';
		$verdana = app_path() . '/tools/banners/Verdana.ttf';
		$verdanab = app_path() . '/tools/banners/Verdana_Bold.ttf';
		$grey = imagecolorallocate($backgorund, 197, 202, 233);
		$black = imagecolorallocate($backgorund, 0, 0, 0);
		$white = imagecolorallocate($backgorund, 255, 255, 255);

		imagecopymerge($backgorund, $online, 378, 30, 0, 0, 90, 30, 65);

		$servers = DB::table('mcservers')->get();
		
		foreach($servers as $server){
			
			$backgorund = imagecreatefromjpeg(app_path() . '/tools/banners/background.jpg');
			$name = $server->mcs_name;
			$players = $server->mcs_players . ' / ' . $server->mcs_maxplayers . ' Players';
			
			if($server->mcs_status == 1){
				$statusText = 'Online';
				$status = $online;
			} else {
				$statusText = 'Offline';
				$status = $offline;
			}
			
			if($server->mcs_aliase == null){
				$ip = $server->mcs_ip;
			} else {
				$ip = $server->mcs_aliase;
			}
			
			
			imagecopymerge($backgorund, $status, 378, 30, 0, 0, 90, 30, 65);

			imagettftext($backgorund, 20, 0, 380, 55, $black, $verdana, $statusText);
			imagettftext($backgorund, 15, 0, 65, 20, $grey, $verdana, $name);
			imagettftext($backgorund, 10, 0, 65, 45, $white, $verdanab, $ip);
			imagettftext($backgorund, 11, 0, 320, 20, $white, $verdanab, $players);
			
			imagejpeg($backgorund, public_path() . "/resources/images/minecraft/generatedBanners/" . $server->mcs_id . ".jpg", 100);
			
		}
    }
}