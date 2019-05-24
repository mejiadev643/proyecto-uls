<?php


if (isset($_POST["cancel"])) {
    session_start();
    if ($_SESSION["tipo"]== 3) {
        if ($_POST['tipousuario']=="1") {//cambiar despues el numero
            header("location:../view/admin/egresado.php");
        }else{
            header("location:../view/admin/moderador.php");
        }

    }elseif ($_SESSION["tipo"]==1) {
        header("location:../view/user/perfil.php");
    }
}elseif (isset($_GET["edit"])) 
{
    $actualizar= new Login();

    $id = $_GET['editar'];
            

    $sql = "SELECT * FROM usuario WHERE id = '$id'";

    $proceso = $actualizar->getData2($sql);

        foreach ($proceso as $res) 
        {
            $id = $res['id'];
            $carnet = $res['carnet'];
            $nombre = $res['nombre'];
            $apellido = $res['apellido'];
            $telefono = $res['telefono'];
            $direccion= $res['direccion'];
            $correo = $res['correo_electronico'];
            $contrasena = $res['contrasena'];
            $foto = $res['foto'];
            $tipousuario=$res['id_tipo_usuario'];//llamar en update
        }
}elseif (isset($_POST["actualizar"])) {
    
    
    $carnet = $_POST['carnet'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $imagen1 = $_POST['imagen1'];
    $imagen2 = $_FILES['imagen2'];
    $id = $_POST['id'];
    $tipousuario=$_POST['tipousuario'];//nueva funcion
    
    //se usara este archivo por el momento
    include_once("../model/procesos_login.php");
    $update = new Login();
    //para realizar el update
    if ($imagen2['size'] <= 0)
    {
        $nombre_img = $imagen1;
        $sql = "UPDATE usuario SET carnet = '$carnet', nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', direccion = '$direccion', correo_electronico = '$correo', contrasena = '$contrasena', foto = '$nombre_img' WHERE id = '$id'";

        $result = $update->execute($sql);

        /*if ($result) 
        {
            session_start();
            if ($_SESSION["tipo"]== 3) {
                if ($tipousuario=="1") {
                    header("location:../view/admin/egresado.php?update=true");
                }else{
                    header("location:../view/admin/moderador.php?update=true");
                }
            }elseif ($_SESSION["tipo"]== 1) {
                //header("location:../view/admin/egresados.php");//aun falta esta vista
                header("location:../view/user/perfil.php");
            }
        }//end if*/

    }
    else
    {
        $dir = "../public/img/foto_user/";
        $file = $imagen1;
        unlink($dir.$file);

        $dir_subida = "../public/img/foto_user/";

        $imagenRuta = $dir_subida.basename($_FILES['imagen2']['name']);//nombre de la ruta y como se llamara el archivo
        $imagenNombre = $_FILES['imagen2']['name'];//nombre de la imagen
        $imagenValida = false;

        if (move_uploaded_file($_FILES['imagen2']['tmp_name'], $imagenRuta))
        {
            $imagenValida = true;
        }
        if ($imagenValida)
        {
            $sql = "UPDATE usuario SET carnet = '$carnet', nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', direccion = '$direccion', correo_electronico = '$correo', contrasena = '$contrasena', foto = '$imagenNombre' WHERE id = '$id'";

            $result = $update->execute($sql);

            

        }
    }
    if ($result) 
            {
                
                
                session_start();
                if ($_SESSION["tipo"]== 3) {
                    if ($tipousuario=="1") {
                        header("location:../view/admin/egresado.php?update=true");
                    }else{
                        header("location:../view/admin/moderador.php?update=true");
                    }
                }elseif ($_SESSION["tipo"]== 1) {
                    header("location:../view/user/Panel_user.php");//aun falta esta vista
                }
            }//end if
            else
            {
                echo "problema al subir imagen";
                //header("location:../index.php?mensaje=Error al actualizar los datos");
            }


    //END IF
    //completado
}

?>
