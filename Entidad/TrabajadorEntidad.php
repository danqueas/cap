<?php

//Son directivas de php ?php

class TrabajadorE{

    private	$idtrabajador;
    private	$nombre;
    private	$apellido;
    private	$dni;
	private $sexo;
    private	$direccion;
    private	$estado;
    private	$idttrabajador;

	
	function __construct($a, $b, $c, $d, $e, $f, $g, $h){
		$this->idtrabajador=$a;
		$this->nombre=$b;
		$this->apellido=$c;
		$this->dni=$d;
		$this->sexo=$e;
		$this->direccion=$f;
		$this->estado=$g;
		$this->idttrabajador=$h;


	}
    //get es para retornar	
	function getIdtrabajador() {return $this->idtrabajador;}
	function getNombre() {return $this->nombre;}
	function getApellido() {return $this->apellido;}
	function getDni() {return $this->dni;}
	function getSexo() {return $this->sexo;}
	function getDireccion() {return $this->direccion;}
	function getEstado() {return $this->estado;}
	function getIdttrabajador() {return $this->idttrabajador;}



	
	//set es para modificar el valor almacenado	
	function setIdtrabajador($val) {$this->idtrabajador=$val;}
	function setNombre($val) {$this->nombre=$val;}
	function setApellido($val) {$this->apellido=$val;}
	function setDni($val) {$this->dni=$val;}
	function setSexo($val) {$this->sexo=$val;}
	function setDireccion($val) {$this->direccion=$val;}
	function setEstado($val) {$this->estado=$val;}
	function setIdttrabajador($val) {$this->idttrabajador=$val;}
	
}
?>
	