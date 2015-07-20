<script src="js/Tipopermiso.js"></script>

<legend>
  Tipos de Permiso
  <button class="btn btn-default btn-sm modal-tpermiso" data-event="nuevo">
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
    <tr class="danger">
      <th>#</th>
      <th>Descripcion</th>
      <th>N. Dias</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php

      if (isset($tpermisos)) {
      
        foreach ($tpermisos as $tpermiso) { ?>
          <tr>
            <td><?php echo $contador++ ?></td>
            <td><?php echo ucwords($tpermiso->descripcion) ?> </td>
            <td><?php echo ucwords($tpermiso->ndias) ?></td>
            <td><?php echo $tpermiso->estado ?></td>
            <td>
                <a class="modal-tpermiso" data-event="editar" id="<?php echo $tpermiso->idtpermiso ?>"><i class="fa fa-pencil"></i></a>
                &nbsp;&nbsp;&nbsp;
                <a class="tpermiso-estado" data-event="estado" data-estado="<?php echo $tpermiso->estado ?>" id="<?php echo $tpermiso->idtpermiso ?>"><i class="fa fa-refresh"></i></a>
            </td>
          </tr>

      <?php }

      } else { }
    
    ?>

  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="tpermiso-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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