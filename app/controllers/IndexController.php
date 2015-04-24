<?php

class IndexController extends BaseController {

	public function showUser($id)
	{
		if(count(DB::table('users')->where('id', '=', $id)->first())) {
			$user = DB::table('users')->where('id', '=', $id)->first();
		} else {
			$user = Auth::user();
		}
		$title=settings::get("siteName") . " - " . $user->firstName . " " . $user->lastName;
		return View::make('index.userProfile')->with('title', $title)->with('id', $user->id);
	}

	public function showOwnUser()
	{
		$title=settings::get("siteName") . " - " . Auth::user()->firstName . " " . Auth::user()->lastName;
		return View::make('index.userProfile')->with('title', $title)->with('id', Auth::user()->id);
	}
	
	public function showMCServer($id)
	{
		if(count(DB::table('mcservers')->where('mcs_id', '=', $id)->first())){
			$title=settings::get("siteName") . " - Servidor De Minecraft";
			return View::make('index.MCServer')->with('title', $title)->with('id', $id);
		} else {
			return Redirect::to(URL::to('/minecraft'));
		}

	}

}