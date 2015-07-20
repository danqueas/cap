<?php
	class UsuarioD{

		// BUSCAMOS
		function mostrar_usuarioxtrabajador($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_usuarioxtrabajador('".$obj->getIdtrabajador()."')";
			return $objCn->ejecutar($sql);	
		}
		
		// BUSCAMOS PARA EDITAR
		function buscar_usuarioxid($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_usuarioxid('".$obj->getIdusuario()."')";
			return $objCn->ejecutar($sql);	
		}

		// INSERTAMOS
		function insertar_usuario($obj){
			$objCn = new Conexion();
			$sql = "call pa_ins_usuario('".$obj->getNombre()."','".$obj->getPassword()."','".$obj->getIdtrabajador()."')";
			return $objCn->ejecutar($sql);	
		}

		// MODIFICAMOS 
		function modificar_usuario($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_usuario('".$obj->getNombre()."','".$obj->getPassword()."','".$obj->getIdusuario()."')";
			return $objCn->ejecutar($sql);	
		}

		// CAMBIAMOS DE ESTADO
		function estado_usuario($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_usuario_estado('".$obj->getEstado()."','".$obj->getIdusuario()."')";
			return $objCn->ejecutar($sql);	
		}

		function verificar_usuario($obj){
			$objCn = new Conexion();
			$sql = "call pa_verificar_usuario('".$obj->getNombre()."','".$obj->getPassword()."')";
			return $objCn->ejecutar($sql);	
		}

	}
?>