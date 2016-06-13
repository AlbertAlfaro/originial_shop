<link rel="StyleSheet" href="css/progressBar.css" type="text/css"></link>
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/progressBar.js"></script>

<?php 

include("conexion.php");
session_start();
$usuario_logeado=$_SESSION['usuario_logiado'];
$sql_user="SELECT *FROM usuarios WHERE id_usuario='$usuario_logeado' "; //String de la consulta
$consulta=mysql_query($sql_user);
while($user_n= mysql_fetch_array($consulta)){
    $user_nom=$user_n[0];

}
  if(!$usuario_logeado){
  header("Location:index.php");
}



?>