<?php
require('../Conexion/db_conexion.php');
require('../Entidad/UsuarioEntidad.php');
require('../Datos/UsuariosDatos.php');


$con 	= 	new Conexion();
$objE	= 	new UsuarioE("","","","","");
$objB	= 	new UsuarioD();

//USUARIOS
	// setIdusuario
	// setIdtrabajador
	// setNombre
	// setPassword
	// setEstado


switch ($_POST['evento']) {


		case 'ver-usuarios': // LISTADO DE USUARIOS X TRABAJADOR
			$objE->setIdtrabajador($_POST['idtrabajador']);
			$idtrabajador = $_POST['idtrabajador'];

			$res_usuarios	=	$objB->mostrar_usuarioxtrabajador($objE);
			while ($objeto = $res_usuarios->fetch_object()) {
				$usuarios[]	=	$objeto;
			}

			$contador = 1;
			
			//var_dump($res_usuarios);
			require('../Presentacion/BP_usuarios.php');
			break;

		case 'agregar-usuarios': // FORMULARIO NUEVO USUARIO
			$objE->setIdtrabajador($_POST['idtrabajador']);

			$nom_usuario 		= "";
			$pass_usuario 		= "";
			$idusuario 			= "";
			$idtrabajador 		= $_POST['idtrabajador'];
			$evento 			= "registrar-usuarios";

			require("../Presentacion/BP_usuarios_formulario.php");
			break;
			
		case 'editar-usuarios': // FORMULARIO NUEVO USUARIO
			$objE->setIdusuario($_POST['idusuario']);

			$res_usuarios	= 	$objB->buscar_usuarioxid($objE);

			$datos 			= 	$res_usuarios->fetch_object();

			$idusuario  		= 	$datos->idusuario;
			$nom_usuario 		= 	$datos->nombre;
			$pass_usuario 		= 	$datos->password;
			$idtrabajador 		=   $_POST['idtrabajador'];

			$evento 			= "modificar-usuarios";

			require("../Presentacion/BP_usuarios_formulario.php");
			break;

		case 'registrar-usuarios': // FORMULARIO NUEVO USUARIO
			$objE->setIdtrabajador($_POST['idtrabajador']);
			$objE->setNombre($_POST['nombre']);
			$objE->setPassword($_POST['password']);

			$res_usuarios	=	$objB->insertar_usuario($objE);

			echo $res_usuarios;
			break;

		case 'modificar-usuarios': // FORMULARIO NUEVO USUARIO

			$objE->setNombre($_POST['nombre']);
			$objE->setPassword($_POST['password']);
			$objE->setIdusuario($_POST['idusuario']);

			$res_usuarios	=	$objB->modificar_usuario($objE);
			echo $res_usuarios;

			break;

		case 'estado-usuarios': // FORMULARIO NUEVO USUARIO
			$objE->setIdusuario($_POST['idusuario']);

			if ($_POST['estado'] =='A') {

				$objE->setEstado('D');

			}
			else if($_POST['estado'] =='D') {

				$objE->setEstado('A');	
			}

			$res_usuarios	=	$objB->estado_usuario($objE);
			
			echo $res_usuarios;
			break;
		default:
			echo "Ocurrio un Error";
			break;
}



?>