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
		$rules = array('MCUsername' => 'required|max:40', 'g-recaptcha-response' => 'required|recaptcha', 'sid' => 'required');
		$v = Validator::make($input, $rules);
		
		$sid = $input['sid'];
		$server = DB::table('mcservers')->where('mcs_id', '=', $sid)->first();

		if(!count($server)){
			return Redirect::to('/minecraft/'.$sid)->withErrors("Ocorreu um erro com a validação do servidor");
		}
		
		if($v->passes())
		{
			
			if(mcservers::playerHasVoted($input['MCUsername']) || mcservers::ipHasVoted($_SERVER["HTTP_CF_CONNECTING_IP"])){
				return Redirect::to('/minecraft/'.$sid)->withErrors("Já votaste hoje");
			}
			
			if($server->mcs_votifier == 1){
				$votifier = Votifier::newVote($server->mcs_vip, $server->mcs_vport, $server->mcs_votifierkey, $input['MCUsername']);
				
				if($votifier == false){
					return Redirect::to('/minecraft/'.$sid)->withErrors("Não foi possivel enviar o voto para o servidor, porfavor contacta o admininstrador do mesmo");
				}
			}
			
			DB::table('mcservers')->where('mcs_id', $sid)->update(
				array('mcs_tvotes' => $server->tvotes + 1,
					  'mcs_mvotes' => $server->mvotes + 1
			));
			
			DB::table('mcserversvotes')->insert(
				array('mcsc_sid' => $sid,
					  'mcsc_username' => $input['MCUsername'],
					  'mcsc_ip' => $_SERVER["HTTP_CF_CONNECTING_IP"],
					  'mcsc_day' => date("j"),
					  'mcsc_month' => date("n"),
					  'mcsc_year' => date("Y"),
			));
			
			
			
			
			return Redirect::to('/minecraft/'.$sid)->With('success', 'Voto Registado!');
			
		} else {

			return Redirect::to('/minecraft/'.$sid)->withErrors($v);

		}
	}
}
