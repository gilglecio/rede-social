<?php

	class Notificacoes extends DB{

		static $tipo = array (
			0 => 'tratarPerfil',
			1 => 'tratarFoto',
			2 => 'tratarComentario',
			3 => 'tratarAmizade',
		);

		static $sessionTemp = 'sdfdsfsffsfff';

		static $cache = array();
		static $dados = array();

		public function __construct()
		{
			$notificacoes = self::listar();

            foreach ($notificacoes as $value) {
                
                switch ($value['tipo']) {
                    case 0:
                        self::tratarPerfil($value);
                        break;
                    case 1:
                        self::tratarFoto($value); 
                        break;
                    case 2:
                        self::tratarComentario($value);
                        break;
                    default:
                        # code...
                        break;
                }

            }
		}

		public function __destruct()
		{
			unset($_SESSION[self::$sessionTemp]);
		}

		static function add($uid, $tipo, $result)
		{
			$query = self::getConn()->prepare('insert into notificacoes set uid=?, tipo=?, `result`=?');
			return $query->execute(array($uid,$tipo,$result));
		}

		static function listar()
		{
			$strIdAmigos = Amizade::$strIdAmigos;

			if ( ! $strIdAmigos) {
				return array();
			}

			$query = self::getConn()->query('select * from notificacoes where uid in ('.$strIdAmigos.') order by id desc');
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		static function tratarFoto($value)
		{
			list($id, $tipo, $uid, $result, $data) = array_values($value);
			list($idAlbum, $fotoId, $fotoSRC) = explode(':', $result);

			self::setUser($uid);
			self::setAlbum($idAlbum);

			self::$cache['fotos'][$idAlbum][$fotoId] = $fotoSRC;

			$dados = array(
				'tipo' => self::$tipo[$tipo],
				'userId' => $uid,
				'userNome' => self::$cache['users'][$uid]['nome'],
				'userImagem' => self::$cache['users'][$uid]['imagem'],
				'albumId' => $idAlbum,
				'albumTitulo' => self::$cache['album'][$idAlbum]['titulo'],
				'data' => $data,
			);

			if ( ! isset($_SESSION[self::$sessionTemp]))
				$_SESSION[self::$sessionTemp] = array();

			if ( ! in_array($idAlbum, $_SESSION[self::$sessionTemp])) {
				self::$dados[] = $dados;
				array_push($_SESSION[self::$sessionTemp], $idAlbum);
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

		static function setUser($uid)
		{
			if ( ! isset(self::$cache['users'][$uid])) {

				$objLogin = new Login;
				$user = $objLogin->getDados($uid,'nome, sobrenome, imagem');

				self::$cache['users'][$uid]['nome'] = $user['nome'].' '.$user['sobrenome'];
				self::$cache['users'][$uid]['imagem'] = $user['imagem'] == '' ? 'default.png' : $user['imagem'];
			}
		}

		static function setAlbum($albumId)
		{
			if ( ! isset(self::$cache['album'][$albumId])) {

				$album = Albuns::getAlbum($albumId, 'titulo', false);
				self::$cache['album'][$albumId] = $album['album'];
			}
		}

	}