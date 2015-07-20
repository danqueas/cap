<?php 
session_start();
require('../Conexion/db_conexion.php');
$con 		= 	new Conexion();

require('../Entidad/TrabajadorEntidad.php');
$objEtrabajador	= 	new TrabajadorE("","","","","","","","");

require('../Datos/ReporteTrabajadorDatos.php');
require('../Entidad/ReporteTrabajadorEntidad.php');
$objE		= 	new ReportetE("","","","","","");
$objB		= 	new ReportetD();

//setIdtrabajador
//setIdcontrol
//setYear
//setIdgrupo
//setDfestivos

	switch ($_POST['evento']) {

		case 'buscar': // BUSCAMOS UN AREA POR NOMBRE

				require('../Presentacion/BP_admin-control.php');
				break;


			case 'inicio':
				$_SESSION['dni'] = $_POST['nombre'];

				$objEtrabajador->setDni($_SESSION['dni']);
				$res_trabajador	=	$objB->busqueda_trabajadorxdni($objEtrabajador);

				$datos 			= 	$res_trabajador->fetch_object();
				if (isset($datos)) {
					$_SESSION['idtrabajador'] 	= 	$datos->idtrabajador;

					$objE->setIdtrabajador($_SESSION['idtrabajador']);
					$res_años 	= 	$objB->reporte_year($objE);

					while ($objeto = $res_años->fetch_object()) {
							$años[] = $objeto;
					}
				if (isset($años)) {
					$contador = 1;
					require('../Presentacion/BP_reporte_year.php');
				} else {
					echo "<div class='alert alert-dismissible alert-danger'>
							  <button type='button' class='close' data-dismiss='alert'>×</button>
							  <strong>Ups!</strong> AUN NO SE HAN REGISTRADO EVENTOS PARA ESTE USUARIO.
						</div>";
				}
				

				}
				else {
					 echo "<div class='alert alert-dismissible alert-danger'>
							  <button type='button' class='close' data-dismiss='alert'>×</button>
							  <strong>Ups!</strong> No se encontraron Resultados para esta Busqueda.
							</div>";
				}

				break;

			case 'ver-detalle':
				
				$idcontrol 		= 	$_POST['idcontrol'];
				$mes 			= 	$_POST['mes'];
				$nummes 		= 	$_POST['nummes'];
				$idtrabajador 	= 	$_SESSION['idtrabajador'];

				$objE->setIdcontrol($idcontrol);
				$objE->setDfestivos('');
				$objE->setIdtrabajador($idtrabajador);
				$objE->setMes($nummes);


				$res_es 		= 	$objB->reporte_es($objE);
				$res_dj 		= 	$objB->reporte_dj($objE);
				$res_df 		= 	$objB->reporte_df($objE);
				$res_dfestivos 	= 	$objB->reporte_dfestivos($objE);
				$res_dpermisos 	= 	$objB->reporte_dpermisos($objE);

				while ($objeto = $res_es->fetch_object()) {
						$ess[] = $objeto;
				}

				while ($objeto = $res_dj->fetch_object()) {
						$djs[] = $objeto;
				}

				while ($objeto = $res_df->fetch_object()) {
						$dfs[] = $objeto;
				}

				while ($objeto = $res_dfestivos->fetch_object()) {
						$dfestivos[] = $objeto;
				}

				while ($objeto = $res_dpermisos->fetch_object()) {
						$dpermisos[] = $objeto;
				}

				$contador = 1;
				//var_dump($dfestivos);
				require('../Presentacion/BP_reporte_detalle.php');
				//var_dump($objE->getMes());

				break;
	}



?>