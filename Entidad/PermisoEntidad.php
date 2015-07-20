<?php

//Son directivas de php ?php

class PermisoE{
		private $idpermiso;
		private $fecha;
		private $observacion;
		private $idtpermiso;
		private $idtrabajador;
		private $idtablacontrol;
		private $diaspermisos;
		private $idcontrato;



	function __construct($a, $b, $c, $d, $e,$f,$g,$h){

		$this->idpermiso=$a;
		$this->fecha=$b;
		$this->observacion=$c;
		$this->idtpermiso=$d;
		$this->idtrabajador=$e;
		$this->idtablacontrol=$f;
		$this->diaspermisos=$g;
		$this->idcontrato=$h;
	}
    //get es para retornar	
	function getIdpermiso() {return $this->idpermiso;}
	function getFecha() {return $this->fecha;}
	function getObservacion() {return $this->observacion;}
	function getIdtpermiso() {return $this->idtpermiso;}
	function getIdtrabajador() {return $this->idtrabajador;}
	function getIdtablacontrol() {return $this->idtablacontrol;}
	function getDiaspermisos() {return $this->diaspermisos;}
	function getIdcontrato() {return $this->idcontrato;}

	  //set es para modificar el valor almacenado	
	function setIdpermiso($val) {$this->idpermiso=$val;}
	function setFecha($val) {$this->fecha=$val;}
	function setObservacion($val) {$this->observacion=$val;}
	function setIdtpermiso($val) {$this->idtpermiso=$val;}
	function setIdtrabajador($val) {$this->idtrabajador=$val;}
	function setIdtablacontrol($val) {$this->idtablacontrol=$val;}
	function setDiaspermisos($val) {$this->diaspermisos=$val;}
	function setIdcontrato($val) {$this->idcontrato=$val;}

}


?>