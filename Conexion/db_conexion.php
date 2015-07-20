<?php

class Conexion{

	var $servidor;
	var $baseDatos;
	var $usuario;
	var $clave;
	var $cn; //Conexion
	var $rs; //ResultaSet | Flag

	function Conexion(){
		$this->servidor 	= "localhost";
		$this->baseDatos	= "bd_controlpersonal";
		$this->usuario		= "root";
		$this->clave 		= "";
	}

	function abrir(){
		$this->cn = new mysqli($this->servidor,
								$this->usuario,
								$this->clave,
								$this->baseDatos);
	}

	function ejecutar($sql){
		$this->abrir();
		if ($this->cn->connect_error) { Die("Error de Conexion");}
		else 
		$this->rs 	= 	$this->cn->query("SET NAMES 'utf8'");
		$this->rs 	= 	$this->cn->query("SET CHARACTER SET 'utf8'");
		$this->rs 	= 	$this->cn->query($sql);

		return $this->rs;
	}

	function cerrar(){
		$this->cn->close();
	}


}
	
?>