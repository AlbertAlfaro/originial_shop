<?php 
include("../Complementos/conexion.php");
$op=$_POST['op'];

session_start();


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
	    if(isset($id_user)){
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

	
 
}
?>
