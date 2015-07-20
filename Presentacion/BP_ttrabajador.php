<script src="js/Tipotrabajador.js"></script>

<legend>
  Tipos de Trabajador
  <button class="btn btn-default btn-sm modal-ttrabajador" data-event="nuevo">
    <i class="fa fa-plus-circle fa-lg"></i>
  </button>
</legend>

<div class="form-group">
  <div class="input-group">
    <span class="input-group-addon">Busqueda</span>
    <input type="text" class="form-control" placeholder="Busqueda por Descripcion" name="txtbusqueda">
    <span class="input-group-btn">
      <button class="btn btn-default" type="button" id="btn-busqueda"><i class="fa fa-search"></i></button>
    </span>
  </div>
</div>

<table class="table table-striped table-hover font-table">
  <thead>
    <tr  class="danger">
      <th>#</th>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php

      if (isset($ttrabajadores)) {
      
        foreach ($ttrabajadores as $ttrabajador) { ?>
          <tr class="active">
            <td><?php echo $contador++ ?></td>
            <td><?php echo ucwords($ttrabajador->ntipotrabajador) ?> </td>
            <td><?php echo ucwords($ttrabajador->descripcion) ?></td>
            <td><?php echo $ttrabajador->estado ?></td>
            <td>
                <a class="modal-ttrabajador" data-event="editar" id="<?php echo $ttrabajador->idtipotrabajador ?>"><i class="fa fa-pencil"></i></a>
                &nbsp;&nbsp;&nbsp;
                <a class="ttrabajador-estado" data-event="estado" data-estado="<?php echo $ttrabajador->estado ?>" id="<?php echo $ttrabajador->idtipotrabajador ?>"><i class="fa fa-refresh"></i></a>
            </td>
          </tr>

      <?php }

      } else { }
    
    ?>

  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="ttrabajador-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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