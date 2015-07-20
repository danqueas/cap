<?php

//Son directivas de php ?php

class TurnoE{

    private	$idturno;
	private $idhorario;
	private $idgrupo;
    private	$estado;
	
	function __construct($a, $b, $c){
		$this->idturno=$a;
		$this->idhorario=$b;
		$this->idgrupo=$c;
		$this->estado=$c;

	}
    //get es para retornar	
	function getIdturno() {return $this->idturno;}
	function getIdhorario() {return $this->idhorario;}
	function getIdgrupo() {return $this->idgrupo;}
	function getEstado() {return $this->estado;}


	//set es para modificar el valor almacenado	
	function setIdturno($val) {$this->idturno=$val;}
	function setIdhorario($val) {$this->idhorario=$val;}
	function setIdgrupo($val) {$this->idgrupo=$val;}
	function setEstado($val) {$this->estado=$val;}

	
}
