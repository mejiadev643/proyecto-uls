<?php 
	include_once("../model/procesos_login.php");
	$create = new Login();
	if (isset($_POST['create']))
	{
		$carnet = $_POST['carnet'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$telefono = $_POST['telefono'];
		$direccion = $_POST['direccion'];
		$correo = $_POST['correo'];
		$contrasena = $_POST['contrasena'];
		$tipousuario = $_POST['tipousuario'];
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
            if ($_SESSION["tipo"]== 3) {
                if ($tipousuario=="1") {//(cambiar despues a 3)la logica no falla pero no existe $_get['editar']
                    header("location:../view/admin/egresado.php?usuario=user");
                }else{
                    header("location:../view/admin/moderador.php?usuario=mod");
                }
            }elseif ($_SESSION["tipo"]== 2) {
                //header("location:../view/admin/egresados.php");//aun falta esta vista
            }
    	}else{
    		if ($tipousuario="1") {
    			header("location:../view/admin/egresado.php?usuario=user");
    			
    		}else{
                    header("location:../view/admin/moderador.php?usuario=mod");
    			
    		}
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