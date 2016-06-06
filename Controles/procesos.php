<?php 
include("../Complementos/conexion.php");
$op=$_POST['op'];
if(!isset($_SESSION))
{
session_start();
}  

class process{

	function login($user,$clave){
		$seguridad="$/adhi?$";
		$pass=sha1(md5($seguridad.$clave));
		$consulta="SELECT *FROM usuarios WHERE usuario='$user' and clave='$pass'";
		$sql = mysql_query($consulta);
		$n_sql = mysql_num_rows($sql);
		while($user_log= mysql_fetch_array($sql)){
		    $id_user=$user_log[0];
		    $tipo=$user_log[3];
		    $nombre=$user_log[1];
	    }
	    if (isset($id_user)) {
	    	$_SESSION['usuario_logiado']=$id_user;
	    	$_SESSION['tipo_usuario']=$tipo;
	    	$_SESSION['nombre_usuario']=$nombre;
	    }
	    
		if($n_sql>0){

			return true;
		}else{

			return false;
		}
		
		//close conexion 
		mysqli_close($link);
		die();
	}

	function ingreso_usuario($usuario,$clave,$tipo,$idempleado){
		//seguridad de clave
		$seguridad="$/adhi?$";
		$pass=sha1(md5($seguridad.$clave));
		//consulta a bd con mysqli
		$sql = mysql_query("INSERT INTO usuarios (usuario,clave,tipo,id_empleado) VALUES ('$usuario','$pass','$tipo','$idempleado')");
		if($sql){

			return true;
		}else{

			return false;
		}

		//close conexion 
		mysqli_close($link);
		die();

	}
	function guardarCliente($nom, $ape, $direcc, $telef ){
		if (isset($nom) && isset($ape) && isset($direcc) && isset($telef)) {
			$sql = mysql_query("INSERT INTO cliente (nombre,apellido,direccion,telefono) VALUES ('$nom','$ape','$direcc','$telef')");
			if($sql){
				return true;
			}else{

				return false;
			}
			//close conexion 
			mysqli_close($link);
			die();	
		}else{
			echo "NO HAY DATOS";
		}
		
	}
	function guardarSucursal($nomS, $direccS, $telefS){
		$sql = mysql_query("INSERT INTO sucursal (nombre,direccion,telefono) VALUES ('$nomS','$direccS','$telefS')");
		if($sql){
			return true;
		}else{

			return false;
		}

		//close conexion 
		mysqli_close($link);
		die();

	}
	function guardarEmpleado($nomE, $apelliE, $idE){
		$sql = mysql_query("INSERT INTO empleado (nombre,apellido,id_sucursal) VALUES ('$nomE','$apelliE','$idE')");
		if($sql){
			return true;
		}else{

			return false;
		}

		//close conexion 
		mysqli_close($link);
		die();

	}
	function guardarProveedor($nomP, $direccP, $telefP){
		$sql = mysql_query("INSERT INTO proveedor (nombre,direccion,telefono) VALUES ('$nomP','$direccP','$telefP')");
		if($sql){
			return true;
		}else{

			return false;
		}

		//close conexion 
		mysqli_close($link);
		die();

	}
	function updateCliente($nom, $ape, $direcc, $telef, $idenC ){
		if (isset($nom) && isset($ape) && isset($direcc) && isset($telef)) {
			$sql = mysql_query("UPDATE cliente SET nombre='$nom', apellido='$ape', direccion='$direcc', telefono='$telef' WHERE id_cliente='$idenC'");
			if($sql){
				return true;
			}else{

				return false;
			}
			mysql_error();
			//close conexion 
			mysqli_close($link);
			die();	
		}else{
			echo "NO HAY DATOS";
		}
		
	}
	function updateSucursal($nomS, $direccS, $telefS){
		$sql = mysql_query("INSERT INTO sucursal (nombre,direccion,telefono) VALUES ('$nomS','$direccS','$telefS')");
		if($sql){
			return true;
		}else{

			return false;
		}

		//close conexion 
		mysqli_close($link);
		die();

	}
	function updateEmpleado($nomE, $apelliE, $idE, $idd){
		$sql = mysql_query("UPDATE empleado SET nombre='$nomE', apellido='$apelliE', id_sucursal='$idE' WHERE id_empleado='$idd'");
		if($sql){
			return true;
		}else{

			return false;
		}

		//close conexion 
		mysqli_close($link);
		die();

	}
	function updateProveedor($nomP, $direccP, $telefP){
		$sql = mysql_query("INSERT INTO proveedor (nombre,direccion,telefono) VALUES ('$nomP','$direccP','$telefP')");
		if($sql){
			return true;
		}else{

			return false;
		}

		//close conexion 
		mysqli_close($link);
		die();

	}


}

$llamar = new process;

switch ($op) {
	case 'login':
		$user=$_POST['user'];
		$clave=$_POST['pass'];
		if($llamar -> login($user,$clave)){
			echo "exito";
		}else{
			echo "error";
		}
		break;
	case 'guardarCliente':
		$nom=$_POST['name'];
		$ape=$_POST['lastname'];
		$direcc=$_POST['address'];
		$telef=$_POST['telephone'];
		if($llamar -> guardarCliente($nom,$ape, $direcc, $telef)){
			echo "exito";
		}else{
			echo "error";
		}
		break;
	case 'guardarSucursal':
		$nomS=$_POST['nameS'];
		$direccS=$_POST['addressS'];
		$telefS=$_POST['telephoneS'];
		if($llamar -> guardarSucursal($nomS, $direccS, $telefS)){
			echo "exito";
		}else{
			echo mysql_error();
			echo "error";
		}
		break;
	case 'guardarEmpleado':
		$nomE=$_POST['nameE'];
		$apelliE=$_POST['lastnameE'];
		$idE=$_POST['localE'];
		if($llamar -> guardarEmpleado($nomE, $apelliE, $idE)){
			echo "exito";
		}else{
			echo mysql_error();
			echo "error";
		}
		break;
	case 'guardarProveedor':
		$nomP=$_POST['nameP'];
		$direccP=$_POST['addressP'];
		$telefP=$_POST['telephoneP'];
		if($llamar -> guardarProveedor($nomP, $direccP, $telefP)){
			echo "exito";
		}else{
			echo mysql_error();
			echo "error";
		}
		break;
	case 'updateCliente':
		$nom=$_POST['name'];
		$ape=$_POST['lastname'];
		$direcc=$_POST['address'];
		$telef=$_POST['telephone'];
		$idenC=$_POST['id'];
		if($llamar -> updateCliente($nom,$ape, $direcc, $telef, $idenC)){
			echo "exito";
		}else{
			echo "error";
			echo mysql_error();
		}
		break;	
	case 'updateEmpleado':
		$nomE=$_POST['nameE'];
		$apelliE=$_POST['lastnameE'];
		$idE=$_POST['localE'];
		$idd=$_POST['id'];
		if($llamar -> updateEmpleado($nomE, $apelliE, $idE, $idd)){
			echo "exito";
		}else{
			echo mysql_error();
			echo "error";
		}
		break;

	
 
}
?>
