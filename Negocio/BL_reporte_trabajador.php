<?php 
session_start();
require('../Conexion/db_conexion.php');
require('../Datos/ReporteTrabajadorDatos.php');
require('../Entidad/ReporteTrabajadorEntidad.php');


$con 		= 	new Conexion();
$objE		= 	new ReportetE("","","","","","");
$objB		= 	new ReportetD();

//setIdtrabajador
//setIdcontrol
//setYear
//setIdgrupo
//setDfestivos

if (isset($_POST['evento'])) {

	switch ($_POST['evento']) {

			case 'inicio': 

				$idtrabajador 		= 		$_SESSION['idtrabajador'];

				$objE->setIdtrabajador($idtrabajador);
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
				
				//echo $idtrabajador;
				break;

			case 'ver-detalle':
				
				$idcontrol 		= 	$_POST['idcontrol'];
				$idtrabajador 	= 	$_SESSION['idtrabajador'];
				$mes 			= 	$_POST['nummes'];

				$objE->setIdcontrol($idcontrol);
				$objE->setDfestivos('');
				$objE->setMes($mes);
				$objE->setIdtrabajador($idtrabajador);

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
				break;
	}

}
else{
	header('Location:../main-trabajador.php');
}

?>