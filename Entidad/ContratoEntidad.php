<?php

//Son directivas de php ?php

class ContratoE{

    private	$idcontrato;
    private	$idtrabajador;
    private	$idarea;
    private	$idgrupo;
    private	$finicio;
    private	$ffin;
	private $descripcion;
	private $estado;
	
	function __construct($a, $b, $c, $d, $e, $f, $g, $h){
    $this->idcontrato=$a;
    $this->idtrabajador=$b;
    $this->idarea=$c;
    $this->idgrupo=$d;
    $this->finicio=$e;
    $this->ffin=$f;
	$this->descripcion=$g;
	$this->estado=$h;
	}
    //get es para retornar	
	function getIdcontrato() {return $this->idcontrato;}
	function getIdtrabajador() {return $this->idtrabajador;}
	function getIdarea() {return $this->idarea;}
	function getIdgrupo() {return $this->idgrupo;}
	function getFinicio() {return $this->finicio;}
	function getFfin() {return $this->ffin;}
	function getDescripcion() {return $this->descripcion;}
	function getEstado() {return $this->estado;}
	
	//set es para modificar el valor almacenado	
	function setIdcontrato($val) {$this->idcontrato=$val;}
	function setIdtrabajador($val) {$this->idtrabajador=$val;}
	function setIdarea($val) {$this->idarea=$val;}
	function setIdgrupo($val) {$this->idgrupo=$val;}
	function setFinicio($val) {$this->finicio=$val;}
	function setFfin($val) {$this->ffin=$val;}
	function setDescripcion($val) {$this->descripcion=$val;}
	function setEstado($val) {$this->estado=$val;}
}


?>