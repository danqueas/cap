<?php

//Son directivas de php ?php

class DiasFestivosE{
	private $idfestivo;
	private $fecha;
	private $tipotrabajador;
	private $nombre;
	private $estado;
	
	function __construct($a, $b, $c, $d, $e){

		$this->idfestivo=$a;
		$this->fecha=$b;
		$this->tipotrabajador=$c;
		$this->nombre=$d;
		$this->estado=$e;
	}
    //get es para retornar	
	function getIdfestivo() {return $this->idfestivo;}
	function getFecha() {return $this->fecha;}
	function getNombre() {return $this->nombre;}
	function getTipotrabajador() {return $this->tipotrabajador;}
	function getEstado() {return $this->estado;}

	
	  //set es para modificar el valor almacenado	
	function setIdfestivo($val) {$this->idfestivo=$val;}
	function setFecha($val) {$this->fecha=$val;}
	function setNombre($val) {$this->nombre=$val;}
	function setTipotrabajador($val) {$this->tipotrabajador=$val;}
	function setEstado($val) {$this->estado=$val;}
	
}


?>