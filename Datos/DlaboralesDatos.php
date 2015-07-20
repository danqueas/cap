<?php
	class DiasLaboralesD{

	// getIddialaboral
	// getPeriodo
	// getNom_mes
	// getNum_mes
	// getDias_laborales
	// getDias_festivos

		// BUSCAMOS
		function mostrar_dlaborales($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_dlaborales('%".$obj->getPeriodo()."%')";
			return $objCn->ejecutar($sql);	
		}

		// BUSCAMOS PARA EDITAR
		function buscar_dlaboralesxid($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_dlaboralesxid('".$obj->getIddialaboral()."')";
			return $objCn->ejecutar($sql);	
		}

		// INSERTAMOS
		function insertar_dlaborales($obj){
			$objCn = new Conexion();
			$sql = "call pa_ins_dlaborales('".$obj->getPeriodo()."','".$obj->getNom_mes()."','".$obj->getDias_laborales()."','".$obj->getDias_festivos()."')";
			return $objCn->ejecutar($sql);	
		}

		// MODIFICAMOS 
		function modificar_dlaborales($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_dlaborales('".$obj->getPeriodo()."','".$obj->getNom_mes()."','".$obj->getDias_laborales()."','".$obj->getDias_festivos()."','".$obj->getIddialaboral()."')";
			return $objCn->ejecutar($sql);	
		}

	}
?>