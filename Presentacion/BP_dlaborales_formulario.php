<form class="form-horizontal" id="form-dlaborales">
  <fieldset>

    <div class="form-group">
      <label class="col-lg-2 control-label">Periodo</label>
      <div class="col-lg-10">
        <select class="form-control" id="periodo" name="periodo">
        <?php
        for ($i=date('Y'); $i <= (date('Y')+1); $i++) { 
          if ($Periodo == $i) { ?>
              <option value="<?php echo $i; ?>" selected> <?php echo $i; ?></option>
        <?php } else { ?>
              <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
        <?php }          
          }  ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2 control-label">Mes</label>
      <div class="col-lg-10">
        <select class="form-control" id="mes" name="mes">
        <option>Seleccionar</option>
        <?php
          foreach ($meses as $mes) { 
              if ($Nom_mes == $mes->nom_mes)
              { ?>
                  <option value="<?php echo $mes->nom_mes; ?>" selected> <?php echo $mes->nom_mes; ?></option>
        <?php
              }
              else
              { ?>
                  <option value="<?php echo $mes->nom_mes; ?>"> <?php echo $mes->nom_mes; ?></option>
        <?php
              }
          } ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">N. Dias Laborales</label>
      <div class="col-lg-10">
        <input value="<?php echo $Dias_laborales ?>" type="number" class="form-control" name="txtdlaborales" id="txtdlaborales">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2 control-label">N. Dias Festivos</label>
      <div class="col-lg-10">
        <input value="<?php echo $Dias_festivos ?>" type="number" class="form-control" name="txtdfestivos" id="txtdfestivos">
      </div>
    </div>

    <div>
      <input type="hidden" value="<?php echo $Iddialaboral ?>" name="txtiddiaslaborales">
      <input type="hidden" value="<?php echo $evento ?>" name="txtevento">
    </div>
  </fieldset>
</form>