<?php
	class ReportetD{

		function reporte_year($obj){
			$objCn = new Conexion();
			$sql = "call pa_reporte_year('".$obj->getIdtrabajador()."')";
			return $objCn->ejecutar($sql);	
		}

		function reporte_month($obj){
			$objCn = new Conexion();
			$sql = "call pa_reporte_month('".$obj->getYear()."','".$obj->getIdtrabajador()."')";
			return $objCn->ejecutar($sql);	
		}

		function reporte_es($obj){
			$objCn = new Conexion();
			$sql = "call pa_reporte_es('".$obj->getIdcontrol()."')";
			return $objCn->ejecutar($sql);	
		}

		function reporte_dj($obj){
			$objCn = new Conexion();
			$sql = "call pa_reporte_dj('".$obj->getIdcontrol()."')";
			return $objCn->ejecutar($sql);	
		}

		function reporte_df($obj){
			$objCn = new Conexion();
			$sql = "call pa_reporte_df('".$obj->getIdcontrol()."')";
			return $objCn->ejecutar($sql);	
		}

		function reporte_dfestivos($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_dfestivos('%".$obj->getDfestivos()."%')";
			return $objCn->ejecutar($sql);	
		}

		function busqueda_trabajadorxdni($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_trabajadorxdni('".$obj->getDni()."')";
			return $objCn->ejecutar($sql);	
		}

		function reporte_dpermisos($obj){
			$objCn = new Conexion();
			$sql = "call pa_reporte_dp('".$obj->getIdtrabajador()."','".$obj->getMes()."')";
			return $objCn->ejecutar($sql);	
		}

	}
?>