<?php


class UsuarioE{

    private	$idusuario;
    private	$idtrabajador;
    private	$nombre;
	private $password;
	private $estado;
	
	function __construct($a, $b, $c, $d, $e){
		$this->idusuario=$a;
		$this->idtrabajador=$b;
		$this->nombre=$c;
		$this->password=$d;
		$this->estado=$e;
	}
    //get es para retornar	
	function getIdusuario() {return $this->idusuario;}
	function getIdtrabajador() {return $this->idtrabajador;}
	function getNombre() {return $this->nombre;}
	function getPassword() {return $this->password;}
	function getEstado() {return $this->estado;}

	
	//set es para modificar el valor almacenado	
	function setIdusuario($val) {$this->idusuario=$val;}
	function setIdtrabajador($val) {$this->idtrabajador=$val;}
	function setNombre($val) {$this->nombre=$val;}
	function setPassword($val) {$this->password=$val;}
	function setEstado($val) {$this->estado=$val;}
	
}

