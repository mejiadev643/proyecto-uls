<?php 
	session_start();  
	if ($_SESSION["tipo"]==1)
	{
		header("location:../user/Panel_user.php");
	}
	elseif ($_SESSION["tipo"]==2)
	{
		header("location:../operator/Panel_operator.php");

	}
	elseif ($_SESSION["tipo"]==3)
	{
		

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
	<h2>Admin</h2>
	<button><a href="../../model/cerrar_sesion.php">Exit</a></button>
</body>
</html>