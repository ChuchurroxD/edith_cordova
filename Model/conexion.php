<?php 
	date_default_timezone_get("America/Lima");
	/**
	* 
	*/
	class Conexion{
		public static function getConexion() {
			$conexion = mysqli_connect("localhost","root","","edithstudio");
    		return $conexion;
		}
	}


?>
