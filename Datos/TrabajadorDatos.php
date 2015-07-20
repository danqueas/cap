<?php
	class TrabajadorD{

		// BUSCAMOS
		function mostrar_trabajador($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_trabajador('%".$obj->getApellido()."%')";
			return $objCn->ejecutar($sql);	
		}
		
		function mostrar_tipotrabajador()
		{
			$objCn	= new Conexion();
			$sql 	= "SELECT * from tipotrabajador where estado = 'A'";
			return $objCn->ejecutar($sql);
		}

		// BUSCAMOS PARA EDITAR
		function buscar_trabajadorxid($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_trabajadorxid('".$obj->getIdtrabajador()."')";
			return $objCn->ejecutar($sql);	
		}

		// INSERTAMOS
		function insertar_trabajador($obj){
			$objCn = new Conexion();
			$sql = "call pa_ins_trabajador('".$obj->getNombre()."','".$obj->getApellido()."','".$obj->getDni()."','".$obj->getSexo()."','".$obj->getDireccion()."','".$obj->getIdttrabajador()."')";
			return $objCn->ejecutar($sql);	
		}

		// MODIFICAMOS 
		function modificar_trabajador($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_trabajador('".$obj->getNombre()."','".$obj->getApellido()."','".$obj->getDni()."','".$obj->getSexo()."','".$obj->getDireccion()."','".$obj->getIdttrabajador()."','".$obj->getIdtrabajador()."')";
			return $objCn->ejecutar($sql);	
		}

		// CAMBIAMOS DE ESTADO
		function estado_trabajador($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_trabajador_estado('".$obj->getEstado()."','".$obj->getIdtrabajador()."')";
			return $objCn->ejecutar($sql);	
		}

	}
?>