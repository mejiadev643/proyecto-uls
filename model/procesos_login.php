<?php  
	include_once('conexion.php');

	class Login extends DbConfig
	{
		public function __construct()
		{
			parent::__construct();
		}//no se si sea necesario ya que esta heredando el metodo construct de la clase padre

		private function setNames()
		{
			return $this->connect->query("SET NAMES 'utf8'");
		}//obtiene los nombres en caracteres validos (incluye tildes y ñ)

		public function getData($query)//recibimos una consulta sql del archivo controller_login.php, para averiguar si el usuario ingresado es valido
		{	
			self::setNames();//llamamos el metodo setNames y lo usamos para traer las tildes y ñ
			$result = $this->connect->query($query); //guardamos el resultado en una variable y hacemos la conexion con la base de datos $this->connect y hacemos la consulta query->($query)
			return $result;//devolvemos el resultado
		}
    public function getData2($query)//recibe variable nombrada sql anteriormente y la procesa
    {	
        self::setNames();	
        $result = $this->connect->query($query);
        if  ($result == false)
        {
            return false;
        }
        $rows = array();
        while ($row = $result->fetch_assoc())
        {
            $rows[] = $row;
        }
        return $rows;
    }

		public function execute($query) // recibe la orden sql y la ejecuta en la base de datos(update)
		{
			self::setNames();//llamamos el metodo setNames y lo usamos para traer las tildes y ñ
			$result = $this->connect->query($query); //se conecta a la base y se hace el update
			
			if ($result == false)//si falla la conexion
			{
				return false;//se devolvera false
			} 
			else //de lo contrario
			{
				return true;//se devolvera true
			}		
		}
		
		public function escape_string($value) //se recolecta el valor y se convierte en una cadena de caracteres validos
		{
			return $this->connect->real_escape_string($value);//devuelve caracteres validos, y no caracteres especiales
		}
	}
?>