<?php 
	include_once("../../model/procesos_login.php");
	$publicacion= new Login();
	$id=$_GET['ver'];
	$sql = "SELECT * FROM publicacion WHERE id_publicacion='$id'";
	$result=$publicacion->execute($sql);
	if ($result) {
		$datos= $publicacion->getData2($sql);
		//var_dump($datos);
		
			$titulo=$datos[0]['titulo'];
			$imagen=$datos[0]['imagen'];
			$contenido=str_replace("\n","</p><p>",$datos[0]['descripcion']);
			$id_publicacion=$datos[0]['tipo_publicacion'];
		
	}else{echo "false";}
 ?>