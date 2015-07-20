<script src="js/Horario.js"></script>

<legend>
  Horario
  <button class="btn btn-default btn-sm modal-horario" data-event="nuevo">
    <i class="fa fa-plus-circle fa-lg"></i>
  </button>
</legend>

<div class="form-group">
  <div class="input-group">
    <span class="input-group-addon">Busqueda</span>
    <input type="text" class="form-control" placeholder="Busqueda por Dia" name="txtbusqueda">
    <span class="input-group-btn">
      <button class="btn btn-default" type="button" id="btn-busqueda"><i class="fa fa-search"></i></button>
    </span>
  </div>
</div>

<table class="table table-striped table-hover font-table">
  <thead>
    <tr class="danger">
      <th>#</th>
      <th>Dia</th>
      <th>H. Entrada</th>
      <th>H. Salida</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php

      if (isset($horarios)) {
      
        foreach ($horarios as $horario) { ?>
          <tr>
            <td><?php echo $contador++ ?></td>
            <td><?php echo ucwords($horario->dia) ?> </td>
            <td><?php echo ucwords($horario->hentrada) ?></td>
            <td><?php echo $horario->hsalida ?></td>
            <td><?php echo $horario->estado ?></td>
            <td>
                <a class="modal-horario" data-event="editar" id="<?php echo $horario->idhorario ?>"><i class="fa fa-pencil"></i></a>
                &nbsp;&nbsp;&nbsp;
                <a class="horario-estado" data-event="estado" data-estado="<?php echo $horario->estado ?>" id="<?php echo $horario->idhorario ?>"><i class="fa fa-refresh"></i></a>
            </td>
          </tr>

      <?php }

      } else { }
    
    ?>

  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="horario-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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