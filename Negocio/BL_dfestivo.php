<?php 
require('../Conexion/db_conexion.php');
require('../Entidad/DiasFestivosEntidad.php');
require('../Datos/DfestivosDatos.php');

$con 	= 	new Conexion();
$objE	= 	new DiasFestivosE("","","","","");
$objB	= 	new DiasFestivosD();
/*
	CAMPOS DE LA TABLA Dias Festivos.
	setIdfestivo();
	setFecha();
	setTipotrabajador();
	setNombre();
	setEstado();

*/
switch ($_POST['evento']) {

		case 'buscar': // BUSCAMOS POR NOMBRE
			$objE->setNombre($_POST['nombre']);
			$res_dfestivos	=	$objB->mostrar_dfestivos($objE);


			while ($objeto  = $res_dfestivos->fetch_object()) {
				$dfestivos[]	=	$objeto;
			}

			$contador	= 1;
			//var_dump($areas);
			require('../Presentacion/BP_dfestivos.php');
			break;

		case 'nuevo': // LLAMAMOS AL FORMULARIO VACIO
			$idfestivo 			= "";
			$fecha_dfestivos 	= "";
			$nombre_dfestivos 	= "";
			$tipt_dfestivos		= "";

			$evento				= "registrar";

			$res_ttrabajadores = $objB->mostrar_tipotrabajador();
			while ($objeto  = $res_ttrabajadores->fetch_object()) {
				$ttrabajadores[]	=	$objeto;
			}

			require('../Presentacion/BP_dfestivos_formulario.php');
			break;

		case 'editar': // LLAMAMOS AL FORMULARIO Y LLENAMOS LOS CAMPOS
			$objE->setIdfestivo($_POST['idfestivo']);

			$res_dfestivos	=	$objB->buscar_dfestivosxid($objE);

			$datos 		= 	$res_dfestivos->fetch_object();

			$idfestivo 			= $datos->idfestivo;
			$fecha_dfestivos 	= $datos->fecha;
			$nombre_dfestivos 	= $datos->nombre;
			$tipt_dfestivos 	= $datos->tipotrabajador;

			$evento		= "modificar";

			$res_ttrabajadores = $objB->mostrar_tipotrabajador();
			while ($objeto  = $res_ttrabajadores->fetch_object()) {
				$ttrabajadores[]	=	$objeto;
			}

			require('../Presentacion/BP_dfestivos_formulario.php');
			break;

		case 'registrar': // INSERTAMOS LOS DATOS A LA BD
			$objE->setFecha($_POST['fecha']);
			$objE->setNombre($_POST['nombre']);
			$objE->setTipotrabajador($_POST['tipot']);

			$res_dfestivos	=	$objB->insertar_dfestivos($objE);
			
			echo $res_dfestivos;
			break;

		case 'modificar': //UPDATEAMOS LOS DATOS EN LA BD
			$objE->setFecha($_POST['fecha']);
			$objE->setNombre($_POST['nombre']);
			$objE->setTipotrabajador($_POST['tipot']);
			$objE->setIdfestivo($_POST['idfestivo']);

			$res_dfestivos	=	$objB->modificar_dfestivos($objE);
			
			echo $res_dfestivos;
			break;

		case 'estado': // CAMBIAMOS EL ESTADO DEL ITEM SELECCIONADO
			$objE->setIdfestivo($_POST['idfestivo']);

			if ($_POST['estado']=='A') {
				$objE->setEstado('D');				
			}
			elseif($_POST['estado']=='D'){
				$objE->setEstado('A');				
			}
			$res_dfestivos	=	$objB->estado_dfestivos($objE);
			echo $res_dfestivos;
			break;

		default:
			echo "Ocurrio un Error";
			break;
}



?>