<?php

//Son directivas de php ?php

class ResumenE{

    private	$idresumen;
    private	$idtrabajador;
    private	$ides;

	
	function __construct($a, $b, $c){
		$this->idresumen=$a;
		$this->idtrabajador=$b;
		$this->ides=$c;


	}
    //get es para retornar	
	function getIdresumen() {return $this->idresumen;}
	function getIdtrabajador() {return $this->idtrabajador;}
	function getIdes() {return $this->ides;}



	
	//set es para modificar el valor almacenado	
	function setIdresumen($val) {$this->idresumen=$val;}
	function setIdtrabajador($val) {$this->idtrabajador=$val;}
	function setIdes($val) {$this->ides=$val;}



}