<?php 
include("../model/procesos_login.php");
$delete= new Login();
if (isset($_GET['delete'])) {
	$file= is_file($_GET['foto']);//comprueba si existe un archivo y devuelve true o false
	if ($file) {
		
		$id = $_GET['delete'];
    	unlink($_GET['foto']);

    	$sql = "DELETE FROM usuario WHERE id = '$id'";

    	$del = $delete->execute($sql);
    	if ($del)
    	{
    		session_start();
            if ($_SESSION["tipo"]== 3) {
                if ($_GET['del']=="egresado") {
                    header("location:../view/admin/egresado.php?deleted=true");
                }else{
                    header("location:../view/admin/moderador.php?deleted=true");
                }
            }elseif ($_SESSION["tipo"]== 2) {
                //header("location:../view/admin/egresados.php");//aun falta esta vista
            }
    	}
	}
	else
	{
		$id = $_GET['delete'];

    	$sql = "DELETE FROM usuario WHERE id = '$id'";

    	$del = $delete->execute($sql);
    	if ($del)
    	{
    		session_start();
            if ($_SESSION["tipo"]== 3) {
                if ($_GET['del']=="egresado") {
                    header("location:../view/admin/egresado.php?deleted=true");
                }else{
                    header("location:../view/admin/moderador.php?deleted=true");
                }
            }elseif ($_SESSION["tipo"]== 2) {
                //header("location:../view/admin/egresados.php");//aun falta esta vista
            }
    	}
	}
}
	//notas: hay que agregar los header para redireccionar al moderador el resultado, tambien el el archivo update.php de esta carpeta
#problema para eliminar si no existe imagen
	
?>