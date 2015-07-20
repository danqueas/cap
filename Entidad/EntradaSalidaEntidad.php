<?php

//Son directivas de php ?php

class EntradaSalida{

    private	$ides;
    private	$idfestivo;
    private	$idpermiso;
	private $idcontrol;
	private $idtrabajador;
	private $fentrada;
	private $hinicio;
	private $hfin;
	
	function __construct($a, $b, $c, $d, $e, $f, $g, $h){
		$this->ides=$a;
		$this->idfestivo=$b;
		$this->idpermiso=$c;
		$this->idcontrol=$d;
		$this->idtrabajador=$e;
		$this->fentrada=$f;
		$this->hinicio=$g;
		$this->hfin=$h;
	}
    //get es para retornar	
	function getIdes() {return $this->ides;}
	function getIdfestivo() {return $this->idfestivo;}
	function getIdpermiso() {return $this->idpermiso;}
	function getControl() {return $this->idcontrol;}
	function getIdtrabajador() {return $this->idtrabajador;}
	function getFentrada() {return $this->fentrada;}
	function getHinicio() {return $this->hinicio;}
	function getHfin() {return $this->hfin;}

	
	//set es para modificar el valor almacenado	
	function setIdes($val) {$this->ides=$val;}
	function setIdfestivo($val) {$this->idfestivo=$val;}
	function setIdpermiso($val) {$this->idpermiso=$val;}
	function setIdcontrol($val) {$this->idcontrol=$val;}
	function setIdtrabajador($val) {$this->idtrabajador=$val;}
	function setFentrada($val) {$this->fentrada=$val;}
	function setHinicio($val) {$this->hinicio=$val;}
	function setHfin($val) {$this->hfin=$val;}

}
