<?php  
	class DbConfig
	{
		private $dbhost = "localhost";
		private $dbuser = "root";
		private $bdpass = "";
		private $dbname = "uls_2019";

		protected $connect;

		public function __construct()
		{
			if (!isset($this->connect))
			{
				$this->connect = new mysqli($this->dbhost, $this->dbuser, $this->bdpass, $this->dbname);
				if (!$this->connect) 
				{
					echo "Error al conectar al servidor de la base de datos";
				}
			}
			return $this->connect;
		}
	}
?>
