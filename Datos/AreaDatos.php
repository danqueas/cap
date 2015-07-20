<?php
	class AreaD{

		// BUSCAMOS ( TODAS LAS AREAS / POR NOMBRE )
		function mostrar_areas($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_area('%".$obj->getNombre()."%')";
			return $objCn->ejecutar($sql);	
		}

		// BUSCAMOS PARA EDITARC
		function buscar_areaxid($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_areaxid('".$obj->getIdarea()."')";
			return $objCn->ejecutar($sql);	
		}

		// INSERTAMOS UNA NUEVA AREA
		function insertar_area($obj){
			$objCn = new Conexion();
			$sql = "call pa_ins_area('".$obj->getNombre()."','".$obj->getDescripcion()."')";
			return $objCn->ejecutar($sql);	
		}

		// MODIFICAMOS UN AREA DETERMINADA
		function modificar_area($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_area('".$obj->getNombre()."','".$obj->getDescripcion()."','".$obj->getIdarea()."')";
			return $objCn->ejecutar($sql);	
		}

		// CAMBIAMOS DE ESTADO UN AREA DETERMINADA
		function estado_area($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_area_estado('".$obj->getIdarea()."','".$obj->getEstado()."')";
			return $objCn->ejecutar($sql);	
		}

	}
?>