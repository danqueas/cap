<?php

//Son directivas de php ?php

class HistorialE{

    private	$idhistorial;
    private	$idtrabajador;
    private	$descripcion;

	
	function __construct($a, $b, $c, $d){
		$this->idhistorial=$a;
		$this->idtrabajador=$b;
		$this->descripcion=$c;

	}
    //get es para retornar	
	function getIdhistorial() {return $this->idhistorial;}
	function getIdtrabajador() {return $this->idtrabajador;}
	function getDescripcion() {return $this->descripcion;}



	
	//set es para modificar el valor almacenado	
	function setIdhistorial($val) {$this->idhistorial=$val;}
	function setIdtrabajador($val) {$this->idtrabajador=$val;}
	function setDescripcion($val) {$this->descripcion=$val;}


	
}

