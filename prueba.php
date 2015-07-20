<?php
date_default_timezone_set("America/Lima");

$dias_sem = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");  //empezamos con Domingo ya que la funcion date también lo hace
$date= date('Y-m-d');
$arraydate = explode ("-", $date);
$dateunix= mktime(0,0,0,$arraydate[1],$arraydate[2],$arraydate[0]);
$dia=date("w", $dateunix); 

echo $dias_sem[$dia];