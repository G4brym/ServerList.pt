<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout() {
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	
	public function showIndex() {
		$title=settings::get("siteName") . "";
		return View::make('index.index')->with('title', $title);
	}
	
	public function showMinecraftList() {
		$title=settings::get("siteName") . " - Minecraft";
		return View::make('index.minecraftList')->with('title', $title);
	}
	
	public function cron() {
		return View::make('index.checkCron');
	}
	
	public function dcron() {
		return View::make('index.dailyCron');
	}
	
	public function postVote() {
		
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();
		$rules = array('username' => 'required|max:40', 'g-recaptcha-response' => 'required|recaptcha');
		$v = Validator::make($input, $rules);
		if($v->fails())
		{
			
			return Redirect::to('/login')->withErrors($v);
			
		} else {

			if(filter_var($input['user'], FILTER_VALIDATE_EMAIL)) {
				$credentials = array('email' => $input['user'], 'password' => $input['password']);
			}
			else {
				$credentials = array('id' => $input['user'], 'password' => $input['password']);
			}

			if(Auth::attempt($credentials))
			{

				$user = Auth::user();
				$user->lastlogin = time();
				$user->save();
				return Redirect::to('/');

			} else {

				return Redirect::to('/login')->withErrors('Login invalido');

			}
		}
	}
}
