<form class="form-horizontal" id="form-dfaltados">
  <fieldset>

    <div class="form-group">
      <label class="col-lg-2 control-label">Inicio</label>
      <div class="col-lg-10">
        <input value="<?php echo $finicio_dfaltados ?>" type="text" class="form-control" name="txtfinicio" id="txtfinicio">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2 control-label">Termino</label>
      <div class="col-lg-10">
        <input value="<?php echo $ftermino_dfaltados ?>" type="text" class="form-control" name="txtftermino" id="txtftermino">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2 control-label">Observacion</label>
      <div class="col-lg-10">
        <input value="<?php echo $obs_dfaltados ?>" type="text" class="form-control" name="txtobservacion" id="txtobservacion">
      </div>
    </div>

    <div>
      <input type="hidden" value="<?php echo $idfaltado ?>" name="txtidfaltado">
      <input type="hidden" value="<?php echo $evento ?>" name="txtevento">
    </div>
  </fieldset>
</form>
