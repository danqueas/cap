<?php

//Son directivas de php ?php

class TipoPermisoE{
	private $idtpermiso;
	private $descripcion;
	private $ndias;
	private $estado;
	
	function __construct($a, $b, $c, $d){

		$this->idtpermiso=$a;
		$this->descripcion=$b;
		$this->ndias=$c;
		$this->estado=$d;
	}
    //get es para retornar	
	function getIdtpermiso() {return $this->idtpermiso;}
	function getDescripcion() {return $this->descripcion;}
	function getNdias() {return $this->ndias;}
	function getEstado() {return $this->estado;}

	
	  //set es para modificar el valor almacenado	
	function setIdtpermiso($val) {$this->idtpermiso=$val;}
	function setDescripcion($val) {$this->descripcion=$val;}
	function setNdias($val) {$this->ndias=$val;}
	function setEstado($val) {$this->estado=$val;}
	
}


?>