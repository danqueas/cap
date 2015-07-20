<?php

//Son directivas de php ?php

class ReportetE{
    private	$idtrabajador;
    private	$idcontrol;
    private	$year;
    private	$idgrupo;
    private	$dfestivos;
    private	$mes;

	function __construct($a,$b,$c,$d,$e,$f){
		$this->idtrabajador=$a;
		$this->idcontrol=$b;
		$this->year=$c;
		$this->idgrupo=$d;
		$this->dfestivos=$e;
		$this->mes=$f;

	}
    //get es para retornar	
	function getIdtrabajador() {return $this->idtrabajador;}
	function getIdcontrol() {return $this->idcontrol;}
	function getYear() {return $this->year;}
	function getIdgrupo() {return $this->idgrupo;}
	function getDfestivos() {return $this->dfestivos;}
	function getMes() {return $this->mes;}

	//set es para modificar el valor almacenado	
	function setIdtrabajador($val) {$this->idtrabajador=$val;}
	function setIdcontrol($val) {$this->idcontrol=$val;}
	function setYear($val) {$this->year=$val;}
	function setIdgrupo($val) {$this->idgrupo=$val;}
	function setDfestivos($val) {$this->dfestivos=$val;}
	function setMes($val) {$this->mes=$val;}

	
}


?>