<?php 
require('../Conexion/db_conexion.php');
require('../Entidad/TrabajadorEntidad.php');
require('../Datos/TrabajadorDatos.php');

$con 	= 	new Conexion();
$objE	= 	new TrabajadorE("","","","","","","","");
$objB	= 	new TrabajadorD();


//TRABAJADOR
	// setIdtrabajador
	// setNombre
	// setApellido
	// setDni
	// setSexo
	// setDireccion
	// setEstado
	// setIdttrabajador



switch ($_POST['evento']) {

		case 'buscar': // BUSCAMOS UN AREA POR NOMBRE
			$objE->setApellido($_POST['nombre']);
			$res_trabajadores	=	$objB->mostrar_trabajador($objE);

			while ($objeto = $res_trabajadores->fetch_object()) {
				$trabajadores[]	=	$objeto;
			}

			$contador	= 1;

			require('../Presentacion/BP_trabajador.php');
			break;

		case 'nuevo': // LLAMAMOS AL FORMULARIO VACIO
			$idtrabajador 	= "";
			$nombre 		= "";
			$apellido 		= "";
			$dni 			= "";
			$sexo 			= "";
			$direccion 		= "";
			$idttrabajador  = "";
			$evento		= "registrar";
			
			$res_ttrabajadores = $objB->mostrar_tipotrabajador();
			while ($objeto  = $res_ttrabajadores->fetch_object()) {
				$ttrabajadores[]	=	$objeto;
			}

			require('../Presentacion/BP_trabajador_formulario.php');
			break;

		case 'editar': // LLAMAMOS AL FORMULARIO Y LLENAMOS LOS CAMPOS
			$objE->setIdtrabajador($_POST['idtrabajador']);

			$res_trabajadores	=	$objB->buscar_trabajadorxid($objE);

			$datos 		= 	$res_trabajadores->fetch_object();

			$idtrabajador 	= $datos->idtrabajador;
			$nombre 		= $datos->nombre;
			$apellido		= $datos->apellidos;
			$dni 			= $datos->dni;
			$sexo 			= $datos->sexo;
			$direccion 		= $datos->direccion;
			$idttrabajador  = $datos->idttrabajador;

			$evento		= "modificar";

			$res_ttrabajadores = $objB->mostrar_tipotrabajador();
			while ($objeto  = $res_ttrabajadores->fetch_object()) {
				$ttrabajadores[]	=	$objeto;
			}

			require('../Presentacion/BP_trabajador_formulario.php');
			break;

		case 'registrar': // INSERTAMOS LOS DATOS A LA BD
			$objE->setNombre($_POST['nombre']);
			$objE->setApellido($_POST['apellido']);
			$objE->setDni($_POST['dni']);
			$objE->setSexo($_POST['sexo']);
			$objE->setDireccion($_POST['direccion']);
			$objE->setIdttrabajador($_POST['idttrabajador']);

			$res_trabajadores	=	$objB->insertar_trabajador($objE);
			
			echo $res_trabajadores;
			break;

		case 'modificar': //UPDATEAMOS LOS DATOS EN LA BD
			$objE->setNombre($_POST['nombre']);
			$objE->setApellido($_POST['apellido']);
			$objE->setDni($_POST['dni']);
			$objE->setSexo($_POST['sexo']);
			$objE->setDireccion($_POST['direccion']);
			$objE->setIdttrabajador($_POST['idttrabajador']);
			$objE->setIdtrabajador($_POST['idtrabajador']);

			$res_area	=	$objB->modificar_trabajador($objE);
			
			echo $res_area;
			break;

		case 'estado': // CAMBIAMOS EL ESTADO DEL ITEM SELECCIONADO
			$objE->setIdtrabajador($_POST['idtrabajador']);

			if ($_POST['estado']=='A') {
				$objE->setEstado('D');				
			}
			elseif($_POST['estado']=='D'){
				$objE->setEstado('A');				
			}
			$res_area	=	$objB->estado_trabajador($objE);
			echo $res_area;
			break;


}



?>