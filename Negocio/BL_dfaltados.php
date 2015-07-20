<?php 
require('../Conexion/db_conexion.php');
require('../Entidad/DiasFaltadosEntidad.php');
require('../Datos/DfaltadosDatos.php');

$con 	= 	new Conexion();
$objE	= 	new DiasFaltadosE("","","","","");
$objB	= 	new DiasfaltadosD();

switch ($_POST['evento']) {

		case 'buscar': // BUSCAMOS UN AREA POR NOMBRE
			$objE->setObservacion($_POST['nombre']);
			$res_dfaltados	=	$objB->mostrar_dfaltados($objE);

			while ($objeto  = $res_dfaltados->fetch_object()) {
				$dfaltados[]	=	$objeto;
			}

			$contador	= 1;
			//var_dump($areas);
			require('../Presentacion/BP_dfaltados.php');
			break;

		case 'nuevo': // LLAMAMOS AL FORMULARIO VACIO
			$idfaltado 			= "";
			$finicio_dfaltados 	= "";
			$ftermino_dfaltados = "";
			$obs_dfaltados		= "";
			$evento				= "registrar";

			require('../Presentacion/BP_dfaltados_formulario.php');
			break;

		case 'editar': // LLAMAMOS AL FORMULARIO Y LLENAMOS LOS CAMPOS
			$objE->setIdfaltado($_POST['idfaltado']);

			$res_dfaltados	=	$objB->buscar_dfaltadoxid($objE);

			$datos 		= 	$res_dfaltados->fetch_object();

			$idfaltado 			= $datos->idfaltado;
			$finicio_dfaltados 	= $datos->finicio;
			$ftermino_dfaltados = $datos->ftermino;
			$obs_dfaltados 		= $datos->observacion;
			$evento		= "modificar";

			require('../Presentacion/BP_dfaltados_formulario.php');
			break;

		case 'registrar': // INSERTAMOS LOS DATOS A LA BD
			$objE->setFinicio($_POST['finicio']);
			$objE->setFtermino($_POST['ftermino']);
			$objE->setObservacion($_POST['observacion']);

			$res_dfaltados	=	$objB->insertar_dfaltado($objE);
			
			echo $res_dfaltados;
			break;

		case 'modificar': //UPDATEAMOS LOS DATOS EN LA BD
			$objE->setFinicio($_POST['finicio']);
			$objE->setFtermino($_POST['ftermino']);
			$objE->setObservacion($_POST['observacion']);
			$objE->setIdfaltado($_POST['idfaltado']);

			$res_dfaltados	=	$objB->modificar_dfaltado($objE);
			
			echo $res_dfaltados;
			break;

		case 'estado': // CAMBIAMOS EL ESTADO DEL ITEM SELECCIONADO
			$objE->setIdfaltado($_POST['idfaltado']);

			if ($_POST['estado']=='A') {
				$objE->setEstado('D');				
			}
			elseif($_POST['estado']=='D'){
				$objE->setEstado('A');				
			}
			$res_dfaltados	=	$objB->estado_dfaltado($objE);
			echo $res_dfaltados;
			break;

		default:
			echo "Ocurrio un Error";
			break;
}



?>