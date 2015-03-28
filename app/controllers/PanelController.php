<?php

class PanelController extends BaseController {

	public function showIndex()
	{
		$title=settings::get("siteName") . " - Painel";
		return View::make('panel.index')-> with('title', $title);
	}
}