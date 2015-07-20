<?php 
require('../Conexion/db_conexion.php');
require('../Entidad/AreaEntidad.php');
require('../Datos/AreaDatos.php');

$con 	= 	new Conexion();
$objE	= 	new AreaE("","","","");
$objB	= 	new AreaD();

// setIdarea
// setNombre
// setDescripcion
// setEstado


switch ($_POST['evento']) {

		case 'buscar': // BUSCAMOS UN AREA POR NOMBRE
			$objE->setNombre($_POST['nombre']);
			$res_area	=	$objB->mostrar_areas($objE);

			while ($objeto = $res_area->fetch_object()) {
				$areas[]	=	$objeto;
			}

			$contador	= 1;
			//var_dump($areas);
			require('../Presentacion/BP_area.php');
			break;

		case 'nuevo': // LLAMAMOS AL FORMULARIO VACIO
			$idarea 	= "";
			$nom_area 	= "";
			$desc_area  = "";
			$evento		= "registrar";

			require('../Presentacion/BP_area_formulario.php');
			break;

		case 'editar': // LLAMAMOS AL FORMULARIO Y LLENAMOS LOS CAMPOS
			$objE->setIdarea($_POST['idarea']);

			$res_area	=	$objB->buscar_areaxid($objE);

			$datos 		= 	$res_area->fetch_object();

			$idarea 	= $datos->idarea;
			$nom_area 	= $datos->nombre;
			$desc_area 	= $datos->descripcion;
			$evento		= "modificar";

			require('../Presentacion/BP_area_formulario.php');
			break;

		case 'registrar': // INSERTAMOS LOS DATOS A LA BD
			$objE->setNombre($_POST['nombre']);
			$objE->setDescripcion($_POST['descripcion']);

			$res_area	=	$objB->insertar_area($objE);
			
			echo $res_area;
			break;

		case 'modificar': //UPDATEAMOS LOS DATOS EN LA BD
			$objE->setNombre($_POST['nombre']);
			$objE->setDescripcion($_POST['descripcion']);
			$objE->setIdarea($_POST['idarea']);

			$res_area	=	$objB->modificar_area($objE);
			
			echo $res_area;
			break;

		case 'estado': // CAMBIAMOS EL ESTADO DEL ITEM SELECCIONADO
			$objE->setIdarea($_POST['idarea']);

			if ($_POST['estado']=='A') {
				$objE->setEstado('D');				
			}
			elseif($_POST['estado']=='D'){
				$objE->setEstado('A');				
			}
			$res_area	=	$objB->estado_area($objE);
			echo $res_area;
			break;

		default:
			echo "Ocurrio un Error";
			break;
}



?>