<?php 
	include_once("../model/procesos_login.php");
	$create = new Login();
	if (isset($_POST['create']))
	{
		$carnet = $_POST['carnet'];
		$tipousuario = $_POST['tipousuario'];

		$sql="SELECT * FROM usuario WHERE carnet='$carnet'";
		$conf=$create->getData($sql);
		
		if ($conf->num_rows>0) {//si es mayor a 0 redirigira a la pagina de nuevo y envira mensaje de error
			/*agregado un case para no joder tanto con los if */
			switch ($tipousuario) {
				case '1':
					header("location:../view/admin/egresado.php?usuario=user&error=1");
					break;
				
				default:
					header("location:../view/admin/egresado.php?usuario=mod&error=2");
					break;
			}
			
		}else{//sino, entonces realizara la inscripcion
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$telefono = $_POST['telefono'];
			$direccion = $_POST['direccion'];
			$correo = $_POST['correo'];
			$contrasena = $_POST['contrasena'];
			
			$imagen=$_FILES['imagen'];
			if ($imagen['size']<=0) {
				$origen="../public/img/system/userdefault.png";
				$destino="../public/img/foto_user/";
				copy($origen,$destino.$carnet.".png");//revisar despues el fallo
				$img= $carnet.".png";
			}

			if ($tipousuario =='1')
			{
				$carrera = $_POST['carrera'];
				$sql= "INSERT INTO usuario VALUES (NULL,'$carnet','$nombre','$apellido','$telefono','$direccion','$correo','$contrasena','$img',NULL,'$tipousuario','$carrera')";
			
			
			} else {
				$sql= "INSERT INTO usuario VALUES (NULL,'$carnet','$nombre','$apellido','$telefono','$direccion','$correo','$contrasena','$img',NULL,'$tipousuario',NULL)";
			
			
			}
		
    		$result= $create->execute($sql);
    		if ($result) {
    			session_start();

        	    if ($tipousuario=="1") {//(cambiar despues a 3)la logica no falla pero no existe $_get['editar']
        	        header("location:../view/admin/egresado.php?usuario=user");
        	    }else{
        	        header("location:../view/admin/moderador.php?usuario=mod");
        	    }

    		}/*
		*/
			
		}
		

	}elseif(isset($_POST['cancel'])){
		session_start();
		if ($_SESSION["tipo"]== 3) {
				header("location:../view/admin/Panel_admin.php");
		}
	header("location:../view/admin/Panel_admin.php");//habilitar session para redirigir 
	}
	else
	{echo "algo anda mal";}
	
?>