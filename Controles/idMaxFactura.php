<?php 
include("../Complementos/conexion.php");
function maxidFactura(){

		$sql=mysql_query("SELECT MAX(id_factura) AS ultimo FROM factura");
		while($maxid= mysql_fetch_array($sql)){
		    $maxidfac=$maxid[0];
	    }

		if($sql){
			return $maxidfac;
		}else{

			return false;
		}
		//close conexion 
		mysqli_close($link);
		die();

	}
echo maxidFactura();
?>