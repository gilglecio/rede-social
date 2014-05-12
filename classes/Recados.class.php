<?php
	class Recados extends DB{
		
		static function setRecado($de,$para,$recado){
			
			$inserir = self::getConn()->prepare('INSERT INTO `recados` SET `de`=?, `para`=?, `recado`=?, `data`=NOW()');
			
			$para = ($para=='selecionar') ? 'amigos' : $para;
			
			if(is_array($para)){
				$num = count($para);
				for($r=0;$r<$num;$r++){
					$inserir->execute(array($de,$para[$r],$recado));
				}
			}else{
				$inserir->execute(array($de,$para,$recado));
			}	
		}
		
		static function getRecados($idExtrangeiro){
			
			$select = self::getConn()->prepare("
			SELECT u.id, u.nome, u.sobrenome, u.imagem, a.de, a.para, r.id, r.recado, r.de, r.para, r.data, r.status FROM usuarios u 
			INNER JOIN amisade a ON (((u.id=a.de) AND (a.para=?)) OR ((u.id=a.para) AND (a.de=?)))
			INNER JOIN recados r ON ((r.de=u.id) AND (r.para='publico' OR r.para='amigos' OR r.para=?) AND r.status=1) AND a.status=1 ORDER BY r.data DESC");
						
			$select->execute(array($idExtrangeiro,$idExtrangeiro,$idExtrangeiro));
			
			$d['num'] = $select->rowCount();
			$d['dados'] = $select->fetchAll();
			
			return $d;
		}
		
	}