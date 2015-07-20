<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Control de Personal</title>
	<link rel="stylesheet" href="complementos/css/bootstrap.min.css">
	<link rel="stylesheet" href="complementos/css/menu.css">
	<link rel="stylesheet" href="complementos/css/font-awesome.min.css">

</head>
<body>


<!-- -->
	<div class="navbar navbar-default">

		<div class="container">

		  <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			    </button>
			    <a class="navbar-brand" href="#">CONTROL</a>
		  </div>
		  <div class="navbar-collapse collapse navbar-responsive-collapse size">
			    <ul class="nav navbar-nav">
			      <li class="active"><a class="enlace" href="main.php">Home</a></li>
			      <li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i> General <b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li><a class="enlace" ruta="area">Area</a></li>
				          <li class="divider"></li>
				          <!-- <li><a class="enlace" ruta="dlaborales">Dias Laborales</a></li> -->
				          <li><a class="enlace" ruta="dfestivo">Dias Festivos</a></li>
				          <li class="divider"></li>
				          <li><a class="enlace" ruta="tpermiso">Tipos de Permiso</a></li>
				          <li><a class="enlace" ruta="ttrabajador">Tipo de Trabajador</a></li>
				          <li class="divider"></li>
				          <li><a class="enlace" ruta="grupo">Grupo</a></li>
				          <li><a class="enlace" ruta="horario">Horario</a></li>
				        </ul>
			      </li>
			      <li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Mantenimiento de Personal <b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li><a class="enlace" ruta="trabajador">Trabajador</a></li>
				          <li class="divider"></li>
				          <li><a class="enlace" ruta="contrato">Contratos</a></li>
				          <li class="divider"></li>				          
				          <li><a class="enlace" ruta="permisos">Permisos</a></li>
				          <!-- <li><a class="enlace" ruta="justificaciones">Justificaciones</a></li> -->
				        </ul>
			      </li>
			      <li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-calendar"></i> Tabla Control <b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li><a class="enlace" ruta="admin-control">Control</a></li>
				        </ul>
			      </li>
			    </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="logout.php"><i class="fa fa-power-off"></i> Cerrar Session</a></li>
		      </ul>
		  </div>

		</div>

	</div>
	
	<div class="container cuerpo-principal">
			
	</div>

</body>



<script src="complementos/js/jquery.min.js"></script>
<script src="complementos/js/jquery-ui.min.js"></script>
<script src="complementos/js/bootstrap.min.js"></script>
<script src="complementos/js/bootbox.min.js"></script>
<script src="js/main.js"></script>




</html>