<?php
	//Generar Respuesta JSON con PHP y MySQL

	//Se genera la Conexion a la base de datos MysQL
 
        $host = "localhost";//host
        $usuario = "root";//usuarioBD
        $pass = "";//Contraseña
        $bd = "maxima";//Base deDatos
		
		$servidor = mysql_connect($host, $usuario, $pass);
		
		//1_Se elige el formato de datos para lla conexion UTF8
	 	mysql_set_charset("utf8", $servidor);
		$conexion = mysql_select_db($bd, $servidor);
			
			//Se prepara la peticion

			//2_Se establece la consulta a la BD
			$consulta = "SELECT * FROM helado";
			$sql = mysql_query($consulta);
	 
			if ( ! $sql ) {
				echo "La conexion no se logró".mysql_error();
				die;
			}	
			
			//3_Se declara un arreglo
			$datos= array();
			
						//SE genera el archivo JSON
			while ($obj = mysql_fetch_object($sql)) {
				$datos[] = array('idhelado' => $obj->idHelado,
							   'sabor' => utf8_encode($obj->sabor),
					);
			}
			
			echo '' . json_encode($datos) . '';
			
			mysql_close($servidor);//Se cierra la conexion
			
			//Se declara que esta es una aplicacion que genera un JSON
			header('Content-type: application/json');
			//Se abre el acceso a las conexiones que requieran de esta aplicacion
			header("Access-Control-Allow-Origin: *");


?>