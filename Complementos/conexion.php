<?php

 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "1234";
 $db_name = "db_originalShop";

// Conexion a la base de datos y seleccionamos la base a utilizar
$link = mysql_connect("$host_db", "$user_db", "$pass_db")or die("No se puede conectar a la base de datos.");
mysql_select_db("$db_name")or die("No selecciono base de datos");


?>