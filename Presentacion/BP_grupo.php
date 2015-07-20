<script src="js/Grupo.js"></script>

<legend>
  Grupos Horario
  <button class="btn btn-default btn-sm modal-grupo" data-event="nuevo">
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
    <tr  class="danger">
      <th>#</th>
      <th>Grupo</th>
      <th>Estado</th>
      <th>Horarios</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php

      if (isset($grupos)) {
      
        foreach ($grupos as $grupo) { ?>
          <tr>
            <td><?php echo $contador++ ?></td>
            <td><?php echo ucwords($grupo->ngrupo) ?> </td>
            <td><?php echo ucwords($grupo->estado) ?> </td>
            <td>
              <a class="modal-horarios" data-event="ver" id="<?php echo $grupo->idgrupo ?>" ><i class="fa fa-eye"></i></a>
              &nbsp; &nbsp;
              <a class="modal-horarios" data-event="agregar" id="<?php echo $grupo->idgrupo ?>"><i class="fa fa-plus"></i></a>
            </td>
            <td>
                <a class="modal-grupo" data-event="editar" id="<?php echo $grupo->idgrupo ?>"><i class="fa fa-pencil"></i></a>
                &nbsp;&nbsp;&nbsp;
                <a class="grupo-estado " data-event="estado" data-estado="<?php echo $grupo->estado ?>" id="<?php echo $grupo->idgrupo ?>"><i class="fa fa-refresh"></i></a>
            </td>
          </tr>

      <?php }

      } else { }
    
    ?>

  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="grupo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<!-- Modal -->
<div class="modal fade" id="horario-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="h-modal-title" id="myModalLabel"></h4>
      </div>
      <div class="h-modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>