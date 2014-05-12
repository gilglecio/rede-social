<?php

	/*
	tipo = array{
		0=>'alterações de perfil'
		1=>'adição de fotos'
		2=>'comentario'
	}
	*/

	class Notificacoes extends DB{

		static $arr = array();

		static function add($uid, $tipo, $result){

			$query = self::getConn()->prepare('insert into notificacoes set uid=?, tipo=?, `result`=?');
			return $query->execute(array($uid,$tipo,$result));

		}

		static function listar(){

			$strIdAmigos = Amisade::$strIdAmigos;

			$query = self::getConn()->query('select * from notificacoes where uid in ('.$strIdAmigos.')');

			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		static function tratarFoto($value){

			extract($value);

			$arr_result = explode(':', $result);

			if(!isset(self::$arr['users'][$uid])){
				$objLogin = new Login;
				$user = $objLogin->getDados($uid,'nome,sobrenome,imagem');
				self::$arr['users'][$uid]['id'] = $uid;
				self::$arr['users'][$uid]['nome'] = $user['nome'].' '.$user['sobrenome'];
				self::$arr['users'][$uid]['imagem'] = $user['imagem'];
			}

			if(!isset(self::$arr['tratarFoto'][$arr_result[0]])){
				$album = Albuns::getAlbum($arr_result[0],'titulo',false);
				self::$arr['tratarFoto'][$arr_result[0]] = $album['album'];
			}else{
				foreach (self::$arr['users'][$uid] as $key => $value) {
					self::$arr['tratarFoto'][$arr_result[0]]['user_'.$key] = $value;
				}
			}

			self::$arr['tratarFoto'][$arr_result[0]]['fotos'][] = $arr_result[1];

			foreach (self::$arr['tratarFoto'] as $idAlbum => $campos) {
				self::$arr['tratarFoto'][$idAlbum]['nFotos'] = count($campos['fotos']);
			}
		}

		/*
		arr=>array{
			0=>array{
				tratarFoto=>array{
					userId,
					albumTitulo,
					albumId,
					nFotos,
					fotos=>array{...},
					data=>2011-12-06 H:i:s
				}
			}
		}
		*/

	}