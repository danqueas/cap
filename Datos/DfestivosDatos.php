<?php
	class DiasFestivosD{

		// BUSCAMOS
		function mostrar_dfestivos($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_dfestivos('%".$obj->getNombre()."%')";
			return $objCn->ejecutar($sql);	
		}

		function mostrar_tipotrabajador()
		{
			$objCn	= new Conexion();
			$sql 	= "SELECT * from tipotrabajador where estado = 'A'";
			return $objCn->ejecutar($sql);
		}

		// BUSCAMOS PARA EDITAR
		function buscar_dfestivosxid($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_dfestivosxid('".$obj->getIdfestivo()."')";
			return $objCn->ejecutar($sql);	
		}

		// INSERTAMOS
		function insertar_dfestivos($obj){
			$objCn = new Conexion();
			$sql = "call pa_ins_dfestivos('".$obj->getFecha()."','".$obj->getNombre()."','".$obj->getTipotrabajador()."')";
			return $objCn->ejecutar($sql);	
		}

		// MODIFICAMOS 
		function modificar_dfestivos($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_dfestivos('".$obj->getFecha()."','".$obj->getNombre()."','".$obj->getTipotrabajador()."','".$obj->getIdfestivo()."')";
			return $objCn->ejecutar($sql);	
		}

		// CAMBIAMOS DE ESTADO
		function estado_dfestivos($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_dfestivos_estado('".$obj->getEstado()."','".$obj->getIdfestivo()."')";
			return $objCn->ejecutar($sql);	
		}

	}
?>