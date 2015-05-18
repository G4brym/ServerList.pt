<?php
Class utilities {

    public static function MCSVhasBanner($id){
		
		if(file_exists(public_path()."/resources/images/minecraft/banners/".$id.".png") || file_exists(public_path()."/resources/images/minecraft/banners/".$id.".jpg") || file_exists(public_path()."/resources/images/minecraft/banners/".$id.".gif")){
			return true;
		} else {
			return false;
		}
    }
	
    public static function MCSVhasBackground($id){
		
		if(file_exists(public_path()."/resources/images/minecraft/background/".$id.".jpg")){
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