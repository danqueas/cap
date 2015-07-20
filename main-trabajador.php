<?php  session_start(); ?>
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
			    <a class="navbar-brand" href="#"><strong><?php echo ucwords($_SESSION['nombres']); ?></strong></a>
		  </div>
		  <div class="navbar-collapse collapse navbar-responsive-collapse size">
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="logout.php"><i class="fa fa-power-off"></i> Cerrar Session</a></li>
		      </ul>
		  </div>

		</div>

	</div>
	<div class="container">
	    <div class="bs-docs-section reportes cuerpo-principal">

		</div>
	</div>



</body>



<script src="complementos/js/jquery.min.js"></script>
<script src="complementos/js/jquery-ui.min.js"></script>
<script src="complementos/js/bootstrap.min.js"></script>
<script src="complementos/js/bootbox.min.js"></script>
<script src="js/main-trabajador.js"></script>

</html>