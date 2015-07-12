<?php
Class utilities {

    public static function clearCloudflareImageBackground($id, $game){
		
		$url = 'https://api.cloudflare.com/client/v4/zones/40eb82fbbe2f186919d09a09eb4566d1/purge_cache';

		$curl_options = array(
			CURLOPT_VERBOSE        => false,
			CURLOPT_FORBID_REUSE   => true,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_HEADER         => false,
			CURLOPT_TIMEOUT        => 5,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_FOLLOWLOCATION => true
		);
		
		switch ($game) {
			case "minecraft":
				$data = array("files" => ["https://www.serverlist.pt/resources/images/minecraft/backgrounds/".$id.".jpg"]);
				break;
			case csgo:
				$data = array("files" => ["https://www.serverlist.pt/resources/images/minecraft/backgrounds/".$id.".jpg"]);
				break;
		}

		$headers = array("X-Auth-Email: g4bryrm98@hotmail.com", "X-Auth-Key: a29025fc9dcffc8390257cd17b5bf1383be6e");

		$ch = curl_init();

		curl_setopt_array($ch, $curl_options);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		$headers[] = "Content-type: application/json";

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_URL, $url);

		$test = curl_exec($ch);

		curl_close($ch);

    }
	
    public static function MCSVhasBanner($id){
		
		if(file_exists(public_path()."/resources/images/minecraft/banners/".$id.".png") || file_exists(public_path()."/resources/images/minecraft/banners/".$id.".jpg") || file_exists(public_path()."/resources/images/minecraft/banners/".$id.".gif")){
			return true;
		} else {
			return false;
		}
    }
	
    public static function log ($action, $userid = null){
		
		if($userid == null){
			$userid = Auth::User()->id;
		}
		
		DB::table('logs')->insert(
		    array('logs_action' => $action, 'logs_userId' => $userid, 'logs_ip' => $_SERVER["HTTP_CF_CONNECTING_IP"])
		);
	
    }
	
    public static function MCSVhasBackground($id){
		
		if(file_exists(public_path()."/resources/images/minecraft/backgrounds/".$id.".jpg")){
			return true;
		} else {
			return false;
		}
    }
	
    public static function getMCBanner($id){
		
		if(!utilities::MCSVhasBanner($id)){
			return URL::to('/resources/images/minecraft/banners/default-banner.jpg');
		} else {
			if(file_exists(public_path()."/resources/images/minecraft/banners/".$id.".png")){
				return URL::to('/resources/images/minecraft/banners/'.$id.'.png');
			} elseif(file_exists(public_path()."/resources/images/minecraft/banners/".$id.".jpg")){
				return URL::to('/resources/images/minecraft/banners/'.$id.'.jpg');
			} elseif(file_exists(public_path()."/resources/images/minecraft/banners/".$id.".gif")){
				return URL::to('/resources/images/minecraft/banners/'.$id.'.gif');
			}
		}
    }
}