<form class="form-horizontal" id="form-horario">
  <fieldset>

    <div class="form-group">
      <label class="col-lg-2 control-label">Dia</label>
      <div class="col-lg-10">
        <input value="<?php echo $dia_horario ?>" type="text" class="form-control" name="txtdia" id="txtdia">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2 control-label">H Entrada</label>
      <div class="col-lg-10">
        <input value="<?php echo $hentrada_horario ?>" type="time" class="form-control" name="txtentrada" id="txtentrada">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2 control-label">H Salida</label>
      <div class="col-lg-10">
        <input value="<?php echo $hsalida_horario ?>" type="time" class="form-control" name="txtsalida" id="txtsalida">
      </div>
    </div>

    <div>
      <input type="hidden" value="<?php echo $idhorario ?>" name="txtidhorario">
      <input type="hidden" value="<?php echo $evento ?>" name="txtevento">
    </div>
  </fieldset>
</form>