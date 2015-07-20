<?php

//Son directivas de php ?php

class TablaControlE{
	private $idcontrol;
	private $idfaltado;
	private $observacion;
	
	function __construct($a, $b, $c){

		$this->idcontrol=$a;
		$this->idfaltado=$b;
		$this->observacion=$c;
	}
    //get es para retornar	
	function getIdcontrol() {return $this->idcontrol;}
	function getIdfaltado() {return $this->idfaltado;}
	function getObservacion() {return $this->observacion;}

	
	  //set es para modificar el valor almacenado	
	function setIdcontrol($val) {$this->idcontrol=$val;}
	function setIdfaltado($val) {$this->idfaltado=$val;}
	function setObservacion($val) {$this->observacion=$val;}
	
}


?>