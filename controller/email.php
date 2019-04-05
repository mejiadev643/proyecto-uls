<?php 
	class Email
	{
		public $dest; //destino
		public $asun; //asunto
		public $mens; //mensaje
		public function __construct($dest, $asun, $mens)
		{
			$this->dest= $dest;
			$this->asun= $asun;
			$this->mens= $mens;
		}
	}
	class Email_2 extends Email
	{
		public function Correo()
		{
			if (mail($this->dest, $this->asun, $this->mens))//si los datos estan llenos osea True
			{
				require '../view/token/confirm.php';//en este momento la clase Email_2 pertenece a la carpeta /controller/verificar.php, por esa razon se hace un llamado inalcanzable desde esta localizacion
			}
		}
	}
?>