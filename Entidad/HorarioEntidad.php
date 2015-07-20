<?php

//Son directivas de php ?php

class HorarioE{

    private	$idhorario;
    private	$dia;
    private	$hentrada;
	private $hsalida;
	private $estado;
	
	function __construct($a, $b, $c, $d, $e){
		$this->idhorario=$a;
		$this->dia=$b;
		$this->hentrada=$c;
		$this->hsalida=$d;
		$this->estado=$e;

	}
    //get es para retornar	
	function getIdhorario() {return $this->idhorario;}
	function getDia() {return $this->dia;}
	function getHentrada() {return $this->hentrada;}
	function getHsalida() {return $this->hsalida;}
	function getEstado() {return $this->estado;}


	
	//set es para modificar el valor almacenado	
	function setIdhorario($val) {$this->idhorario=$val;}
	function setDia($val) {$this->dia=$val;}
	function setHentrada($val) {$this->hentrada=$val;}
	function setHsalida($val) {$this->hsalida=$val;}
	function setEstado($val) {$this->estado=$val;}

	
}

