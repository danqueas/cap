<?php
	class ControlD{

		function verificar_contrato($obj){
			$objCn = new Conexion();
			$sql = "call pa_verificar_contrato('".$obj->getUsuario()."')";
			return $objCn->ejecutar($sql);	
		}

		function verificar_tablacontrol($obj){
			$objCn = new Conexion();
			$sql = "call pa_verificar_tablacontrol('".$obj->getIdcontrato()."')";
			return $objCn->ejecutar($sql);	
		}

		function verificar_ingreso($obj){
			$objCn = new Conexion();
			$sql = "call pa_verificar_ingreso('".$obj->getIdcontrato()."')";
			return $objCn->ejecutar($sql);	
		}

		function crear_tablacontrol($obj){
			$objCn = new Conexion();
			$sql = "call pa_crear_tablacontrol('".$obj->getIdcontrato()."')";
			return $objCn->ejecutar($sql);	
		}

		function actualizar_tablacontrol($obj){
			$objCn = new Conexion();
			$sql = "call pa_actualizar_tablacontrol('".$obj->getAtrasos()."','".$obj->getDias()."','".$obj->getIdcontrol()."')";
			return $objCn->ejecutar($sql);	
		}


		function crear_ingreso($obj){
			$objCn = new Conexion();
			$sql = "call pa_crear_ingreso('".$obj->getIdcontrato()."','".$obj->getIdcontrol()."','".$obj->getFecha()."','".$obj->getInicio()."')";
			return $objCn->ejecutar($sql);	
		}

		function crear_salida($obj){
			$objCn = new Conexion();
			$sql = "call pa_crear_salida('".$obj->getFin()."','".$obj->getIdes()."')";
			return $objCn->ejecutar($sql);	
		}

		function crear_resumen($obj){
			$objCn = new Conexion();
			$sql = "call pa_ins_resumen('".$obj->getIdtrabajador()."','".$obj->getIdes()."')";
			return $objCn->ejecutar($sql);	
		}

		function turnos_grupo($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_turnosxgrupo('".$obj->getIdgrupo()."')";
			return $objCn->ejecutar($sql);	
		}	

		function turnos_grupo_ingreso($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_turnosxgrupo_ingreso('".$obj->getIdgrupo()."')";
			return $objCn->ejecutar($sql);	
		}

	}
?>