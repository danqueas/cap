<?php
	class HorarioD{

		// BUSCAMOS ( TODAS / POR NOMBRE )
		function mostrar_horarios($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_horario('%".$obj->getDia()."%')";
			return $objCn->ejecutar($sql);	
		}

		// BUSCAMOS PARA EDITAR
		function buscar_horarioxid($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_horarioxid('".$obj->getIdhorario()."')";
			return $objCn->ejecutar($sql);	
		}

		// INSERTAMOS
		function insertar_horario($obj){
			$objCn = new Conexion();
			$sql = "call pa_ins_horario('".$obj->getDia()."','".$obj->getHentrada()."','".$obj->getHsalida()."')";
			return $objCn->ejecutar($sql);	
		}

		// MODIFICAMOS
		function modificar_horario($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_horario('".$obj->getDia()."','".$obj->getHentrada()."','".$obj->getHsalida()."','".$obj->getIdhorario()."')";
			return $objCn->ejecutar($sql);	
		}

		// CAMBIAMOS DE ESTADO
		function estado_horario($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_horario_estado('".$obj->getEstado()."','".$obj->getIdhorario()."')";
			return $objCn->ejecutar($sql);	
		}
		
	}
?>