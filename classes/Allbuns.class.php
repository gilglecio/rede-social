<?php
	class Albuns extends DB{
		
		
		static function newAlbum($usuario,$titulo,$descricao,$permissao){
			
			$criar  = self::getConn()->prepare('INSERT INTO `albuns` SET `usuario`=?,`titulo`=?, `descricao`=?,`permissao`=? ,`data`=NOW()');
			$criar->execute(array($usuario,$titulo,$descricao,$permissao));
			
			return self::getConn()->lastInsertId();
			
		}
		
		static function listAlbuns($usuario){
			
			$list = self::getConn()->prepare('SELECT * FROM `albuns` WHERE `usuario`=?');
			$list->execute(array($usuario));
			
			$d['num'] = $list->rowCount();
			$d['dados'] = $list->fetchAll();
			
			return $d;
			
		}
		
		private static function getFotos($album){
			
			$list = self::getConn()->prepare('SELECT * FROM `fotos` WHERE `album`=?');
			$list->execute(array($album));
			
			$d['num'] = $list->rowCount();
			$d['dados'] = $list->fetchAll();
			
			return $d;
		}
		
		static function getAlbum($album){
			
			$dados = self::getConn()->prepare('SELECT * FROM `albuns` WHERE `id`=? LIMIT 1');
			$dados->execute(array($album));
						
			if($dados->rowCount()){
				
				$f = self::getFotos($album);
				
				$d['fotos']['num'] = $f['num'];
				$d['fotos']['dados'] = $f['dados'];
				
				$d['album'] = $dados->fetch(PDO::FETCH_ASSOC);
				
				return $d;
				
			}else{
				return array();
			}
		}
		
		static function totalFotos($usuario){
			
			$albuns = self::listAlbuns($usuario);
			
			$totalfotos = 0;
			
			foreach($albuns['dados'] as $albuns):
			
				$fotos = self::getFotos($albuns['id']);
				$totalfotos += $fotos['num'];
			
			endforeach;
			
			return $totalfotos;		
			
		}
		
		static function meuAlbum($album,$usuario){
			
			$sel = self::getConn()->prepare('SELECT `id` FROM `albuns` WHERE `id`=? AND `usuario`=? LIMIT 1');
			$sel->execute(array($album,$usuario));
			
			return $sel->rowCount()==1 ? true : false;
			
		}
		
		static function minhaFoto($foto,$usuario){
			
			$sel = self::getConn()->prepare('SELECT `album`,`foto` FROM `fotos` WHERE `id`=? LIMIT 1');
			$sel->execute(array($foto));
			
			if($sel->rowCount()==1){
				
				$asFoto = $sel->fetch(PDO::FETCH_ASSOC);
				
				$d['res'] = self::meuAlbum($asFoto['album'],$usuario);
				$d['foto'] = $asFoto['foto'];
				
				return $d;
			}
			
		}
		
		static function delFoto($id){
			
			$del = self::getConn()->prepare('DELETE FROM `fotos` WHERE `id`=?');
			return $del->execute(array($id));
		}
		
		static function editFotos($foto, array $dados){
			
			if(!empty($dados)){
				
				$colunas= '`'.implode('`=?,`',array_keys($dados)).'`=?';
				
				array_push($dados,$foto);
				
				$del = self::getConn()->prepare("UPDATE `fotos` SET $colunas WHERE `id`=?");
				return $del->execute(array_values($dados));
			}
			
		}
		
		static function editAlbum( $album, array $dados){
			
			if(!empty($dados)){
				
				$colunas= '`'.implode('`=?,`',array_keys($dados)).'`=?';
				
				array_push($dados,$album);
				
				$del = self::getConn()->prepare("UPDATE `albuns` SET $colunas WHERE `id`=?");
				return $del->execute(array_values($dados));
				echo $id;
			}
			
			
		}
		
		static function addFotos($album,$usuario,$foto){
			
			if(self::meuAlbum($album,$usuario)){
				
				if(!isset($_SESSION['addcapaalbum'.$album])){
					
					$_SESSION['addcapaalbum'.$album] = true;
					
					$capa = self::getConn()->prepare('UPDATE `albuns` SET `capa`=? WHERE `id`=?');
					$capa->execute(array($foto,$album));
				
				}
			
				$inserir = self::getConn()->prepare('INSERT INTO `fotos` SET `album`=?,`foto`=?,`data`=NOW()');
				return $inserir->execute(array($album,$foto));	
			
			}else{
				return false;
			}
			
		}
		
	}