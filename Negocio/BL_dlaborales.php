<?php 
require('../Conexion/db_conexion.php');
require('../Entidad/DiasLaboralesEntidad.php');
require('../Datos/DlaboralesDatos.php');

$con 	= 	new Conexion();
$objE	= 	new DiasLaboralesE("","","","","","");
$objB	= 	new DiasLaboralesD();


$meses = (object) array(
		'0' => (object) array('nom_mes' => 'Enero'),
		'1' => (object) array('nom_mes' => 'Febrero'),
		'2' => (object) array('nom_mes' => 'Marzo'),
		'3' => (object) array('nom_mes' => 'Abril'),
		'4' => (object) array('nom_mes' => 'Mayo'),
		'5' => (object) array('nom_mes' => 'Junio'),
		'6' => (object) array('nom_mes' => 'Julio'),
		'7' => (object) array('nom_mes' => 'Agosto'),
		'8' => (object) array('nom_mes' => 'Septiembre'),
		'9' => (object) array('nom_mes' => 'Octubre'),
		'10' => (object) array('nom_mes' => 'Noviembre'),
		'11' => (object) array('nom_mes' => 'Diciembre'),
	);

	// setIddialaboral
	// setPeriodo
	// setNom_mes
	// setDias_laborales
	// setDias_festivos

switch ($_POST['evento']) {

		case 'buscar': // BUSCAMOS UN AREA POR NOMBRE
			$objE->setPeriodo($_POST['nombre']);
			$res_dlaborales	=	$objB->mostrar_dlaborales($objE);

			while ($objeto = $res_dlaborales->fetch_object()) {
				$dlaborales[]	=	$objeto;
			}

			$contador	= 1;
			//var_dump($res_dlaborales);
			require('../Presentacion/BP_dlaborales.php');
			break;

		case 'nuevo': // LLAMAMOS AL FORMULARIO VACIO
			$Iddialaboral 		= "";
			$Periodo 			= "";
			$Nom_mes 			= "";
			$Dias_laborales 	= "1";
			$Dias_festivos 		= "1";
			$evento		= "registrar";

			require('../Presentacion/BP_dlaborales_formulario.php');
			break;

		case 'editar': // LLAMAMOS AL FORMULARIO Y LLENAMOS LOS CAMPOS
			$objE->setIddialaboral($_POST['iddlaboral']);

			$res_dlaborales	=	$objB->buscar_dlaboralesxid($objE);

			$datos 		= 	$res_dlaborales->fetch_object();

			$Iddialaboral 		= $datos->iddialaboral;
			$Periodo 			= $datos->periodo;
			$Nom_mes 			= $datos->nom_mes;
			$Dias_laborales 	= $datos->num_diaslaborales;
			$Dias_festivos 		= $datos->num_diasfestivos;

			$evento		= "modificar";

			require('../Presentacion/BP_dlaborales_formulario.php');
			break;

		case 'registrar': // INSERTAMOS LOS DATOS A LA BD
			$objE->setPeriodo($_POST['Periodo']);
			$objE->setNom_mes($_POST['Nom_mes']);
			$objE->setDias_laborales($_POST['Dias_laborales']);
			$objE->setDias_festivos($_POST['Dias_festivos']);
			$res_dlaborales	=	$objB->insertar_dlaborales($objE);
			
			echo $res_dlaborales;
			break;

		case 'modificar': //UPDATEAMOS LOS DATOS EN LA BD
			$objE->setPeriodo($_POST['Periodo']);
			$objE->setNom_mes($_POST['Nom_mes']);
			$objE->setDias_laborales($_POST['Dias_laborales']);
			$objE->setDias_festivos($_POST['Dias_festivos']);
			$objE->setIddialaboral($_POST['Iddialaboral']);

			$res_dlaborales	=	$objB->modificar_dlaborales($objE);
			
			echo $res_dlaborales;
			break;

		default:
			echo "Ocurrio un Error";
			break;
}



?>