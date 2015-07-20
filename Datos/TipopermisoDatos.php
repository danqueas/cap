<?php
	class TipoPermisoD{

		// BUSCAMOS
		function mostrar_tpermiso($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_tipopermiso('%".$obj->getDescripcion()."%')";
			return $objCn->ejecutar($sql);	
		}

		// BUSCAMOS PARA EDITAR
		function buscar_tpermisoxid($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_tpermisoxid('".$obj->getIdtpermiso()."')";
			return $objCn->ejecutar($sql);	
		}

		// INSERTAMOS
		function insertar_tpermiso($obj){
			$objCn = new Conexion();
			$sql = "call pa_ins_tpermiso('".$obj->getDescripcion()."','".$obj->getNdias()."')";
			return $objCn->ejecutar($sql);	
		}

		// MODIFICAMOS 
		function modificar_tpermiso($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_tpermiso('".$obj->getDescripcion()."','".$obj->getNdias()."','".$obj->getIdtpermiso()."')";
			return $objCn->ejecutar($sql);	
		}

		// CAMBIAMOS DE ESTADO
		function estado_tpermiso($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_tpermiso_estado('".$obj->getEstado()."','".$obj->getIdtpermiso()."')";
			return $objCn->ejecutar($sql);	
		}

	}
?>