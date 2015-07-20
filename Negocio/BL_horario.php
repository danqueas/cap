<?php

require('../Conexion/db_conexion.php');
require('../Entidad/HorarioEntidad.php');
require('../Datos/HorarioDatos.php');

$con 	= 	new Conexion();
$objE	= 	new HorarioE("","","","","");
$objB	= 	new HorarioD();

switch ($_POST['evento']) {

		case 'buscar': // BUSCAMOS UN AREA POR NOMBRE
			$objE->setDia($_POST['nombre']);
			$res_horarios	=	$objB->mostrar_horarios($objE);

			while ($objeto = $res_horarios->fetch_object()) {
				$horarios[]	=	$objeto;
			}

			$contador	= 1;
			//var_dump($areas);
			require('../Presentacion/BP_horario.php');
			break;

		case 'nuevo': // LLAMAMOS AL FORMULARIO VACIO
			$idhorario 			= "";
			$dia_horario 		= "";
			$hentrada_horario  	= "";
			$hsalida_horario  	= "";
			$evento				= "registrar";

			require('../Presentacion/BP_horario_formulario.php');
			break;

		case 'editar': // LLAMAMOS AL FORMULARIO Y LLENAMOS LOS CAMPOS
			$objE->setIdhorario($_POST['idhorario']);

			$res_horario	=	$objB->buscar_horarioxid($objE);

			$datos 			= 	$res_horario->fetch_object();

			$idhorario 			= $datos->idhorario;
			$dia_horario  		= $datos->dia;
			$hentrada_horario  	= $datos->hentrada;
			$hsalida_horario  	= $datos->hsalida;

			$evento				= "modificar";

			require('../Presentacion/BP_horario_formulario.php');
			break;

		case 'registrar': // INSERTAMOS LOS DATOS A LA BD
			$objE->setDia($_POST['dia']);
			$objE->setHentrada($_POST['hentrada']);
			$objE->setHsalida($_POST['hsalida']);

			$res_horario	=	$objB->insertar_horario($objE);
			
			echo $res_horario;
			break;

		case 'modificar': //UPDATEAMOS LOS DATOS EN LA BD
			$objE->setDia($_POST['dia']);
			$objE->setHentrada($_POST['hentrada']);
			$objE->setHsalida($_POST['hsalida']);
			$objE->setIdhorario($_POST['idhorario']);

			$res_horario	=	$objB->modificar_horario($objE);
			
			echo $res_horario;
			break;

		case 'estado': // CAMBIAMOS EL ESTADO DEL ITEM SELECCIONADO
			$objE->setIdhorario($_POST['idhorario']);

			if ($_POST['estado']=='A') {
				$objE->setEstado('D');				
			}
			elseif($_POST['estado']=='D'){
				$objE->setEstado('A');				
			}
			$res_horario	=	$objB->estado_horario($objE);
			echo $res_horario;
			break;

		default:
			echo "Ocurrio un Error";
			break;
}

?>