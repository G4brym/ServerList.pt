<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	
	public function showIndex()
	{
		$title=settings::get("siteName") . "";
		return View::make('index.index')->with('title', $title);
	}
	
	public function showMinecraftList()
	{
		$title=settings::get("siteName") . " - Minecraft";
		return View::make('index.minecraftList')->with('title', $title);
	}
	
	public function cron()
	{
		return View::make('index.checkCron');
	}
	
	public function dcron()
	{
		return View::make('index.dailyCron');
	}

}
