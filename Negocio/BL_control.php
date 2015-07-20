<?php 

require('../Conexion/db_conexion.php');
require('../Datos/ControlDatos.php');
require('../Entidad/ControlEntidad.php');


$con 		= 	new Conexion();
$objE		= 	new ControlE("","","","","","","","","","","");
$objB		= 	new ControlD();

//setUsuario
//setIdcontrato
//setIdcontrol
//setFecha
//setInicio
//setFin
//setIdtrabajador
//setIdes
//setIdgrupo
//setAtrasos
//setDias
date_default_timezone_set("America/Lima");

$dias_sem = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");  //empezamos con Domingo ya que la funcion date también lo hace
$date= date('Y-m-d');
$arraydate = explode ("-", $date);
$dateunix= mktime(0,0,0,$arraydate[1],$arraydate[2],$arraydate[0]);
$dia=date("w", $dateunix); 


$Sumar = 15; // Cuantos minutos sumaremos

function sumarMinutosFecha($FechaStr, $MinASumar) {

	$FechaStr = str_replace(":", " ", $FechaStr);

	$FechaOrigen = explode(" ", $FechaStr);

	$Horas = $FechaOrigen[0];
	$Minutos = $FechaOrigen[1];
	$Segundos = $FechaOrigen[2];

	// Sumo los minutos
	$Minutos = ((int)$Minutos) - ((int)$MinASumar);

	// Asigno la fecha modificada a una nueva variable
	$FechaNueva = date("H:i:s",mktime($Horas,$Minutos,$Segundos));

	return $FechaNueva;
}


