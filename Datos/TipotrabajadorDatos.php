<?php
	class TipoTrabajadorD{

		// BUSCAMOS
		function mostrar_ttrabajador($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_ttrabajador('%".$obj->getNtipotrabajador()."%')";
			return $objCn->ejecutar($sql);	
		}

		// BUSCAMOS PARA EDITAR
		function buscar_ttrabajadorxid($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_ttrabajadorxid('".$obj->getIdtipotrabajador()."')";
			return $objCn->ejecutar($sql);	
		}

		// INSERTAMOS
		function insertar_ttrabajador($obj){
			$objCn = new Conexion();
			$sql = "call pa_ins_ttrabajador('".$obj->getNtipotrabajador()."','".$obj->getDescripcion()."')";
			return $objCn->ejecutar($sql);	
		}

		// MODIFICAMOS 
		function modificar_ttrabajador($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_ttrabajador('".$obj->getNtipotrabajador()."','".$obj->getDescripcion()."','".$obj->getIdtipotrabajador()."')";
			return $objCn->ejecutar($sql);	
		}

		// CAMBIAMOS DE ESTADO
		function estado_ttrabajador($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_ttrabajador_estado('".$obj->getEstado()."','".$obj->getIdtipotrabajador()."')";
			return $objCn->ejecutar($sql);	
		}

	}
?>