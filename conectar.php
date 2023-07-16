<?php
class conectar extends PDO
{
	private $servidor = "localhost";
	private $nombreBd = "servicioweb";
	private $usuarioBd = "root";
	private $contra = "";

		public function __construct()
		{
			try{
				parent::__construct('mysql:host=' . $this->servidor . ';dbname=' . $this->nombreBd . ';charset = utf8',  $this->usuarioBd, $this->contra, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

				} catch(PDOException $e){
				echo ' Ha ocurrido un error:' . $e->getMessage();
				exit;
				}
		} 
}
?>