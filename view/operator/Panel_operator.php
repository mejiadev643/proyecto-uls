<?php 
	session_start();  
	if ($_SESSION["tipo"]==2)
	{
		
	}
	elseif ($_SESSION["tipo"]==1)
	{
		header("location:../admin/Panel_user.php");
	}
	elseif ($_SESSION["tipo"]==3)
	{
		header("location:../user/Panel_admin.php");

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
	<h2>Operator</h2>
	<button><a href="../../models/cerrar_sesion.php">Exit</a></button>
</body>
</html>