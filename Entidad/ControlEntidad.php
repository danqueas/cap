<?php

//Son directivas de php ?php

class ControlE{
    private	$usuario;
    private	$idcontrato;
    private	$idcontrol;
    private	$fecha;
    private	$inicio;
    private	$fin;
    private	$idtrabajador;
    private	$ides;
    private	$idgrupo;
    private	$atrasos;
    private	$dias;

	
	function __construct($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k){
		$this->usuario=$a;
		$this->idcontrato=$b;
		$this->idcontrol=$c;
		$this->fecha=$d;
		$this->inicio=$e;
		$this->fin=$f;
		$this->idtrabajador=$g;
		$this->ides=$h;
		$this->idgrupo=$i;
		$this->atrasos=$j;
		$this->dias=$k;

	}
    //get es para retornar	
	function getUsuario() {return $this->usuario;}
	function getIdcontrato() {return $this->idcontrato;}
	function getIdcontrol() {return $this->idcontrol;}
	function getFecha() {return $this->fecha;}
	function getInicio() {return $this->inicio;}
	function getFin() {return $this->fin;}
	function getIdtrabajador() {return $this->idtrabajador;}
	function getIdes() {return $this->ides;}
	function getIdgrupo() {return $this->idgrupo;}
	function getAtrasos() {return $this->atrasos;}
	function getDias() {return $this->dias;}

	//set es para modificar el valor almacenado	
	function setUsuario($val) {$this->usuario=$val;}
	function setIdcontrato($val) {$this->idcontrato=$val;}
	function setIdcontrol($val) {$this->idcontrol=$val;}
	function setFecha($val) {$this->fecha=$val;}
	function setInicio($val) {$this->inicio=$val;}
	function setFin($val) {$this->fin=$val;}
	function setIdtrabajador($val) {$this->idtrabajador=$val;}
	function setIdes($val) {$this->ides=$val;}
	function setIdgrupo($val) {$this->idgrupo=$val;}
	function setAtrasos($val) {$this->atrasos=$val;}
	function setDias($val) {$this->dias=$val;}


	
}


?>