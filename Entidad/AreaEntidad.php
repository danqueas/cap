<?php

//Son directivas de php ?php

class AreaE{
    private	$idarea;
    private	$nombre;
	private $descripcion;
	private $estado;
	
	function __construct($idarea, $nombre, $descripcion, $estado){
		$this->idarea=$idarea;
		$this->nombre=$nombre;
		$this->descripcion=$descripcion;
		$this->estado=$estado;
	}
    //get es para retornar	
	function getIdarea() {return $this->idarea;}
	function getNombre() {return $this->nombre;}
	function getDescripcion() {return $this->descripcion;}
	function getEstado() {return $this->estado;}

	
	//set es para modificar el valor almacenado	
	function setIdarea($val) {$this->idarea=$val;}
	function setNombre($val) {$this->nombre=$val;}
	function setDescripcion($val) {$this->descripcion=$val;}
	function setEstado($val) {$this->estado=$val;}
	
}


?>