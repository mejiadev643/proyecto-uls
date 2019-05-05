<?php 
	if (isset($_POST["cancelar"])) {
	
		session_start();
    	if ($_SESSION["tipo"]== 3) {
        	//if ($_POST["tipopublicacion"]=="2") {//hace referencia al tipo de la publicacion, oferta de empleo o oferta academica
				header("location:../view/admin/Panel_admin.php");

            //}else{//nota, revisar esta logica, con el cancel, tambien para el archivo de publicacion
               // header("location:../view/admin/Panel_moderador.php");// confirmar despues la ruta
            //}
    	}elseif ($_SESSION["tipo"]== 2) {
        //header("location:../view/admin/egresados.php");//aun falta esta vista
                header("location:../view/operator/Panel_operator.php");
    }	}
	elseif (isset($_GET["action"])){

	
		$consulta= new Login();
		$id= $_GET["id"];
        $sql="SELECT  titulo, descripcion, imagen, id_publicacion FROM publicacion WHERE id_publicacion='$id' ";
        $proceso=  $consulta->getData2($sql);
        foreach ($proceso as $res) 
        {
        	$titulo = $res['titulo'];
        	$descripcion = $res['descripcion'];
        	$imagen = $res['imagen'];
        	$id_publicacion=$res['id_publicacion'];
        }
	}elseif (isset($_POST["actualizar"])) {
		include_once("../model/procesos_login.php");
		$update = new Login();
		$titulo= $_POST['titulo'];
		$descripcion=$update->escape_string($_POST['descripcion']);
		$imagen1 = $_POST['imagen1'];
		$imagen2= $_FILES['imagen2'];
		$tipopublicacion=$_POST['tipopublicacion'];
		$carrera= $_POST['carrera'];
		$id = $_POST['id'];
		
    	if ($imagen2['size'] <= 0){
    		//ya esta compilado no toca >:3
			$sql="UPDATE publicacion SET titulo='$titulo', descripcion='$descripcion', tipo_publicacion = '$tipopublicacion', carrera_public='$carrera' WHERE id_publicacion=$id;";
    		$result = $update->execute($sql);
    		if ($result) {
            	session_start();
            	if ($_SESSION["tipo"]== 3) {
            		if ($tipopublicacion=="2") {
            			header("location:../view/admin/academica.php");
            		}else{
            			header("location:../view/admin/empleo.php");

            		}
            	
            	}else
                {
                    if ($tipopublicacion=="2") {
                        header("location:../view/operator/academica.php");
                    }else{
                        header("location:../view/operator/empleo.php");
                    }
                }

    		}else{echo "problemas con el sql ";}
    	}else{
    		$dir="../public/img/publicaciones/";
    		if (!isset($imagen1)){
    			$archivo = $imagen1;
    			unlink($dir.$archivo);
    		}
        	$imagenRuta = $dir.basename($_FILES['imagen2']['name']);//nombre de la ruta y como se llamara el archivo
        	$imagenNombre = $_FILES['imagen2']['name'];//nombre de la imagen
        	$imagenValida = false;
        	if (move_uploaded_file($_FILES['imagen2']['tmp_name'], $imagenRuta))
        	{
            $imagenValida = true;
        	}
        	if ($imagenValida)
        	{
    			$sql="UPDATE publicacion SET titulo='$titulo', descripcion='$descripcion', imagen='$imagenNombre', tipo_publicacion = '$tipopublicacion', carrera_public='$carrera' WHERE id_publicacion=$id;";
    			$result = $update->execute($sql);
    			if ($result) {
            	session_start();
            	   if ($_SESSION["tipo"]== 3) {
            			 if ($tipopublicacion=="2") {
            				    header("location:../view/admin/academica.php");
            			 }else{
            				    header("location:../view/admin/empleo.php");

            			 }
            	
            	    }else{
                        if ($tipopublicacion=="2") {
                            header("location:../view/admin/academica.php");
                        }else{
                            header("location:../view/admin/empleo.php");

                        }
                        
                    }

    			}else{echo "problemas con el sql";}

        	}

    	}//else de imagen ['size']
	}
 ?>