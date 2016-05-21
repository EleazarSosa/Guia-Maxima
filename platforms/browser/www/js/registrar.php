<?php
	
	$tag = $_POST['tag'];
	/*if (isset($tag) && $tag !== '') {
		if ($tag == 'login') {
			if ($_POST['username'] === 'eli' && $_POST['password'] === 'antrax')
				echo true;
			echo false;
		}
	}*/

	//Conexion a mysql
	$conexion= mysql_connect("localhost","root","");

	//Nombro variables con metodo POST
	$Usuario= $_POST['nombre'];
	$Correo = $_POST['correo'];
	$Password = $_POST['password'];

	//Selecciono mi Base de Datos
	mysql_select_db("guiamaxima",$conexion);


	//Añado la consulta
	$sql="INSERT INTO usuario (`nombre`, `correo`,'password') VALUES ('$Usuario','$Correo','$Password')";


	$resultado=mysql_query($sql);

	//Cierro
	mysql_close($conexion);
?>