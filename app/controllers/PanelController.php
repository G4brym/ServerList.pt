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
		$rules = array('serverName' => 'required|max:100', 'serverDesc' => 'required|max:255', 'serverIp' => 'max:35', 'serverPort' => 'max:6', 'serverAliase' => 'max:100', 'banner' => 'image|image_size:=468,=60');
		
		$v = Validator::make($input, $rules);
		if ($v->passes())
		{
			
			if(count(DB::table('mcservers')->where('mcs_ip', '=', $input['serverIp'])->where('mcs_port', '=', $input['serverPort'])->first())){
				return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("O IP deste servidor já está registado, entra em contacto com a staff se achas que isto é um erro");
			}
			
			if(isset($input['serverV'])){
				$input['serverV'] = 1;
				if($input['serverVPort'] == null){
					return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("Para ativar o Votifier tens de preencher a porta");
				}
				if($input['serverVPKey'] == null){
					return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("Para ativar o Votifier tens de preencher a Public Key");
				}
			} else {
				$input['serverV'] = 0;
			}
			
			if(Input::hasFile('banner')){
				$image = Input::file('banner');

				if($image->getClientOriginalExtension != "jpg" && $image->getClientOriginalExtension != "png" && $image->getClientOriginalExtension != "gif"){
					return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("As extenções permitidas para os banners são .jpg, .png e .gif");
				}
			}

			DB::table('mcservers')->insert(
				array('mcs_uid' => Auth::user()->id,
					  'mcs_name' => $input['serverName'],
					  'mcs_desc' => $input['serverDesc'],
					  'mcs_website' => $input['serverSite'],
					  'mcs_msg' => $input['serverMsg'],
					  'mcs_ip' => $input['serverIp'],
					  'mcs_port' => $input['serverPort'],
					  'mcs_aliase' => $input['serverAliase'],
					  'mcs_votifier' => $input['serverV'],
					  'mcs_vport' => $input['serverVPort'],
					  'mcs_votifierkey' => $input['serverVPKey'])
			);

			$id = DB::table('mcservers')->where('mcs_ip', '=', $input['serverIp'])->where('mcs_port', '=', $input['serverPort'])->first();
			DB::table('logs')->insert(
				array('logs_action' => 'New Server ' . $id->mcs_id, 'logs_userId' => Auth::User()->id, 'logs_ip' => $_SERVER["HTTP_CF_CONNECTING_IP"])
			);

			if(Input::hasFile('banner')){
				$filename  = $id->mcs_id . '.' . $image->getClientOriginalExtension();
				$publicpath = public_path('resources/images/minecraft/banners/' . $filename);
				Image::make($image->getRealPath())->save($publicpath);
			}

			return Redirect::to(URL::to("/panel/servers"))->With('success', 'Servidor Adicionado.');

		} else {

			return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors($v);

		}
	}
	
	public function postUpdateMCServer()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();
		$rules = array('serverName' => 'required|max:100', 'serverDesc' => 'required|max:255', 'serverIp' => 'max:35', 'serverPort' => 'max:6', 'serverAliase' => 'max:100');
		
		$v = Validator::make($input, $rules);
		if ($v->passes())
		{
			
			$id = DB::table('mcservers')->where('mcs_id', '=', $input['sid'])->where('mcs_uid', '=', Auth::user()->id)->first();
			if(!count($id)){
				return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("Ocorreu um erro com a validação do servidor");
			}
			
			if(isset($input['serverV'])){
				$input['serverV'] = 1;
				if($input['serverVPort'] == null){
					return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("Para ativar o Votifier tens de preencher a porta");
				}
				if($input['serverVPKey'] == null){
					return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("Para ativar o Votifier tens de preencher a Public Key");
				}
			} else {
				$input['serverV'] = 0;
			}
			
			if(Input::hasFile('banner')){
				$image = Input::file('banner');

				if($image->getClientOriginalExtension != "jpg" && $image->getClientOriginalExtension != "png" && $image->getClientOriginalExtension != "gif"){
					return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("As extenções permitidas para os banners são .jpg, .png e .gif");
				}
			}

			DB::table('mcservers')->where('mcs_id', '=', $id->mcs_id)->update(
				array('mcs_name' => $input['serverName'],
					  'mcs_desc' => $input['serverDesc'],
					  'mcs_website' => $input['serverSite'],
					  'mcs_msg' => $input['serverMsg'],
					  'mcs_aliase' => $input['serverAliase'],
					  'mcs_votifier' => $input['serverV'],
					  'mcs_vport' => $input['serverVPort'],
					  'mcs_votifierkey' => $input['serverVPKey'])
			);

			DB::table('logs')->insert(
				array('logs_action' => 'Updated Server ' . $id->mcs_id, 'logs_userId' => Auth::User()->id, 'logs_ip' => $_SERVER["HTTP_CF_CONNECTING_IP"])
			);

			if(Input::hasFile('banner')){
				$filename  = $id->mcs_id . '.' . $image->getClientOriginalExtension();
				$publicpath = public_path() . 'resources/images/minecraft/banners/' . $filename;
				Image::make($image->getRealPath())->save($publicpath);
				return Redirect::to(URL::to("/panel/servers"))->With('success', 'Servidor e Banner Atualizado.');
			}

			return Redirect::to(URL::to("/panel/servers"))->With('success', 'Servidor Atualizado.');

		} else {

			return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors($v);

		}
	}
}