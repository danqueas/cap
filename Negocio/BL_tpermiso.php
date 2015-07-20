<?php

require('../Conexion/db_conexion.php');
require('../Entidad/TipoPermisoEntidad.php');
require('../Datos/TipopermisoDatos.php');

$con 	= 	new Conexion();
$objE	= 	new TipoPermisoE("","","","");
$objB	= 	new TipoPermisoD();

switch ($_POST['evento']) {

		case 'buscar': // BUSCAMOS UN AREA POR NOMBRE
			$objE->setDescripcion($_POST['nombre']);
			$res_tpermiso	=	$objB->mostrar_tpermiso($objE);

			while ($objeto  = $res_tpermiso->fetch_object()) {
				$tpermisos[]	=	$objeto;
			}

			$contador	= 1;
			//var_dump($areas);
			require('../Presentacion/BP_tpermiso.php');
			break;

		case 'nuevo': // LLAMAMOS AL FORMULARIO VACIO
			$idtpermiso			= "";
			$desc_tpermiso 		= "";
			$ndias_tpermiso		= "";
			$evento				= "registrar";

			require('../Presentacion/BP_tpermiso_formulario.php');
			break;

		case 'editar': // LLAMAMOS AL FORMULARIO Y LLENAMOS LOS CAMPOS

			$objE->setIdtpermiso($_POST['idtpermiso']);

			$res_tpermiso	=	$objB->buscar_tpermisoxid($objE);

			$datos 		= 	$res_tpermiso->fetch_object();

			$idtpermiso 		= $datos->idtpermiso;
			$desc_tpermiso 		= $datos->descripcion;
			$ndias_tpermiso 	= $datos->ndias;
			$evento				= "modificar";

			require('../Presentacion/BP_tpermiso_formulario.php');
			break;

		case 'registrar': // INSERTAMOS LOS DATOS A LA BD
			$objE->setDescripcion($_POST['descripcion']);
			$objE->setNdias($_POST['ndias']);

			$res_tpermiso	=	$objB->insertar_tpermiso($objE);
			
			echo $res_tpermiso;
			break;

		case 'modificar': //UPDATEAMOS LOS DATOS EN LA BD
			$objE->setDescripcion($_POST['descripcion']);
			$objE->setNdias($_POST['ndias']);
			$objE->setIdtpermiso($_POST['idtpermiso']);

			$res_tpermiso	=	$objB->modificar_tpermiso($objE);
			
			echo $res_tpermiso;
			break;

		case 'estado': // CAMBIAMOS EL ESTADO DEL ITEM SELECCIONADO
			$objE->setIdtpermiso($_POST['idtpermiso']);

			if ($_POST['estado']=='A') {
				$objE->setEstado('D');				
			}
			elseif($_POST['estado']=='D'){
				$objE->setEstado('A');				
			}
			$res_tpermiso	=	$objB->estado_tpermiso($objE);
			echo $res_tpermiso;
			break;

		default:
			echo "Ocurrio un Error";
			break;
}

?>