	<?php  foreach ($años as $año) { ?>
	        <div class="row">
	         	<div class="col-lg-12">
	            	<div class="page-header">
	            		<h3 id="forms">Año : <?php echo $año->year; ?></h3>
	            	</div>

	            	<?php

	            	$objE->setYear($año->year);
	            	$objE->setIdtrabajador($_SESSION['idtrabajador']);

	            	$res_months = 	$objB->reporte_month($objE);

	            	while ($objeto = $res_months->fetch_object()) {
	            		  	$months[] = $objeto;
	            	} 
	            	$contador=0?>

					<table class="table table-striped table-hover ">
					  <thead>
					    <tr  class="danger">
					      <th><h5>#</h5></th>
					      <th><h5># Mes</h5></th>
					      <th><h5>Mes</h5></th>
					      <th><h5># Permisos</h5></th>
					      <th><h5># Faltas</h5></th>
					      <th><h5># Justificados</h5></th>
					      <th><h5># total atrasos</h5></th>
					      <th><h5># total Asistencias</h5></th> 
					      <th><h5>Accion</h5></th> 
					    </tr>
					  </thead>
					  <tbody>
	            	<?php
	            	foreach ($months as $month) { 
	            		$contador++;?>
					    <tr>
					      <td><h5><?php echo $contador; ?></h5></td>
					      <td><h5><?php echo $month->num_mes; ?></h5></td>
					      <td><h5><?php echo $month->nom_mes; ?></h5></td>
					      <td><h5><?php echo $month->dias_permiso; ?></h5></td>
					      <td><h5><?php echo $month->dias_faltas; ?></h5></td>
					      <td><h5><?php echo $month->dias_justificados; ?></h5></td>
					      <td><h5><?php echo $month->total_atrasos; ?></h5></td>
					      <td><h5><?php echo $month->total_dias; ?></h5></td>
					      <td><h5>
					      	<a data-mes="<?php echo $month->nom_mes;?>" data-nummes="<?php echo $month->num_mes; ?>" data-control="<?php echo $month->idcontrol; ?>" class="ver-detalle" ><i class="fa fa-search"></i> Detalle</a>
					      </h5></td>
					    </tr>
	            	<?php } ?>
					  </tbody>
					</table> 
	        	</div>
	        </div>
	<?php } ?>