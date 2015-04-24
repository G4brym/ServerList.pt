<?php

class PanelController extends BaseController {

	public function showIndex()
	{
		$title=settings::get("siteName") . " - Painel";
		return View::make('panel.index')->with('title', $title);
	}
	
	public function showServers()
	{
		$title=settings::get("siteName") . " - Servidores";
		return View::make('panel.servers')->with('title', $title);
	}
	
	public function showNewMCServer()
	{
		$title=settings::get("siteName") . " - Adicionar Servidor";
		return View::make('panel.newMCServer')->with('title', $title);
	}
	
	public function showMCServer($id)
	{
		if(count(DB::table('mcservers')->where('mcs_id', '=', $id)->where('mcs_uid', '=', Auth::User()->id)->first())){
			$title=settings::get("siteName") . " - Servidor De Minecraft";
			return View::make('panel.MCServer')->with('title', $title)->with('id', $id);
		} else {
			return Redirect::to(URL::to('/panel/servers'));
		}
	}
	
	public function postNewMCServer()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();
		$rules = array('serverName' => 'required|max:100', 'serverDesc' => 'required|max:255', 'serverIp' => 'max:35', 'serverPort' => 'max:6', 'serverAliase' => 'max:100', 'serverType' => 'required');
		
		$v = Validator::make($input, $rules);
		if ($v->passes())
		{
			
			if(count(DB::table('mcservers')->where('mcs_ip', '=', $input['serverIp'])->where('mcs_port', '=', $input['serverPort'])->first())){
				return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("O IP deste servidor já está registado");
			}
			
			if(isset($input['serverV'])){
				if($input['serverVPort'] == null){
					return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("Para ativar o Votifier tens de preencher a porta");
				}
				if($input['serverVPKey'] == null){
					return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("Para ativar o Votifier tens de preencher a Public Key");
				}
			}
			
			DB::table('mcservers')->insert(
				array('mcs_uid' => Auth::user()->id,
					  'mcs_ip' => $input['serverIp'],
					  'mcs_port' => $input['serverPort'],
					  'mcs_aliase' => $input['serverAliase'],
					  'mcs_type' => $input['serverType'])
			);

			$id = DB::table('mcservers')->where('mcs_ip', '=', $input['serverIp'])->where('mcs_port', '=', $input['serverPort'])->first();
			DB::table('logs')->insert(
			    array('logs_action' => 'New Server', 'logs_userId' => $id->mcs_uid, 'logs_ip' => "inserir mais tarde ip da cloudflare")
			);

			return Redirect::to(URL::to("/panel/servers"))->With('success', 'Servidor Adicionado.');

		} else {

			return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors($v);

		}
	}
}