<?php

require('../Conexion/db_conexion.php');
require('../Entidad/TipoTrabajadorEntidad.php');
require('../Datos/TipotrabajadorDatos.php');

$con 	= 	new Conexion();
$objE	= 	new TipoTrabajadorE("","","","");
$objB	= 	new TipoTrabajadorD();
/*
	setIdtipotrabajador();
	setNtipotrabajador();
	setDescripcion();
	setEstado();
*/


switch ($_POST['evento']) {

		case 'buscar': // BUSCAMOS UN AREA POR NOMBRE
			$objE->setNtipotrabajador($_POST['nombre']);
			$res_ttrabajador	=	$objB->mostrar_ttrabajador($objE);

			while ($objeto  = $res_ttrabajador->fetch_object()) {
				$ttrabajadores[]	=	$objeto;
			}

			$contador	= 1;
			//var_dump($areas);
			require('../Presentacion/BP_ttrabajador.php');
			break;

		case 'nuevo': // LLAMAMOS AL FORMULARIO VACIO
			$idttrabajador		= "";
			$ntipotrabajador 	= "";
			$descripcion		= "";
			$evento				= "registrar";

			require('../Presentacion/BP_ttrabajador_formulario.php');
			break;

		case 'editar': // LLAMAMOS AL FORMULARIO Y LLENAMOS LOS CAMPOS

			$objE->setIdtipotrabajador($_POST['idttrabajador']);

			$res_ttrabajador	=	$objB->buscar_ttrabajadorxid($objE);

			$datos 		= 	$res_ttrabajador->fetch_object();

			$idttrabajador 		= $datos->idtipotrabajador;
			$ntipotrabajador 	= $datos->ntipotrabajador;
			$descripcion 		= $datos->descripcion;
			$evento				= "modificar";

			require('../Presentacion/BP_ttrabajador_formulario.php');
			break;

		case 'registrar': // INSERTAMOS LOS DATOS A LA BD
			$objE->setNtipotrabajador($_POST['nttrabajador']);
			$objE->setDescripcion($_POST['descripcion']);

			$res_ttrabajador	=	$objB->insertar_ttrabajador($objE);
			
			echo $res_ttrabajador;
			break;

		case 'modificar': //UPDATEAMOS LOS DATOS EN LA BD
			$objE->setNtipotrabajador($_POST['nttrabajador']);
			$objE->setDescripcion($_POST['descripcion']);
			$objE->setIdtipotrabajador($_POST['idttrabajador']);

			$res_ttrabajador	=	$objB->modificar_ttrabajador($objE);
			
			echo $res_ttrabajador;
			break;

		case 'estado': // CAMBIAMOS EL ESTADO DEL ITEM SELECCIONADO
			$objE->setIdtipotrabajador($_POST['idttrabajador']);

			if ($_POST['estado']=='A') {
				$objE->setEstado('D');				
			}
			elseif($_POST['estado']=='D'){
				$objE->setEstado('A');				
			}
			$res_ttrabajador	=	$objB->estado_ttrabajador($objE);
			echo $res_ttrabajador;
			break;

		default:
			echo "Ocurrio un Error";
			break;
}

?>