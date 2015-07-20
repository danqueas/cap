<?php

//Son directivas de php ?php

class DiasFaltadosE{
	private $idfaltado;
    private	$finicio;
	private $ftermino;
	private $observacion;
	private $estado;
	
	function __construct($a, $b, $c, $d, $e){
		$this->idfaltado=$a;
		$this->finicio=$b;
		$this->ftermino=$c;
		$this->observacion=$d;
		$this->estado=$e;
	}
    //get es para retornar	
	function getIdfaltado() {return $this->idfaltado;}
	function getFinicio() {return $this->finicio;}
	function getFtermino() {return $this->ftermino;}
	function getObservacion() {return $this->observacion;}
	function getEstado() {return $this->estado;}

	
	  //set es para modificar el valor almacenado	
	function setIdfaltado($val) {$this->idfaltado=$val;}
	function setFinicio($val) {$this->finicio=$val;}
	function setFtermino($val) {$this->ftermino=$val;}
	function setObservacion($val) {$this->observacion=$val;}
	function setEstado($val) {$this->estado=$val;}
	
}


?>