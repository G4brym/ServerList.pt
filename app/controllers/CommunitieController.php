<?php

class CommunitieController extends Controller {

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

	public function showIndex($name)
	{
		$cm = DB::table('communities')->where('cm_url', '=', $name)->first();
		if(count($cm)) {
			$title=$cm->cm_name . " - Início";
			return View::make('cm.index')->with('title', $title)->with('cm', $cm);
		} else {
			return Redirect::to(URL::to('/comunidades'));
		}
	}

}