<?php
	class DiasJustificadosD{

		// BUSCAMOS
		function mostrar_dfaltados($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_dfaltados('%".$obj->getObservacion()."%')";
			return $objCn->ejecutar($sql);	
		}

		// BUSCAMOS PARA EDITAR
		function buscar_dfaltadoxid($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_dfaltadosxid('".$obj->getIdfaltado()."')";
			return $objCn->ejecutar($sql);	
		}

		// INSERTAMOS
		function insertar_dfaltado($obj){
			$objCn = new Conexion();
			$sql = "call pa_ins_dfaltado('".$obj->getFinicio()."','".$obj->getFtermino()."','".$obj->getObservacion()."')";
			return $objCn->ejecutar($sql);	
		}

		// MODIFICAMOS 
		function modificar_dfaltado($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_dfaltados('".$obj->getFinicio()."','".$obj->getFtermino()."','".$obj->getObservacion()."','".$obj->getIdfaltado()."')";
			return $objCn->ejecutar($sql);	
		}

		// CAMBIAMOS DE ESTADO
		function estado_dfaltado($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_dfaltados_estado('".$obj->getEstado()."','".$obj->getIdfaltado()."')";
			return $objCn->ejecutar($sql);	
		}

	}
?>