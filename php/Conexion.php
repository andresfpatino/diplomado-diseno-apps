<?php 
	class Conexion{

		private $servidor;
		private $usuario;
		private $clave;
		private $base;
		
		protected $conectar;

		public function __construct($s,$u,$c,$b){
			$this->servidor=$s;
			$this->usuario=$u;
			$this->clave=$c;
			$this->base=$b;

			$this->conectar=new mysqli($this->servidor,$this->usuario,$this->clave,$this->base);
			if ($this->conectar->connect_error) {
				die("Error de Conexion <br>".$this->conectar->connect_error);
			}
		}
		public function __destruct(){
			$this->conectar->close();
		}
	}
 ?>