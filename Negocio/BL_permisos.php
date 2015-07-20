<?php 
require('../Conexion/db_conexion.php');
require('../Entidad/PermisoEntidad.php');
require('../Datos/PermisoDatos.php');

$con 			= 	new Conexion();
$objEpermiso	= 	new PermisoE("","","","","","","","");
$objBpermiso	= 	new PermisoD();


require('../Entidad/TrabajadorEntidad.php');
require('../Datos/TrabajadorDatos.php');
$objEtrabajador	= 	new TrabajadorE("","","","","","","","");
$objBtrabajador	= 	new TrabajadorD();

//setIdpermiso
//setFecha
//setObservacion
//setIdtpermiso
//setIdtrabajador

switch ($_POST['evento']) {

		case 'buscar':
			$objEtrabajador->setApellido($_POST['nombre']);
			$res_trabajador	=	$objBtrabajador->mostrar_trabajador($objEtrabajador);

			while ($objeto = $res_trabajador->fetch_object()) {
				$trabajadores[]	=	$objeto;
			}

			$contador	= 1;
			//var_dump($objEtrabajador);
			require('../Presentacion/BP_permiso.php');
			break;

		case 'nuevo-permiso':

			$res_tpermisos 		= 	$objBpermiso->mostrar_tpermiso();

			while ($objeto = $res_tpermisos->fetch_object()) {
				$permisos[] = $objeto;
			}

			$idtrabajador		= $_POST['idtrabajador'];
			$evento 			= "registrar";

			require('../Presentacion/BP_permiso_formulario.php');
			//var_dump($ttrabajadores);
			break;

		case 'registrar':
			$objEpermiso->setFecha($_POST['fecha']);
			$objEpermiso->setObservacion($_POST['observacion']);
			$objEpermiso->setIdtpermiso($_POST['permisos']);
			$objEpermiso->setIdtrabajador($_POST['idtrabajador']);

			$res_permiso	=	$objBpermiso->insertar_permiso($objEpermiso);
			
			if ($res_permiso) {
				$res_contrato	=	$objBpermiso->obtener_idcontrato($objEpermiso);
				$datos 			= 	$res_contrato->fetch_object();
			 	$idcontrato 	= 	$datos->idcontrato;

			 	$objEpermiso->setIdcontrato($idcontrato);
				$res_tablacontrol  	= 	$objBpermiso->verificar_tablacontrol($objEpermiso);
				$d_tablacontrol 	=  	$res_tablacontrol->fetch_object();

					if (is_null($d_tablacontrol)) {
						//creamos el registro tablacontrol para el mes actual
						$res_creartablacontrol 	= $objBpermiso->crear_tablacontrol($objEpermiso);

						//verificamos la existencia de TablaControl para este Contrato por Mes
						$res_tablacontrol  	= 	$objBpermiso->verificar_tablacontrol($objEpermiso);
						$d_tablacontrol 	=  	$res_tablacontrol->fetch_object();

						//obtenemos id tablacontrol
					}
						$idtablacontrol  	= 	$d_tablacontrol->idcontrol;
						$totalpermisos 		= 	$d_tablacontrol->dias_permiso + 1;

						$objEpermiso->setDiaspermisos($totalpermisos);
						$objEpermiso->setIdtablacontrol($idtablacontrol);

						$res_permiso = $objBpermiso->actualizar_tablacontrol($objEpermiso);

						echo $res_permiso;

			 } 

			break;


		default:
			echo "Ocurrio un Error";
			break;
}



?>