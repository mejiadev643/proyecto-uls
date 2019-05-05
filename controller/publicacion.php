<?php
session_start();//globalizado por si intento crear todo aqui
include_once("../model/procesos_login.php");//lo uso por que ya tiene las funciones que necesitare

$publicacion = new Login();

if (isset($_POST['publicar'])) {
	$titulo =$_POST['titulo'];
	$descripcion = $publicacion->escape_string($_POST['descripcion']);
	//print_r($imagen = $_FILES['imagen']);//se ve el array de datos que trae consigo
	$imagen = $_FILES['imagen'];
	$tipopublicacion = $_POST['tipopublicacion'];
	$carrera= $_POST['carrera'];
	if ($imagen['size']<=0) {
		$origen="../public/img/system/logo.jpg";
		$destino="../public/img/publicaciones/";
		copy($origen,$destino.$titulo.".jpg");//revisar despues el fallo
		$img= $titulo.".jpg";
			

		$sql = "INSERT INTO publicacion VALUES(NULL,'$titulo','$descripcion','$img','$tipopublicacion','$carrera')";
		
		$result = $publicacion->execute($sql);
		if ($result) {
			if ($tipopublicacion=="2") {//(cambiar despues a 3)la logica no falla pero no existe $_get['editar']
                header("location:../view/admin/academica.php?add=true");
            }else{
                header("location:../view/admin/empleo.php?add=true");
            }
		}else
		{ echo "hay un error en el sql";
		}

	}else{
		$dir="../public/img/publicaciones/";
		$ruta= $dir.basename($_FILES['imagen']['name']);
		$nombreimagen= $_FILES['imagen']['name'];//asi se guardara el nombre la imagen
		$imagenValida = false;

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta))
        {
            $imagenValida = true;
        }
        if ($imagenValida)
        {
        	
			$sql = "INSERT INTO publicacion VALUES(NULL,'$titulo','$descripcion','$nombreimagen','$tipopublicacion','$carrera')";

			$result = $publicacion->execute($sql);

			if ($result) {
				if ($tipopublicacion=="2") {//agregar antes de esto el redireccionamiento
                	header("location:../view/admin/academica.php?add=true");
            	}else{
                	header("location:../view/admin/empleo.php?add=true");
            	}
			}else
			{ echo "hay un error en el sql";
			}

    	}else{echo "algo anda mal";}
	}

	//$directorio= 


}elseif (isset($_POST['cancelar'])) {
	if ($_SESSION["tipo"]== 3) {
        
		header("location: ../view/admin/Panel_admin.php");

                
    }elseif ($_SESSION["tipo"]== 2) {
        header("location:../view/operator/Panel_operator.php");
    }
}elseif (isset($_GET['delete'])) {
	if (isset($_GET['delete'])) {
		$file= is_file($_GET['img']);
		$id=$_GET['delete'];
		

		if ($file) {
			
			$ur=unlink($_GET['img']);
		}
		

		$sql = "DELETE FROM publicacion WHERE id_publicacion = '$id'";

		$del=$publicacion->execute($sql);
		if ($del) {
			
            if ($_SESSION["tipo"]== 3) {
                if ($_GET["del"]=="1") {
                    header("location:../view/admin/empleo.php");
                }else{
                    header("location:../view/admin/academica.php");
                }
            }elseif ($_SESSION["tipo"]== 2) {
                //header("location:../view/admin/egresados.php");//aun falta esta vista
                if ($_GET["del"]=="1") {
                    header("location:../view/operator/empleo.php");
                }else{
                    header("location:../view/operator/academica.php");
                }
            }
		}else{echo "hay un problema";}
	}
	
	
}else{
	echo "algo anda mal compa :/";
}

?>