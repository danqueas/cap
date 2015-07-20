<?php

//Son directivas de php ?php

class TipoTrabajadorE{

    private	$idtipotrabajador;
    private	$ntipotrabajador;
    private	$descripcion;
	private $estado;

	
	function __construct($a, $b, $c, $d){
		$this->idtipotrabajador=$a;
		$this->ntipotrabajador=$b;
		$this->descripcion=$c;
		$this->estado=$d;


	}
    //get es para retornar	
	function getIdtipotrabajador() {return $this->idtipotrabajador;}
	function getNtipotrabajador() {return $this->ntipotrabajador;}
	function getDescripcion() {return $this->descripcion;}
	function getEstado() {return $this->estado;}



	
	//set es para modificar el valor almacenado	
	function setIdtipotrabajador($val) {$this->idtipotrabajador=$val;}
	function setNtipotrabajador($val) {$this->ntipotrabajador=$val;}
	function setDescripcion($val) {$this->descripcion=$val;}
	function setEstado($val) {$this->estado=$val;}


	
}
