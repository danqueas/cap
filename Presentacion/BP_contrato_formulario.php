<form class="form-horizontal" id="form-contrato">
  <fieldset>

    <div class="form-group">
      <label class="col-lg-3 control-label">Fecha Inicio</label>
      <div class="col-lg-9">
        <input value="<?php echo $finicio ?>" type="date" class="form-control date" name="txtfinicio" id="txtfinicio">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Fecha Fin</label>
      <div class="col-lg-9">
        <input value="<?php echo $ffin ?>" type="date" class="form-control date" name="txtffin" id="txtffin">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Area</label>
      <div class="col-lg-9">
        <select class="form-control" name="area">
          <option>Seleccione</option>
          <?php

          if (isset($areas)) {
            foreach ($areas as $area) { 
              if ($idarea == $area->idarea ) { ?>
              <option value="<?php echo $area->idarea ?>" selected> <?php echo $area->nombre ?></option> 
            <?php  } else { ?>
              <option value="<?php echo $area->idarea ?>"> <?php echo $area->nombre ?></option> 
            <?php
              }
            }
           }
          ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Horario de Trabajo</label>
      <div class="col-lg-9">
        <select class="form-control" name="grupo">
          <option>Seleccione</option>
          <?php

          if (isset($grupos)) {
            foreach ($grupos as $grupo) { 
              if ($idgrupo == $grupo->idgrupo ) { ?>
              <option value="<?php echo $grupo->idgrupo ?>" selected> <?php echo $grupo->ngrupo ?></option> 
            <?php  } else { ?>
              <option value="<?php echo $grupo->idgrupo ?>"> <?php echo $grupo->ngrupo ?></option> 
            <?php
              }
            }
           }
          ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Descripcion</label>
      <div class="col-lg-9">
        <input value="<?php echo $descripcion ?>" type="text" class="form-control date" name="txtdescripcion" id="txtdescripcion">
      </div>
    </div>

    <div>
      <input type="hidden" value="<?php echo $idtrabajador ?>" name="txttrabajador">
      <input type="hidden" value="<?php echo $idcontrato ?>" name="txtcontrato">
      <input type="hidden" value="<?php echo $evento ?>" name="txtevento">
    </div>
  </fieldset>
</form>