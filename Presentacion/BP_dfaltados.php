<script src="js/Dfaltados.js"></script>

<legend>
  Dias Faltados
  <button class="btn btn-default btn-sm modal-dfaltados" data-event="nuevo">
    <i class="fa fa-plus-circle fa-lg"></i>
  </button>
</legend>

<div class="form-group">
  <div class="input-group">
    <span class="input-group-addon">Busqueda</span>
    <input type="text" class="form-control" placeholder="Busqueda por Observacion" name="txtbusqueda">
    <span class="input-group-btn">
      <button class="btn btn-default" type="button" id="btn-busqueda"><i class="fa fa-search"></i></button>
    </span>
  </div>
</div>

<table class="table table-striped table-hover font-table">
  <thead>
    <tr>
      <th>#</th>
      <th>Inicio</th>
      <th>Final</th>
      <th>Observacion</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php

      if (isset($dfaltados)) {
      
        foreach ($dfaltados as $dfaltado) { ?>
          <tr>
            <td><?php echo $contador++ ?></td>
            <td><?php echo ucwords($dfaltado->finicio) ?> </td>
            <td><?php echo ucwords($dfaltado->ftermino) ?></td>
            <td><?php echo $dfaltado->observacion ?></td>
            <td><?php echo $dfaltado->estado ?></td>
            <td>
                <a class="modal-dfaltados" data-event="editar" id="<?php echo $dfaltado->idfaltado ?>"><i class="fa fa-pencil"></i></a>
                &nbsp;&nbsp;&nbsp;
                <a class="dfaltado-estado" data-event="estado" data-estado="<?php echo $dfaltado->estado ?>" id="<?php echo $dfaltado->idfaltado ?>"><i class="fa fa-refresh"></i></a>
            </td>
          </tr>

      <?php }

      } else { }
    
    ?>

  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="dfaltados-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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