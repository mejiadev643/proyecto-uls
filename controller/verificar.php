<?php  
	include_once("../model/procesos_login.php");//se llama para hacer consultas
	include_once("email.php");//email se usara para mandar un mensaje de confirmacion

	$b_user =new login();// objeto creado de la clase login en el archivo procesos_login.php

	if (isset($_POST['procesar']))//si no esta vacio
	{
		/* depurado por obsoleto
		$tipo= $_POST['tipo'];
		$count= count($tipo);

		if ($count>1) 
		{
			header("location:../views/pass/recuperar.php?error_tipo_usuario=".base64_encode("seleccione mas de un tipo de usuario"));
		}
		elseif ($tipo[0]==2 AND $count == 1) 
		{
			# code...
		}
		elseif ($tipo[0] == 3 AND $count == 1) 
		{} */
		$usuario = $b_user->escape_string($_POST['usuario']);//se convierte a una cadena de caracteres validos para usarlo en sql
		$correo = $b_user->escape_string($_POST['correo']);
		//hace referencia al valor carnet en la tabla alumnos y el valor de usuario en la tabla usuarios.
		$sql= "SELECT * FROM usuario WHERE carnet = '$usuario' AND correo_electronico= '$correo'";
		$proceso = $b_user->getData($sql);// se realiza la consulta sql con los datos de correo electronico y usuario

		if ($proceso->num_rows>0)// si se devuelven un array de caracteres se procedera a generar token
		{
			foreach ($proceso as $res)// se recorre el array y procedera despues a insertar el token en la base de datos
			{
				$carnet= $res['carnet'];
				$email= $res['correo_electronico'];
				//$usuario = $res['id_usuario'];				}
				$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";//cadena de caracteres para generar token, extra se a;adira mas adelante caracteres

				$token= "";//se inicia la variable para guardar el token a generar
				//generar la contrasena.
				for ($i=0; $i <7 ; $i++) //se hace un recorrido para sacar de modo random (aleatorio ) el codigo
				{ 
				$token.=substr($str,rand(0,62),1);//substr, sirve para sustraer un dato, en este caso un indice, rand es la funcion random que apuntara a un indice para que substr se encargue de buscarlo y guardarlo en token que se esta concatenando como una cadena de caracteres
				}
			}//fin de foreach, nuevo
				
			//$update_token = "UPDATE usuario SET token='$token' WHERE usuario='$usuario'" ;
			$update_token = "UPDATE usuario SET token='$token' WHERE carnet='$carnet'" ;//update sql donde se insertara el token generado aleatoriamente mientras el carnet sea el mismo de quien pidio la peticion

			$result = $b_user->execute($update_token);//se ejecuta la consulta en la clase Login del archivo procesos_login.php y se devolvera True en caso de tener exito
			if ($result) 
			{//mensaje que se enviara por correo
				$asunto = "Token de cambio de clave.";
				$mensaje = "Su Token de recuperacion de clave es: ". $token. "\n"."Atentamente: Soporte ULS";
				$dest = $email;
				$asun = $asunto;
				$mens = $mensaje;
				$correo = new Email_2($dest, $asun, $mens);//creacion de objeto con la clase Email_2  del archivo email.php y paso de variables para procesar
				$correo->Correo();//llamado a metodo Correo se llamara posteriormente una pagina
			}
			//}//fin del foreach	
		}//fin de if anidado
	}//fin del if padre
	else //en caso de no pasar se dara una alerta
		{
			echo'<script type="text/javascript">
					alert("Error el correo ingresado o el carnet no son validos :c");
					window.location.href="../index.php";
				</script>';
	}

?>