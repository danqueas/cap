<table class="table table-striped table-hover font-table">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Hora Ingreso</th>
      <th>Hora de Salida</th>
      <th>Estado</th>
      <th>Accion</th>
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
            <td><?php echo ucwords($horario->hsalida) ?></td>
            <td><?php echo $horario->estado ?></td>
            <td>
                <a class="horario-evento" data-event="<?php echo $est_reg_horario ?>" data-estado="<?php echo $horario->estado ?>" id="<?php echo $horario->id_hortur ?>" data-grupo="<?php echo $idgrupo ?>"><i class="fa <?php echo $icono;?>"></i></a>
            </td>
          </tr>

      <?php }

      } else { }
    
    ?>

  </tbody>
</table>
