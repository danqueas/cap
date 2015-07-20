<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Control de Personal</title>
	<link rel="stylesheet" href="complementos/css/bootstrap.min.css">
	<link rel="stylesheet" href="complementos/css/menu.css">
	<link rel="stylesheet" href="complementos/css/font-awesome.min.css">

<script language="javascript" type="text/javascript">

function enfoca_primero($cual) {
    var frm=document.getElementById($cual);
    var arr_input=frm.getElementsByTagName("input");
    arr_input[0].focus();
}

function mueveReloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()

    str_segundo = new String (segundo)
    if (str_segundo.length == 1)
       segundo = "0" + segundo

    str_minuto = new String (minuto)
    if (str_minuto.length == 1)
       minuto = "0" + minuto

    str_hora = new String (hora)
    if (str_hora.length == 1)
       hora = "0" + hora

    horaImprimible = hora + " : " + minuto + " : " + segundo

    document.form_reloj.reloj.value = horaImprimible

    setTimeout("mueveReloj()",1000)
}

</script>

</head>
<body onLoad="javascript:enfoca_primero('loginbox');mueveReloj();">


<!-- -->
	<div class="navbar navbar-default">

		<div class="container">

		  <div class="navbar-header">
			    <a class="navbar-brand" href="#"><strong>SISTEMA DE CONTROL DE ASISTENCIA</strong></a>
		  </div>
		  <div class="navbar-collapse collapse navbar-responsive-collapse size">
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="logout.php"><i class="fa fa-power-off"></i> Cerrar Session</a></li>
		      </ul>
		  </div>

		</div>

	</div>
	
	<div class="container cuerpo-principal">
     <div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="forms">CONTROL DE INGRESOS</h1>
            </div>
          </div>
        </div>

		<div class="row">
          	<div class="col-lg-12">
				<form class="form-horizontal" id="loginbox">
					  <fieldset>
						<div class="form-group">
						  <div class="input-group" id="usuario-control">
						    <span class="input-group-addon">INGRESE SU USUARIO</span>
						    <input type="text" class="form-control" placeholder="Ingrese su usuario" name="txtusuario" autocomplete="off">
						    <span class="input-group-btn">
						      <button class="btn btn-success btn-ingreso" type="button">INGRESO</button>
						    </span>
						    <span class="input-group-btn">
						      <button class="btn btn-danger btn-salida" type="button">SALIDA</button>
						    </span>
						  </div>

						</div>
					  </fieldset>
				</form>
			</div>
		</div>

		<div class="row">
          <div class="col-lg-12">
            <div class="well bs-component">
				<div class="row">
		          <div class="col-lg-5">
					<form name="form_reloj" id="reloj">
						<p><strong id="tiempo"></strong></p><br><br>
						<input  class="time" type="text" size="10" name="reloj" id="reloj" readonly></input>
					</form>

		          </div>
		          <div class="col-lg-7">

					<div class="form-group">
					  <label class="control-label" for="focusedInput">Trabajador</label>
					  <input readonly class="form-control" id="trabajador" name="txttrabajador" type="text" value="__________________">
					</div>

				  <div class="row">

			          <div class="col-lg-4">
						<div class="form-group">
						  <label class="control-label" for="focusedInput">Fecha </label>
						  <input readonly class="form-control" id="fecha" name="txtfecha" type="text" value="__/__/__">
						</div>
					  </div>

			          <div class="col-lg-4">
						<div class="form-group">
						  <label class="control-label" for="focusedInput">Hora Entrada</label>
						  <input readonly class="form-control" id="hingreso" name="txtentrada" type="text" value="00:00:00">
						</div>
					  </div>

			          <div class="col-lg-4">
						<div class="form-group">
						  <label class="control-label" for="focusedInput">Hora Salida</label>
						  <input readonly class="form-control" id="hsalida" name="txtsalida" type="text" value="00:00:00">
						</div>
					  </div>

		          </div>

					<div class="form-group">
					  <label class="control-label" for="focusedInput">Mensaje</label>
					  <input readonly class="form-control" id="mensaje" name="txtmensaje" type="text" value="">
					</div>

		          </div>
		        </div>
            </div>
          </div>

	 </div>
	</div>
	</div>

</body>



<script src="complementos/js/jquery.min.js"></script>
<script src="complementos/js/jquery-ui.min.js"></script>
<script src="complementos/js/bootstrap.min.js"></script>
<script src="complementos/js/bootbox.min.js"></script>
<script src="js/main-control.js"></script>

<script>
	
var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
var f = new Date();
document.getElementById("tiempo").innerHTML = "Hoy " + diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear();

</script>

</html>