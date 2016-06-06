<?php
include("../Complementos/conexion.php"); // se incluye el archivo de la conexion
if($_POST){ //comprobamos si se envían variables desde el form por el método POST
	$nombre=$_POST["nameCliente"];
	$apellido=$_POST["lastNameCliente"]; //Capturamos lo digitado por el usuario en la caja de texto de nombre 
	$direccion=$_POST["addressCliente"];
	$telefono=$_POST["telephoneCliente"];


	echo nombre;
	echo mysql_error();
	$nombre=mysql_escape_string($nombre);
	$nombre=htmlspecialchars($nombre);
	$apellido=mysql_escape_string($apellido);
	$apellido=htmlspecialchars($apellido);
	$direccion=mysql_escape_string($direccion);
	$direccion=htmlspecialchars($direccion);
	$telefono=mysql_escape_string($telefono);
	$telefono=htmlspecialchars($telefono);


	$slq_comprueba_cliente="SELECT nombre from cliente where nombre='$nombre'";//String de la consulta
	$ejecuta_sql_cliente=mysql_query($slq_comprueba_cliente);//Ejecuto la consulta y la almaceno en una variable
	$comprueba_cliente=mysql_numrows($ejecuta_sql_cliente);//Verifico si la consulta devuelve alguna fila 
	
	if($comprueba_cliente==0)//Si no nos devuelve una fila entra
	{
		$insertar=mysql_query("INSERT INTO cliente (id_cliente,nombre,apellido,direccion,telefono) values('','$nombre','$apellido','$direccion','$telefono')");//consulta para insertar

		if($insertar)// comparamos, si nos devuelve true entra wnronces se inserto
		{
			//$inser=mysql_query("INSERT INTO detalleEquipo (id_detalleEquipo,marca,modelo,descripcion,id_equipo,id_categoria) VALUES ('', '$marca', '$modelo', '$des',last_insert_id(),'$op')");
			//header("Location:../ingreso_equipos.php?est=1&hh=$Ninventario");
			// redirecciona la misma pagina
		}
		else
		{
			echo "<script>alert('Error al insertar');</script>";
		}
	}
	else
	{
	//	header("Location:../ingreso_equipos.php?est=2&n=$nombre&in=$Ninventario&mo=$modelo&ma=$marca&d=$des");
		mysql_close($link);
	}
}
?>
