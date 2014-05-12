<?php
	
	class Amisade extends DB{
		
		static $strIdAmigos = null;

		static function list_amigos($idExtrangeiro){
			
			$selAmigos= self::getConn()->prepare('SELECT u.id, u.nome, u.sobrenome, u.imagem FROM usuarios u INNER JOIN amisade a ON (((u.id=a.de) AND (a.para=?)) OR ((u.id=a.para) AND (a.de=?))) AND a.status=1');
			$selAmigos->execute(array($idExtrangeiro,$idExtrangeiro));
			$d['num'] = $selAmigos->rowCount();
			$d['dados'] = $selAmigos->fetchAll();
			
			self::$strIdAmigos = self::strIdAmigos($d['dados']);

			return $d;
		}
		
		static function solicitacao($idDaSessao,$idExtrangeiro){
			$sql = self::getConn()->prepare('SELECT * FROM `amisade` WHERE (de=? AND para=?) OR (para=? AND de=?) LIMIT 1');
			$sql->execute(array($idDaSessao,$idExtrangeiro,$idDaSessao,$idExtrangeiro));
			
			if($sql->rowCount()==0){
				$d['r'] = 0;
			}else{
				$st = $sql->fetch(PDO::FETCH_ASSOC);
				$d['id'] = $st['id'];
				
				if($st['status']==0){
					$d['r'] = 1;
				}else{
					$d['r'] = 2;
				}
			}
			
			return $d;			
		}
		
		
		static function setAmigo($de,$para){
			
			$sql = self::getConn()->prepare('SELECT * FROM `amisade` WHERE (de=? AND para=?) OR (para=? AND de=?) LIMIT 1');
			$sql->execute(array($de,$para,$de,$para));
			
			if($sql->rowcount()==0){
			
				$convite = self::getConn()->prepare('INSERT INTO `amisade` SET `de`=?, `para`=?');
				
				return $convite->execute(array($de,$para));
			
			}
		}
		
		static function delAmigo($id){						
			$del = DB::getConn()->prepare('DELETE FROM `amisade` WHERE `id`=?');
			return $del->execute(array($id));
		}
		
		static function aceitarAmigo($id){
			$convite = self::getConn()->prepare('UPDATE `amisade` SET `status`=1 WHERE `id`=?');
			return $convite->execute(array($id));
		}

		static function strIdAmigos($amigos){

			$ids = array();

			foreach ($amigos as $value) {
				array_push($ids, $value['id']);
			}

			return implode(',', $ids);
		}
		
	}
	
	