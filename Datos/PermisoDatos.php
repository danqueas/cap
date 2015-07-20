<?php
	class PermisoD{

		// BUSCAMOS ( TODAS / POR NOMBRE )
		function mostrar_trabajador($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_trabajador('%".$obj->getApellido()."%')";
			return $objCn->ejecutar($sql);	
		}
		
		// BUSCAMOS PARA EDITAR
		function insertar_permiso($obj){
			$objCn = new Conexion();
			$sql = "call pa_ins_permiso('".$obj->getFecha()."','".$obj->getObservacion()."','".$obj->getIdtpermiso()."','".$obj->getIdtrabajador()."')";
			return $objCn->ejecutar($sql);	
		}

		function mostrar_tpermiso(){
			$objCn = new Conexion();
			$sql = "call pa_sel_tipopermiso('%%')";
			return $objCn->ejecutar($sql);	
		}


		function obtener_idcontrato($obj){
			$objCn = new Conexion();
			$sql = "SELECT * from contrato
					where contrato.idtrabajador = '".$obj->getIdtrabajador()."'	and contrato.estado = 'A'
					LIMIT 1";
			return $objCn->ejecutar($sql);	
		}

		function verificar_tablacontrol($obj){
			$objCn = new Conexion();
			$sql = "call pa_verificar_tablacontrol('".$obj->getIdcontrato()."')";
			return $objCn->ejecutar($sql);	
		}

		function crear_tablacontrol($obj){
			$objCn = new Conexion();
			$sql = "call pa_crear_tablacontrol('".$obj->getIdcontrato()."')";
			return $objCn->ejecutar($sql);	
		}

		function actualizar_tablacontrol($obj){
			$objCn = new Conexion();
			$sql = "call pa_actualizar_control_permisos('".$obj->getDiaspermisos()."','".$obj->getIdtablacontrol()."')";
			return $objCn->ejecutar($sql);	
		}


	}
?>