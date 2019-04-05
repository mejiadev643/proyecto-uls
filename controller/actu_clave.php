<?php
	include_once("../model/procesos_login.php");//llamado al archivo procesos_login.php
	$b_user=new Login();//creacion de objeto de la clase login
	if (isset($_POST['enviar']))//si el post no esta vacio
	{
		//variables que se convertiran en una cadena de caracteres valida, usando el metodo escape_string de la clase Login
		$user =$b_user->escape_string($_POST['usuario']);
		$token =$b_user->escape_string($_POST['token']);
		$ca =$b_user->escape_string($_POST['clave_a']);//clave nueva
		$cb =$b_user->escape_string($_POST['clave_b']);//confirmacion de clave nueva

		if ($ca === $cb) 
		{
			$clave=$ca;
			$update_clave= "UPDATE usuario SET contrasena='$clave' WHERE carnet='$user' AND token='$token'"; //update de sql
			$result = $b_user->execute($update_clave);//utilizacion del metodo execute dentro de la clase Login y paso de codigo sql
			if ($result)//si result se devuelve true, se generara la siguiente alerta
			{
				echo '<script type="text/javascript">
					alert("Clave Actualizada");
					window.location.href="../index.php";
					</script>';
			}
			else
			{
				echo '<script type="text/javascript">
					alert("Error al Actualizar clave");
					window.location.href="../view/token/token.php";
					</script>';
			}
		}
		else// si la clave de nueva contrasena y la clave de confirmacion no coinciden
		{
			echo '<script type="text/javascript">
					alert("Las claves no coinciden");
					window.location.href="../view/token/token.php";
					</script>';

		}




	}
  ?>
