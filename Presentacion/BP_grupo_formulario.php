<form class="form-horizontal" id="form-grupo">
  <fieldset>

    <div class="form-group">
      <label class="col-lg-2 control-label">Nombre</label>
      <div class="col-lg-10">
        <input value="<?php echo $ngrupo ?>" type="text" class="form-control" name="txtngrupo" id="txtngrupo">
      </div>
    </div>

    <div>
      <input type="hidden" value="<?php echo $idgrupo ?>" name="txtidgrupo">
      <input type="hidden" value="<?php echo $evento ?>" name="txtevento">
    </div>
  </fieldset>
</form>
