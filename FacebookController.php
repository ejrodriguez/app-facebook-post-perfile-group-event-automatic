<?php
</php>public function share()
		{
			$msg="";
			$token="";
			if (Request::ajax()) {
				if (Input::get('ids')!=null)
				{	
					//ides, lista de los ID de cada grupo, evento, perfil, para publicar
					$ides = Input::get('ids');
					$idcuenta = Input::get('idcuenta');
					$mensaje =Input::get('mensaje');
					$link = Input::get('link');
					$descripcion =Input::get('descripcion');
					//-- obtener session
					$idcuenta = Account::where('id', '=',$idcuenta)->get(array('access_token_fb'));
					//recorre una sola ver ya que se obtiene una sola cuenta. 
					foreach ($idcuenta as $identificador) {
						$token = $identificador->access_token_fb;
					}
					//obtener la sessión fb. 
					$sessionfb = $this->fb->generateSessionFromToken($token);
					//--------------------
					foreach ($ides as $id) {
						$msg =$msg.$this->fb->postaccount($id,$link,$mensaje,$descripcion,$sessionfb)."</br>";
					}				
						return Response::json(array(
				                    'success'         =>   'true',
				                    'msg'         =>  $msg
				                    ));
				}
					else
					{
						return Response::json(array(
				                    'success'         =>     'false',
				                    'msg'         =>     'ID de cuentas no obtenidas'
				                    ));
					}
			}
			
		}
?>
