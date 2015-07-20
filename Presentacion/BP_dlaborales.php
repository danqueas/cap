<script src="js/Dlaborales.js"></script>

<legend>
  Dias Laborales
  <button class="btn btn-default btn-sm modal-dlaborales" data-event="nuevo">
    <i class="fa fa-plus-circle fa-lg"></i>
  </button>
</legend>

<div class="form-group">
  <div class="input-group">
    <span class="input-group-addon">Busqueda</span>
    <input type="text" class="form-control" placeholder="Busqueda por periodo" name="txtbusqueda">
    <span class="input-group-btn">
      <button class="btn btn-default" type="button" id="btn-busqueda"><i class="fa fa-search"></i></button>
    </span>
  </div>
</div>

<table class="table table-striped table-hover font-table">
  <thead>
    <tr class="danger">
      <th>#</th>
      <th>Periodo</th>
      <th>Mes</th>
      <th># Dias Laborales</th>
      <th># Dias Festivos</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php

      if (isset($dlaborales)) {
      
        foreach ($dlaborales as $dlaboral) { ?>
          <tr>
            <td><?php echo $contador++ ?></td>
            <td><?php echo ucwords($dlaboral->periodo) ?> </td>
            <td><?php echo ucwords($dlaboral->nom_mes) ?></td>
            <td><?php echo $dlaboral->num_diaslaborales ?></td>
            <td><?php echo $dlaboral->num_diasfestivos ?></td>
            <td>
                <a class="modal-dlaborales" data-event="editar" id="<?php echo $dlaboral->iddialaboral ?>"><i class="fa fa-pencil"></i></a>
            </td>
          </tr>

      <?php }

      } else { }
    
    ?>

  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="dlaborales-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-guardar">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>