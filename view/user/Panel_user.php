<?php 
	session_start();  
	if ($_SESSION["tipo"]==3)
	{
		header("location:../admin/Panel_admin.php");
	}
	elseif ($_SESSION["tipo"]==1)
	{
		
	}
	elseif ($_SESSION["tipo"]==2)
	{
		header("location:../operator/Panel_operator.php");

	}
	else
	{
		header("location:../../index.php");

	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>User</h2>
	<button><a href="../../models/cerrar_sesion.php">Exit</a></button>
</body>
</html>