if (isset($_POST['evento'])) {

	switch ($_POST['evento']) {

			case 'ingresar-asistencia': // BUSCAMOS UN AREA POR NOMBRE

				$usuario 		= 	$_POST['usuario'];
				$objE->setUsuario($usuario);

				//verificamos la existencia del usuario y un contrato activo
				$res_contrato	=	$objB->verificar_contrato($objE);
				$d_contrato 	=  	$res_contrato->fetch_object();

				if (count($d_contrato)>0) {
					//obtenemos id idcontrato
					$idcontrato  		= 	$d_contrato->idcontrato;
					$idtrabajador  		= 	$d_contrato->idtrabajador;
					$idgrupo  			= 	$d_contrato->idgrupo;
					$nombres  			= 	$d_contrato->nombres;
					$fecha  			= 	$d_contrato->fecha;
					$tiempo  			= 	$d_contrato->tiempo;

					$objE->setIdcontrato($idcontrato);

					//obtengo horario de trabajo
					$objE->setIdgrupo($idgrupo);
					$res_turnos = $objB->turnos_grupo_ingreso($objE);
					$turnos 	= $res_turnos->fetch_object();

					$turno_dia 		= $turnos->dia;
					$turno_hentrada = $turnos->hentrada;
					$turno_hsalida  = $turnos->hsalida;
					$nombre_dia     = $dias_sem[$dia];

					$hora_ingreso_permitido =sumarMinutosFecha($turno_hentrada,$Sumar);
					$hora_actual = date ("H:i:s",time());

					if($turno_dia == $nombre_dia){
						if($tiempo>=$hora_ingreso_permitido){
							//verificamos la existencia de TablaControl para este Contrato por Mes
							$res_tablacontrol  	= 	$objB->verificar_tablacontrol($objE);
							$d_tablacontrol 	=  	$res_tablacontrol->fetch_object();

							if (is_null($d_tablacontrol)) {
								//creamos el registro tablacontrol para el mes actual
								$res_creartablacontrol 	= $objB->crear_tablacontrol($objE);

								//verificamos la existencia de TablaControl para este Contrato por Mes
								$res_tablacontrol  	= 	$objB->verificar_tablacontrol($objE);
								$d_tablacontrol 	=  	$res_tablacontrol->fetch_object();

								//obtenemos id tablacontrol
							}

							//idtablacontrol
								$idtablacontrol  	= 	$d_tablacontrol->idcontrol;
								$totalatrasos  		= 	$d_tablacontrol->total_atrasos;
								$totaldias  		= 	$d_tablacontrol->total_dias;

								//verificamos si se ha registrado ingreso el dia de hoy

								$res_verificaringreso 	= $objB->verificar_ingreso($objE);
								$v_ingreso 				= $res_verificaringreso->fetch_object();

								if (is_null($v_ingreso)){
									//creamos el ingreso el dia de hoy
									$objE->setIdcontrato($idcontrato);
									$objE->setIdcontrol($idtablacontrol);
									$objE->setFecha($fecha);
									$objE->setInicio($tiempo);

									$res_ingreso 		= $objB->crear_ingreso($objE);
									if ($res_ingreso) {

										$res_verificaringreso 	= $objB->verificar_ingreso($objE);
										$v_ingreso 				= $res_verificaringreso->fetch_object();

										$identradasalida 		= $v_ingreso->ides;

										$objE->setIdtrabajador($idtrabajador);
										$objE->setIdes($identradasalida);
										$objB->crear_resumen($objE);

										//actualizacion tablacontrol
											if ($turno_hentrada >= $tiempo) {
												$totaldias++;
												
												$objE->setAtrasos($totalatrasos);
												$objE->setDias($totaldias);
												$objE->setIdcontrol($idtablacontrol);

												$objB->actualizar_tablacontrol($objE);

											}
											else{
												$totalatrasos++;
								  				$totaldias++;

												$objE->setAtrasos($totalatrasos);
												$objE->setDias($totaldias);
												$objE->setIdcontrol($idtablacontrol);

												$objB->actualizar_tablacontrol($objE);
											}

									}

										$hingreso = $v_ingreso->hinicio;
										$hsalida  = "";
										$mensaje = "SE REGISTRO SU INGRESO CORRECTAMENTE";
									
								}
								else{

									if (is_null($v_ingreso->hfin)){


										$hingreso = $v_ingreso->hinicio;
										$hsalida  = "";
										$mensaje = "SU INGRESO YA FUE REGISTRADO";
									}
									else{

										$hingreso = $v_ingreso->hinicio;
										$hsalida  = $v_ingreso->hfin;
										$mensaje = "YA SE REGISTRARON INGRESO / SALIDA";
									}
								}
						}
						else{
							$mensaje 	= "SU HORA DE INGRESO AUN NO ESTA ACTIVA";
							$hingreso 	= "";
							$hsalida  	= "";
						}


					}
					else{
						$hingreso 	= "";
						$hsalida  	= "";
						$mensaje 	= "SU CONTRATO NO CONTEMPLA INGRESOS PARA EL DIA DE HOY";
					}
					//var_dump($turnos);
				}
				else{
					$hingreso 	= "";
					$hsalida  	= "";
					$mensaje 	= "NO EXISTE EL USUARIO Y/O NO TIENES UN CONTRATO ACTIVO";
				}
				//var_dump($areas);
				$arr = array(
					"nombres"	=> $nombres,
					"fecha" 	=> $fecha,
					"ingreso"	=> $hingreso,
					"salida"	=> $hsalida,
					"mensaje"	=> $mensaje
					);


				echo json_encode($arr);
				//var_dump(json_encode($arr));

			break;
			case 'salida-asistencia':


				$usuario 		= 	$_POST['usuario'];
				$objE->setUsuario($usuario);

				//verificamos la existencia del usuario y un contrato activo
				$res_contrato	=	$objB->verificar_contrato($objE);
				$d_contrato 	=  	$res_contrato->fetch_object();

				if (count($d_contrato)>0) {
					//obtenemos id idcontrato
					$idcontrato  		= 	$d_contrato->idcontrato;
					$idtrabajador  		= 	$d_contrato->idtrabajador;
					$idgrupo  			= 	$d_contrato->idgrupo;
					$nombres  			= 	$d_contrato->nombres;
					$fecha  			= 	$d_contrato->fecha;
					$tiempo  			= 	$d_contrato->tiempo;

					$objE->setIdcontrato($idcontrato);

					//obtengo horario de trabajo
					$objE->setIdgrupo($idgrupo);
					$res_turnos = $objB->turnos_grupo($objE);
					$turnos 	= $res_turnos->fetch_object();

					$turno_hentrada = $turnos->hentrada;
					$turno_hsalida  = $turnos->hsalida;

					//verificamos la existencia de TablaControl para este Contrato por Mes
					$res_tablacontrol  	= 	$objB->verificar_tablacontrol($objE);
					$d_tablacontrol 	=  	$res_tablacontrol->fetch_object();


					if (is_null($d_tablacontrol)) {
						//creamos el registro tablacontrol para el mes actual
						$res_creartablacontrol 	= $objB->crear_tablacontrol($objE);

						//verificamos la existencia de TablaControl para este Contrato por Mes
						$res_tablacontrol  	= 	$objB->verificar_tablacontrol($objE);
						$d_tablacontrol 	=  	$res_tablacontrol->fetch_object();

						//obtenemos id tablacontrol
					}

					//idtablacontrol
						$idtablacontrol  	= 	$d_tablacontrol->idcontrol;
						$totalatrasos  		= 	$d_tablacontrol->total_atrasos;
						$totaldias  		= 	$d_tablacontrol->total_dias;

						//verificamos si se ha registrado ingreso el dia de hoy

						$res_verificaringreso 	= $objB->verificar_ingreso($objE);
						$v_ingreso 				= $res_verificaringreso->fetch_object();

						if (is_null($v_ingreso)){
						
								$hingreso = "";
								$hsalida  = "";
								$mensaje = "ES NECESARIO REGISTRAR SU INGRESO";
							
						}
						else{

							if (is_null($v_ingreso->hfin)){
							
									//id del ingreso del dia
									$idingreso 	= 	$v_ingreso->ides;


									$objE->setFin($tiempo);
									$objE->setIdes($idingreso);
									$res_salida = $objB->crear_salida($objE);


									//actualizacion tablacontrol
										if ($turno_hsalida >= $tiempo) {
											$totalatrasos++;
											$objE->setAtrasos($totalatrasos);
											$objE->setDias($totaldias);
											$objE->setIdcontrol($idtablacontrol);

											$objB->actualizar_tablacontrol($objE);

										}
										else{
											$objE->setAtrasos($totalatrasos);
											$objE->setDias($totaldias);
											$objE->setIdcontrol($idtablacontrol);

											$objB->actualizar_tablacontrol($objE);
										}

								$hingreso = $v_ingreso->hinicio;
								$hsalida  = $tiempo;
								$mensaje = "SE REGISTRO SU SALIDA CORRECTAMENTE";
							}
							else{

								$hingreso = $v_ingreso->hinicio;
								$hsalida  = $v_ingreso->hfin;
								$mensaje = "YA SE REGISTRARON INGRESO / SALIDA";
							}
						}

				}
				else{
					$nombre  	= "";
					$mensaje 	= "NO EXISTE EL USUARIO Y/O NO TIENES UN CONTRATO ACTIVO";
					$fecha 		= "";
					$hingreso 	= "";
					$hsalida  	= "";
				}
				//var_dump($areas);
				$arr = array(
					"nombres" => $nombres,
					"fecha" => $fecha,
					"ingreso" => $hingreso,
					"salida" => $hsalida,
					"mensaje" => $mensaje
					);

				echo json_encode($arr);
				//var_dump(json_encode($arr));

				break;
	}

}
else{
	header('Location:../main-control.php');
}

?>