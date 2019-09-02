<?php
	include("../model/procesos_login.php");//icluir el archivo nada mas, despues se trabajara
	session_start();  
	/*if (!isset($_SESSION["usuario"]))
	{
		header("location:../index.php");
	}
	/*else
	{
		header("location:../index.php");
	}*/ #esta parte es sustituida por el ! en la desicion if

	$p_login = new Login();//creacion de objeto de la clase login

	if (isset($_POST['login'])) //si esta lleno el post login
	{
		if (empty($_POST['usuario']) || empty($_POST['password']))//si esta vacio el post usuario y password 
		{
			header("location:../index.php?mensaje=".base64_encode("Todos los campos son requeridos")); // Codificamos un mensaje con GET
		}

		else
		{
			$usuario = $p_login->escape_string($_POST['usuario']);//el post se convierte en una cadena de caracteres valido eso significa scape string
			$clave = $p_login->escape_string($_POST['password']);//lo mismo ocurre en este caso, se instancia el objeto y se le ordena que se genere una cadena valida
			$sql = $p_login->getData("SELECT * FROM usuario WHERE carnet = '$usuario' AND AES_DECRYPT(contrasena,'Uluterana')= '$clave'");//consulta en sql para averiguar si existe el usuario mediante el carnet y la contrasena, para eso llamamos el metodo getData y todos sus atributos
			if ($sql->num_rows > 0)//num_rows es la cadena de caracteres que devuelve la consulta antes hecha, aqui dice que si devuelve una cadena de caracteres (array) haga lo siguiente
			{
				foreach ($sql as $res)// se usa para recorrer los arrays, en este caso, le estamos diciendo que la consultra traida en forma de array, pase a reconocerse con la clave res, cada pasada se asigna a una variable segun su post
				{
					$usuario = $res['carnet'];
					$clave = $res['contrasena'];
					$tipo = $res['id_tipo_usuario'];
					$carrera= $res['id_carrera'];//nueva linea
					$id=$res['id'];
				}
				/*consulta nuevamente para comprovar que es un usuario valido (yo lo considero innecesario)*/
				$query = $p_login->getData("SELECT * FROM usuario WHERE carnet = '$usuario' AND contrasena= '$clave' AND id_tipo_usuario= '$tipo'");
				//logica agregada prueba
				if ($query->num_rows > 0) 
				{
				  	$_SESSION['usuario'] = $_POST['usuario'];
				  	$_SESSION['tipo'] =  $tipo;
				  	$_SESSION['carrera']= $carrera;//nueva linea
				  	$_SESSION['id']= $id;
				}

				if ($tipo==1) {
					header("location:../view/user/Panel_user.php");
				} elseif ($tipo==2) {
					header("location:../view/operator/Panel_operator.php");
				}elseif ($tipo==3) {
					header("location:../view/admin/Panel_admin.php");
					//header("location:../user.php");#ignorar
				}else
				{
					header("location:../index.php?mensaje=".base64_encode("Datos incorrectos"));
				} 

			}
			else
			{
				header("location:../index.php?mensaje=".base64_encode("El usuario no existe :("));
			}

		}//end else
	}//end if
?>