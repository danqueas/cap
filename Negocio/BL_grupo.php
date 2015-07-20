<?php 
require('../Conexion/db_conexion.php');
require('../Entidad/GrupoEntidad.php');
require('../Entidad/TurnoEntidad.php');
require('../Entidad/HorarioEntidad.php');
require('../Datos/GrupoDatos.php');
require('../Datos/TurnosDatos.php');

$con 	= 	new Conexion();
$objEG	= 	new GrupoE("","","");
$objET	= 	new TurnoE("","","","");
$objGB	= 	new GrupoD();
$objTB	= 	new TurnoD();

	//grupo
	//setIdgrupo
	//setNgrupo
	//setEstado

	//turno
	//setIdturno
	//setIdhorario
	//setIdgrupo
	//setEstado


switch ($_POST['evento']) {

		case 'buscar': // BUSCAMOS UN AREA POR NOMBRE
			$objEG->setNgrupo($_POST['nombre']);
			$res_grupo	=	$objGB->mostrar_grupo($objEG);

			while ($objEGto = $res_grupo->fetch_object()) {
				$grupos[]	=	$objEGto;
			}

			$contador	= 1;
			
			require('../Presentacion/BP_grupo.php');
			break;

		case 'nuevo': // LLAMAMOS AL FORMULARIO VACIO
			$idgrupo 	= "";
			$ngrupo 	= "";
			$evento		= "registrar";

			require('../Presentacion/BP_grupo_formulario.php');
			break;

		case 'editar': // LLAMAMOS AL FORMULARIO Y LLENAMOS LOS CAMPOS
			$objEG->setIdgrupo($_POST['idgrupo']);

			$res_grupo	=	$objGB->buscar_grupoxid($objEG);

			$datos 		= 	$res_grupo->fetch_object();

			$idgrupo 	= $datos->idgrupo;
			$ngrupo 	= $datos->ngrupo;
			$evento		= "modificar";

			//var_dump($res_grupo);
			require('../Presentacion/BP_grupo_formulario.php');
			break;

		case 'registrar': // INSERTAMOS LOS DATOS A LA BD
			$objEG->setNgrupo($_POST['ngrupo']);

			$res_grupo	=	$objGB->insertar_grupo($objEG);
			
			echo $res_grupo;
			break;

		case 'modificar': //UPDATEAMOS LOS DATOS EN LA BD
			$objEG->setNgrupo($_POST['ngrupo']);
			$objEG->setIdgrupo($_POST['idgrupo']);

			$res_grupo	=	$objGB->modificar_grupo($objEG);
			
			echo $res_grupo;
			break;

		case 'estado': // CAMBIAMOS EL ESTADO DEL ITEM SELECCIONADO
			$objEG->setIdgrupo($_POST['idgrupo']);

			if ($_POST['estado']=='A') {
				$objEG->setEstado('D');				
			}
			elseif($_POST['estado']=='D'){
				$objEG->setEstado('A');				
			}
			$res_grupo	=	$objGB->estado_grupo($objEG);
			echo $res_grupo;
			break;

// TRABAJAMOS CON TURNO
		case 'ver': // VEMOS LOS HORARIOS REGISTRADOS EN ESTE GRUPO

			$idgrupo = $_POST['idgrupo'];
			$est_reg_horario = "horario-estado";
			$icono = "fa-refresh"; //font-awesome

			$objEG->setIdgrupo($_POST['idgrupo']);
			$res_grupo	=	$objGB->horario_grupo($objEG);
			
			while ($objEGto = $res_grupo->fetch_object()) {
				$horarios[]	=	$objEGto;
			}

			$contador	= 1;
			
			require('../Presentacion/BP_turno_formulario.php');
			break;

		case 'agregar': // VEMOS HORARIOS RESTANTES AL GRUPO SELECCIONADO
			$idgrupo = $_POST['idgrupo'];
			$est_reg_horario = "horario-registrar";
			$icono = "fa-plus"; //font-awesome

			$objEG->setIdgrupo($_POST['idgrupo']);
			$res_grupo	=	$objGB->horariofaltante_grupo($objEG);
			
			while ($objEGto = $res_grupo->fetch_object()) {
				$horarios[]	=	$objEGto;
			}

			$contador	= 1;
			//var_dump($horarios);
			require('../Presentacion/BP_turno_formulario.php');
			break;

		// REGISTRAMOS UN HORARIO A UN GRUPO
		case 'horario-registrar':

			$objET->setIdhorario($_POST['idhortur']);
			$objET->setIdgrupo($_POST['idgrupo']);
			$res_turnos	=	$objTB->insertar_turnos($objET);

			echo $res_turnos;

			break;

		// CAMBIAMOS DE ESTADO DE UN HORARIO EN UN GRUPO
		case 'horario-estado':

			$objET->setIdturno($_POST['idhortur']);

			if ($_POST['estado']=='A') {
				$objET->setEstado('D');				
			}
			elseif($_POST['estado']=='D'){
				$objET->setEstado('A');				
			}

			$res_turnos	=	$objTB->estado_turnos($objET);
			echo $res_turnos;

			break;
		default:
			echo "Ocurrio un Error";
			break;
}



?>