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
			return Redirect::to("https://www.serverlist.pt/communities");
		}
	}

	public function showBlog($name)
	{
		$cm = DB::table('communities')->where('cm_url', '=', $name)->first();
		if(count($cm)) {
			$title=$cm->cm_name . " - Blog";
			return View::make('cm.blog')->with('title', $title)->with('cm', $cm);
		} else {
			return Redirect::to("https://www.serverlist.pt/communities");
		}
	}

	public function showBlogPost($name, $pid)
	{
		$cm = DB::table('communities')->where('cm_url', '=', $name)->first();
		if(count($cm)) {
			$post = DB::table('cm_blogposts')->where('cmbp_id', '=', $pid)->where('cmbp_cmid', '=', $cm->cm_id)->first();
			if(count($post)) {
				$title=$cm->cm_name . " - " . $post->cmbp_title;
				return View::make('cm.blogPost')->with('title', $title)->with('cm', $cm)->with('post', $post);
			} else {
				return Redirect::to("https://www.serverlist.pt/communities");
			}
		} else {
			return Redirect::to("https://www.serverlist.pt/communities");
		}
	}
}