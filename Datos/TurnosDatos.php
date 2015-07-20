<?php
	class TurnoD{

		// INSERTAR EN TURNO
		function insertar_turnos($obj){
			$objCn = new Conexion();
			$sql = "call pa_ins_turno('".$obj->getIdhorario()."','".$obj->getIdgrupo()."')";
			return $objCn->ejecutar($sql);	
		}

		// CAMBIANDO ESTADOS EN TURNO
		function estado_turnos($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_turno_estado('".$obj->getEstado()."','".$obj->getIdturno()."')";
			return $objCn->ejecutar($sql);	
		}

	}
?>
