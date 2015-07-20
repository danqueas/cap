<?php

//Son directivas de php ?php

class GrupoE{

    private	$idgrupo;
    private	$ngrupo;
    private	$estado;
	
	function __construct($a, $b, $c){
		$this->idgrupo=$a;
		$this->ngrupo=$b;
		$this->estado=$c;
	}
    //get es para retornar	
	function getIdgrupo() {return $this->idgrupo;}
	function getNgrupo() {return $this->ngrupo;}
	function getEstado() {return $this->estado;}

	
	//set es para modificar el valor almacenado	
	function setIdgrupo($val) {$this->idgrupo=$val;}
	function setNgrupo($val) {$this->ngrupo=$val;}
	function setEstado($val) {$this->estado=$val;}

	
}
