<?php
	class ContratoD{

	// setIdcontrato
	// setIdtrabajador
	// setIdarea
	// setIdgrupo
	// setFinicio
	// setFfin
	// setDescripcion
	// setEstado

		// BUSCAMOS
		function mostrar_contratos($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_contrato('%".$obj->getDni()."%')";
			return $objCn->ejecutar($sql);	
		}
		
		function verificar_contrato($obj)
		{
			$objCn	= new Conexion();
			$sql = "call pa_sel_contratoxidtrabajador('".$obj->getIdtrabajador()."')";
			return $objCn->ejecutar($sql);
		}

		// BUSCAMOS PARA EDITAR
		function buscar_contratoxid($obj){
			$objCn = new Conexion();
			$sql = "call pa_sel_contratoxid('".$obj->getIdcontrato()."')";
			return $objCn->ejecutar($sql);	
		}

		// INSERTAMOS
		function insertar_contrato($obj){
			$objCn = new Conexion();
			$sql = "call pa_ins_contrato('".$obj->getIdtrabajador()."','".$obj->getIdarea()."','".$obj->getIdgrupo()."','".$obj->getFinicio()."','".$obj->getFfin()."','".$obj->getDescripcion()."')";
			return $objCn->ejecutar($sql);	
		}

		// MODIFICAMOS 
		function modificar_contrato($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_contrato('".$obj->getIdarea()."','".$obj->getIdgrupo()."','".$obj->getFinicio()."','".$obj->getFfin()."','".$obj->getDescripcion()."','".$obj->getIdcontrato()."')";
			return $objCn->ejecutar($sql);	
		}

		// CAMBIAMOS DE ESTADO
		function estado_contrato($obj){
			$objCn = new Conexion();
			$sql = "call pa_upd_contrato_estado('".$obj->getEstado()."','".$obj->getIdcontrato()."')";
			return $objCn->ejecutar($sql);	
		}

	}
?>


