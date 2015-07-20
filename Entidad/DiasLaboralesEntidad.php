<?php

//Son directivas de php ?php

class DiasLaboralesE{
	private $iddialaboral;
	private $periodo;
	private $nom_mes;
	private $num_mes;
	private $dias_laborales;
	private $dias_festivos;
	
	function __construct($a, $b, $c, $d, $e, $f){

		$this->iddialaboral=$a;
		$this->periodo=$b;
		$this->nom_mes=$c;
		$this->num_mes=$d;
		$this->dias_laborales=$e;
		$this->dias_festivos=$f;
	}
    //get es para retornar	
	function getIddialaboral() {return $this->iddialaboral;}
	function getPeriodo() {return $this->periodo;}
	function getNom_mes() {return $this->nom_mes;}
	function getNum_mes() {return $this->num_mes;}
	function getDias_laborales() {return $this->dias_laborales;}
	function getDias_festivos() {return $this->dias_festivos;}

	
	  //set es para modificar el valor almacenado	
	function setIddialaboral($val) {$this->iddialaboral=$val;}
	function setPeriodo($val) {$this->periodo=$val;}
	function setNom_mes($val) {$this->nom_mes=$val;}
	function setNum_mes($val) {$this->num_mes=$val;}
	function setDias_laborales($val) {$this->dias_laborales=$val;}
	function setDias_festivos($val) {$this->dias_festivos=$val;}
	
}


?>