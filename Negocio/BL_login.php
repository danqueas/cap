<?php 
session_start();
require('../Conexion/db_conexion.php');
require('../Entidad/UsuarioEntidad.php');
require('../Datos/UsuariosDatos.php');

$con 	= 	new Conexion();
$objE	= 	new UsuarioE("","","","","");
$objB	= 	new UsuarioD();

// setIdusuario
// setIdtrabajador
// setNombre
// setPassword
// setEstado

switch ($_POST['evento']) {

	case 'verificar':

			$objE->setNombre($_POST['txtusuario']);
			$objE->setPassword($_POST['txtpassword']);

			$res_usuario	=	$objB->verificar_usuario($objE);

			if (count($res_usuario)>0) {
				
				$datos = $res_usuario->fetch_object();

				$_SESSION['nombres'] 	  		= $datos->nombres;
				$_SESSION['idtrabajador'] 		= $datos->idtrabajador;
				$_SESSION['ntipotrabajador'] 	= $datos->ntipotrabajador;

				switch ($_SESSION['ntipotrabajador']) {
					case 'administrador':
						header('Location:../main.php');
						break;
					case 'control':
						header('Location:../Negocio/BL_control.php');
						break;
					case 'trabajador':
						header('Location:../Negocio/BL_reporte_trabajador.php');
						break;		
					default:
						header('Location:../');
						break;
				}

			}
			
	break;
	
	default:
	
	break;
}
?>