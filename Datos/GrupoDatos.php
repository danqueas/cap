<?php
	class GrupoD{
	//getIdgrupo
	//getNgrupo
	//getEstado
		// BUSCAMOS
		function mostrar_grupo($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_grupo('%".$obj->getNgrupo()."%')";
			return $objCn->ejecutar($sql);	
		}

		// BUSCAMOS PARA EDITAR
		function buscar_grupoxid($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_grupoxid('".$obj->getIdgrupo()."')";
			return $objCn->ejecutar($sql);	
		}

		// INSERTAMOS
		function insertar_grupo($obj){
			$objCn = new Conexion();
			$sql = "call pa_ins_grupo('".$obj->getNgrupo()."')";
			return $objCn->ejecutar($sql);	
		}

		// MODIFICAMOS 
		function modificar_grupo($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_grupo('".$obj->getNgrupo()."','".$obj->getIdgrupo()."')";
			return $objCn->ejecutar($sql);	
		}

		// CAMBIAMOS DE ESTADO
		function estado_grupo($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_grupo_estado('".$obj->getEstado()."','".$obj->getIdgrupo()."')";
			return $objCn->ejecutar($sql);	
		}

		// HORARIOS X GRUPO
		function horario_grupo($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_turnosxgrupo('".$obj->getIdgrupo()."')";
			return $objCn->ejecutar($sql);	
		}

		// HORARIOS FALTANTAS X GRUPO
		function horariofaltante_grupo($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_turnosfaltantesxgrupo('".$obj->getIdgrupo()."')";
			return $objCn->ejecutar($sql);	
		}

	}
?>