	        <div class="row">
	         	<div class="col-lg-12">
	            	<div class="page-header">
	            		<h3 id="forms">Mes : <?php echo $mes; ?> <button class="btn btn-sm btn-info regresar"><i class="fa fa-backward"></i></button></h3>

	            	</div>
					<strong>DIAS ASISTIDOS </strong>
					<table class="table table-striped table-hover ">
					  <thead>
					    <tr class="success">
					      <th><h5>#</h5></th>
					      <th><h5>Fecha</h5></th>
					      <th><h5>Hora Ingreso</h5></th>
					      <th><h5>Hora Salida</h5></th>
					      <th><h5>Dia</h5></th>
					    </tr>
					  </thead>
					  <tbody>
	            	<?php
	            	$contador=0;
	            	foreach ($ess as $es) { 
	            		$contador++;?>
					    <tr class="active">
					      <td><h5><?php echo $contador; ?></h5></td>
					      <td><h5><?php echo $es->fentrada; ?></h5></td>
					      <td><h5><?php echo $es->hinicio; ?></h5></td>
					      <td><h5><?php echo $es->hfin; ?></h5></td>
					      <td><h5><?php echo $es->dia; ?></h5></td>
					    </tr>
	            	<?php } ?>
					  </tbody>
					</table> 
					<br><br>
					<strong>DIAS FALTADOS </strong>
					<table class="table table-striped table-hover ">
					  <thead>
					    <tr  class="success">
					      <th><h5>#</h5></th>
					      <th><h5>Fecha</h5></th>
					      <th><h5>Señal</h5></th>
					    </tr>
					  </thead>
					  <tbody>
	            	<?php
	            	$contador=0;
	            	if (isset($dfs)) {
		            	foreach ($dfs as $df) { 
		            		$contador++;?>
						    <tr>
						      <td><h5><?php echo $contador; ?></h5></td>
						      <td><h5><?php echo $df->fecha; ?></h5></td>
							  <td><?php
							if (isset($djs)) {
		            			foreach ($djs as $dj) {
		            			if ($df->fecha == $dj->finicio) { ?>
						      			<span class="label label-success">Justificado</span>
		            		<?php	} } }

							if (isset($dfestivos)) {
		            			foreach ($dfestivos as $dfestivo) {
		            			if ($df->fecha == $dfestivo->fecha) { ?>
						      			<span class="label label-info">Dia Festivo</span>
		            		<?php	} } } ?>
		            		  </td>
						    </tr>
		         	<?php  } 
	            	} ?>
					  </tbody>
					</table> 

					<br><br>
					<strong>DIAS PERMISOS </strong>
					<table class="table table-striped table-hover ">
					  <thead>
					    <tr class="success">
					      <th><h5>#</h5></th>
					      <th><h5>Fecha</h5></th>
					      <th><h5>Motivo</h5></th>
					    </tr>
					  </thead>
					  <tbody>
	            	<?php
	            	$contador=0;
	            	if (isset($dpermisos)) {
		            	foreach ($dpermisos as $dpermiso) { 
		            		$contador++;?>
						    <tr class="active">
						      <td><h5><?php echo $contador; ?></h5></td>
						      <td><h5><?php echo $dpermiso->fecha; ?></h5></td>
						      <td><h5><?php echo $dpermiso->observacion; ?></h5></td>
						    </tr>
		            	<?php  } 
	            	} ?>
					  </tbody>
					</table> 


					<br><br>
					<strong>DIAS JUSTIFICADOS </strong>
					<table class="table table-striped table-hover ">
					  <thead>
					    <tr class="success">
					      <th><h5>#</h5></th>
					      <th><h5>Fecha</h5></th>
					      <th><h5>Motivo</h5></th>
					    </tr>
					  </thead>
					  <tbody>
	            	<?php
	            	$contador=0;
	            	if (isset($djs)) {
	            	foreach ($djs as $dj) { 
	            		$contador++;?>
					    <tr class="active">
					      <td><h5><?php echo $contador; ?></h5></td>
					      <td><h5><?php echo $dj->finicio; ?></h5></td>
					      <td><h5><?php echo $dj->observacion; ?></h5></td>
					    </tr>
	            	<?php  } 
	            	} ?>
					  </tbody>
					</table> 

					<br><br>
					<strong>DIAS FESTIVOS </strong>
					<table class="table table-striped table-hover ">
					  <thead>
					    <tr class="success">
					      <th><h5>#</h5></th>
					      <th><h5>Fecha</h5></th>
					      <th><h5>Motivo</h5></th>
					    </tr>
					  </thead>
					  <tbody>
	            	<?php
	            	$contador=0;
	            	if (isset($dfestivos)) {
	            	foreach ($dfestivos as $dfestivo) { 
	            		$contador++;?>
					    <tr class="active">
					      <td><h5><?php echo $contador; ?></h5></td>
					      <td><h5><?php echo $dfestivo->fecha; ?></h5></td>
					      <td><h5><?php echo $dfestivo->nombre; ?></h5></td>
					    </tr>
	            	<?php  } 
	            	} ?>
					  </tbody>
					</table> 
	        	</div>
	        </div>
