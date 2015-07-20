<?php 
require('../Conexion/db_conexion.php');

require('../Entidad/ContratoEntidad.php');
require('../Entidad/TrabajadorEntidad.php');
require('../Entidad/AreaEntidad.php');
require('../Entidad/GrupoEntidad.php');

require('../Datos/ContratoDatos.php');
require('../Datos/AreaDatos.php');
require('../Datos/GrupoDatos.php');

$con 			= 	new Conexion();

$objEContrato	= 	new ContratoE("","","","","","","","");
$objEArea		= 	new AreaE("","","","");
$objETrabajador	= 	new TrabajadorE("","","","","","","","");
$objEGrupo		= 	new GrupoE("","","");

$objBContrato	= 	new ContratoD();
$objBArea		= 	new AreaD();
$objBGrupo		= 	new GrupoD();

// CONTRATO
	// setIdcontrato
	// setIdtrabajador
	// setIdarea
	// setIdgrupo
	// setFinicio
	// setFfin
	// setDescripcion
	// setEstado

// AREA
	//setIdarea
	//setNombre
	//setDescripcion
	//setEstado

// TRABAJADOR
	//setIdtrabajador
	//setNombre
	//setApellido
	//setDni
	//setSexo
	//setDireccion
	//setEstado
	//setIdttrabajador

//GRUPO
	//setIdgrupo
	//setNgrupo
	//setEstado

switch ($_POST['evento']) {

		case 'buscar': // BUSCAMOS UN AREA POR NOMBRE
			$objETrabajador->setDni($_POST['nombre']);
			$res_contratos	=	$objBContrato->mostrar_contratos($objETrabajador);

			while ($objeto = $res_contratos->fetch_object()) {
				$trabajadores[]	=	$objeto;
			}

			$contador	= 1;

			require('../Presentacion/BP_contrato.php');
			break;

		case 'nuevo': // LLAMAMOS AL FORMULARIO VACIO

			$objEArea->setNombre('');
			$res_areas 		= 	$objBArea->mostrar_areas($objEArea);
	
			while ($objeto = $res_areas->fetch_object()) {
				$areas[]	=	$objeto;
			}

			$objEGrupo->setNgrupo('');
			$res_grupos 		= 	$objBGrupo->mostrar_grupo($objEGrupo);

			while ($objeto = $res_grupos->fetch_object()) {
				$grupos[]	=	$objeto;
			}

			$idcontrato 	= "";
			$idarea 		= "";
			$idgrupo 		= "";
			$finicio 		= "";
			$ffin  			= "";
			$descripcion  	= "";
			$idtrabajador 	= $_POST['idtrabajador'];
			$evento			= "registrar";

			require('../Presentacion/BP_contrato_formulario.php');
			break;

		case 'editar': // LLAMAMOS AL FORMULARIO Y LLENAMOS LOS CAMPOS
			$objEContrato->setIdcontrato($_POST['idcontrato']);

			$res_contrato	=	$objBContrato->buscar_contratoxid($objEContrato);

			$objEArea->setNombre('');
			$res_areas 		= 	$objBArea->mostrar_areas($objEArea);
	
			while ($objeto = $res_areas->fetch_object()) {
				$areas[]	=	$objeto;
			}

			$objEGrupo->setNgrupo('');
			$res_grupos 		= 	$objBGrupo->mostrar_grupo($objEGrupo);

			while ($objeto = $res_grupos->fetch_object()) {
				$grupos[]	=	$objeto;
			}


			$datos 		= 	$res_contrato->fetch_object();

			$idcontrato 	= $datos->idcontrato;
			$idtrabajador 	= $datos->idtrabajador;
			$idarea 		= $datos->idarea;
			$idgrupo 		= $datos->idgrupo;
			$finicio 		= $datos->fechainicio;
			$ffin 			= $datos->fechafin;
			$descripcion 	= $datos->descripcion;
			$evento		= "modificar";

			require('../Presentacion/BP_contrato_formulario.php');

			break;

		case 'registrar': // INSERTAMOS LOS DATOS A LA BD

			$objEContrato->setIdtrabajador($_POST['idtrabajador']);
			$res_contratos	= 	$objBContrato->verificar_contrato($objEContrato);
			$contratos 		= 	$res_contratos->fetch_object();

			if (count($contratos)==0) {

				$objEContrato->setIdtrabajador($_POST['idtrabajador']);
				$objEContrato->setIdarea($_POST['idarea']);
				$objEContrato->setIdgrupo($_POST['idgrupo']);
				$objEContrato->setFinicio($_POST['finicio']);
				$objEContrato->setFfin($_POST['ffin']);
				$objEContrato->setDescripcion($_POST['descripcion']);

				$res_contratos	=	$objBContrato->insertar_contrato($objEContrato);
				
				echo $res_contratos;

			}
			else {
				echo 'ACTUALMENTE TIENE UN CONTRATO ACTIVO';
			}
			break;

		case 'modificar': //UPDATEAMOS LOS DATOS EN LA BD

			$objEContrato->setIdcontrato($_POST['idcontrato']);
			$objEContrato->setIdarea($_POST['idarea']);
			$objEContrato->setIdgrupo($_POST['idgrupo']);
			$objEContrato->setFinicio($_POST['finicio']);
			$objEContrato->setFfin($_POST['ffin']);
			$objEContrato->setDescripcion($_POST['descripcion']);

			$res_contratos	=	$objBContrato->modificar_contrato($objEContrato);
			
			echo $res_contratos;
			break;

		case 'estado': // CAMBIAMOS EL ESTADO DEL ITEM SELECCIONADO
			$objEContrato->setIdcontrato($_POST['idcontrato']);

			if ($_POST['estado']=='A') {
				$objEContrato->setEstado('D');				
			}
			elseif($_POST['estado']=='D'){
				$objEContrato->setEstado('A');				
			}
			$res_contratos	=	$objBContrato->estado_contrato($objEContrato);
			echo $res_contratos;
			break;

		default:
			echo "Ocurrio un Error";
			break;
}



?>