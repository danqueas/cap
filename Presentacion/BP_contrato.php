<script src="js/Contrato.js"></script>
<legend>
  CONTRATOS
</legend>

<div class="form-group">
  <div class="input-group">
    <span class="input-group-addon">Busqueda</span>
    <input type="text" class="form-control" placeholder="Busqueda por D.N.I" name="txtbusqueda">
    <span class="input-group-btn">
      <button class="btn btn-default" type="button" id="btn-busqueda-contrato"><i class="fa fa-search"></i></button>
    </span>
  </div>
</div>

<table class="table table-striped table-hover font-table">
  <thead>
    <tr class="danger">
      <th>#</th>
      <th>Nombre</th>
      <th>Dni</th>
      <th>Fecha Inicio</th>
      <th>Fecha Fin</th>
      <th>Tipo Trabajador</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php

      if (isset($trabajadores)) {
      
        foreach ($trabajadores as $trabajador) { ?>
          <tr>
            <td><?php echo $contador++ ?></td>
            <td><?php echo ucwords($trabajador->nombres) ?> </td>
            <td><?php echo ucwords($trabajador->dni) ?> </td>
            <td><?php echo ucwords($trabajador->fechainicio) ?> </td>
            <td><?php echo ucwords($trabajador->fechafin) ?> </td>
            <td><?php echo ucwords($trabajador->ntipotrabajador) ?> </td>
            <td><?php echo ($trabajador->estado) ?></td>
            <td>
                <a class="modal-contrato" data-event="editar" id="<?php echo $trabajador->idcontrato ?>"><i class="fa fa-pencil"></i></a>
                &nbsp;&nbsp;&nbsp;
                <a class="contrato-estado " data-event="estado" data-estado="<?php echo $trabajador->estado ?>" id="<?php echo $trabajador->idcontrato ?>"><i class="fa fa-refresh"></i></a>
            </td>
          </tr>

      <?php }

      } else { }
    
    ?>

  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="contrato-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="cont-modal-title" id="myModalLabel"></h4>
      </div>
      <div class="cont-modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-guardar-contrato">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>