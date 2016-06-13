<?php 
include("../Complementos/conexion.php");
$op=$_POST['op'];

if(!isset($_SESSION))
{

session_start();
}  
class process{

	function historial($descripcion){
		$fecha=date("y-m-d");
		$hora=date("h:i a");
		$id_usuario=$_SESSION['nombre_usuario'];

		$sql = mysql_query("INSERT INTO historial (descripcion,fecha,hora,nombre_usuario) VALUES ('$descripcion','$fecha','$hora','$id_usuario')");
		if($sql){

			return true;
		}else{

			return false;
		}

		//close conexion 
		mysqli_close($link);
		die();

	}

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
	// funciones de fatura 
	function facturaBD($id_cliente,$nom_cliente,$fecha,$total){
		$sql=mysql_query(" INSERT INTO factura (id_cliente,nombre_cliente,fecha,total) VALUES ('$id_cliente','$nom_cliente','$fecha','$total')");
		
		if($sql){
			return true;
		}else{

			return false;
		}

		//close conexion 
		mysqli_close($link);
		die();

	}
	function detalleFacturaDB($id_factura,$id_producto,$presioVenta,$cantidad,$subtotal){
		$sql=mysql_query("INSERT INTO detalleFactura (id_factura,id_producto,presioVendido,cantidad,subtotal) VALUES('$id_factura','$id_producto','$presioVenta','$cantidad','$subtotal')");
		if($sql){
			return true;
		}else{

			return false;
		}

		//close conexion 
		mysqli_close($link);
		die();

	}
	function descontarStock($id_producto,$cantidad){

		$sql=mysql_query("UPDATE producto SET cantidad=cantidad-'$cantidad' WHERE id_producto='$id_producto'");
		if($sql){
			return true;
		}else{

			return false;
		}
		//close conexion 
		mysqli_close($link);
		die();

	}
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
	//Fin codigo de factura


}

$llamar = new process;

switch ($op) {
	case 'login':
		$user=$_POST['user'];
		$clave=$_POST['pass'];
		if($llamar -> login($user,$clave)){
			$llamar->historial("Login efectuado");
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
			$llamar->historial("Se registro un Cliente");
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
			$llamar->historial("Se registro una Sucursal");
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
			$llamar->historial("Se registro un Empleado");
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
			$llamar->historial("Se registro un Proveedor");
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
			$llamar->historial("Se actualizon datos de cliente");
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
			$llamar->historial("Se actualizon datos de Empleado");
			echo "exito";
		}else{
			echo mysql_error();
			echo "error";
		}
		break;
	case 'updateEmpleado':
		$nomE=$_POST['nameE'];
		$apelliE=$_POST['lastnameE'];
		$idE=$_POST['localE'];
		$idd=$_POST['id'];
		if($llamar -> updateEmpleado($nomE, $apelliE, $idE, $idd)){
			$llamar->historial("Se actualizon datos de Empleado");
			echo "exito";
		}else{
			echo mysql_error();
			echo "error";
		}
		break;
	case 'factura':
		$cliente=$_POST['cliente'];
		$fecha=$_POST['fecha'];
		$total=$_POST['total'];
		$ids=json_decode($_POST['idss']);
		$cantidads=json_decode($_POST['cantidads']);
		$precios=json_decode($_POST['precios']);
		$subtotals=json_decode($_POST['subtotals']);
		$nfor=count($ids);
		$consulta="SELECT *FROM cliente WHERE id_cliente='$cliente'";
		$sql = mysql_query($consulta);
		while($da_cliente= mysql_fetch_array($sql)){
			$nombre=$da_cliente[1];
			$apellido=$da_cliente[2];
		    
	    }
	    $nombre_cliente=$nombre." ".$apellido;
		if($llamar->facturaBD($cliente,$nombre_cliente,$fecha,$total)){
			$id_factura=$llamar->maxidFactura();
			for($x=0;$x<$nfor;$x++){
				$llamar->detalleFacturaDB($id_factura,$ids[$x],$precios[$x],$cantidads[$x],$subtotals[$x]);
				$llamar->descontarStock($ids[$x],$cantidads[$x]);
			}
			$llamar->historial("Se realizo un venta");
			echo "exito";
		}else{
			echo "error";
		}

		break;
	case 'detalle-factura':
		$id=$_POST['id_factura'];
		$consulta="SELECT *FROM factura WHERE id_factura='$id'";
		$sql = mysql_query($consulta);
		//$consulta1="SELECT  detalleFactura.presioVendido,detalleFactura.cantidad, detalleFactura.subtotal, producto.nombre FROM detalleFactura,producto WHERE detalleFactura.id_producto=producto.id_producto AND detalleFactura.id_factura='$id'";
		$sql1 = mysql_query($consulta1);
		while($da_factura= mysql_fetch_array($sql)){
			$nombre=$da_factura[2];
			$fecha=$da_factura[3];
			$total=$da_factura[4];
		    
	    }
	    $datos=array("nombre" => $nombre,"fecha" => $fecha, "total" => $total);
	    echo json_encode($datos);

		break;

	case 'detalle-factura-producto':
		$id=$_POST['id_factura'];
		$consulta="SELECT  detalleFactura.presioVendido,detalleFactura.cantidad, detalleFactura.subtotal, producto.nombre FROM detalleFactura,producto WHERE detalleFactura.id_producto=producto.id_producto AND detalleFactura.id_factura='$id'";
		$sql = mysql_query($consulta);
		$da_productos=array();
		$i=0;
		while($da_detalle= mysql_fetch_array($sql)){
			$da_productos[$i]['presioVendido']=$da_detalle[0];
			$da_productos[$i]['cantidad']=$da_detalle[1];
			$da_productos[$i]['subtotal']=$da_detalle[2];
			$da_productos[$i]['nombre']=$da_detalle[3];
			$i++;

	    }
	    //$datos=array("nombre" => $nombre,"fecha" => $fecha, "total" => $total);
	    echo json_encode($da_productos);

		break;

	
 
}

?>
