<?php 

session_start();
	$nom=$_SESSION['nombre_usuario'];
	$reco=$nom[0];
	$mayus=strtoupper($reco);

$usuario_logeado=$_SESSION['usuario_logiado'];
$sql_user="SELECT *FROM usuarios WHERE id_usuario='$usuario_logeado' "; //String de la consulta
$consulta=mysql_query($sql_user);
while($user_n= mysql_fetch_array($consulta)){
    $tipo=$user_n[3];

}
	
?>
	<header>
		<label id="titulo"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> OriginalShop</label><br>
		<div id="menu-notificaciones">

			<button type="button" class="btn btn-info btn-circle" title="Notificasiones" data-container="body" data-toggle="popover" data-placement="bottom" 
			data-content="<ul><li> Pedido de 4 camisas, necesarias para la venta <a href='#'>Aceptar</a></li><li> Necesito 3 camisas <a href='#'>Aceptar</a></li></ul> ">
  				<span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
  			</button>
  			<button type="button" class="btn btn-success btn-circle" title="Perfil" data-container="body" data-toggle="popover" data-placement="bottom" 
			data-content="<img src='img/imagenusuario.png' alt='' class='img-thumbnail'><br><a href='cerrarSession.php' type='button' class='btn btn-success'>Cerrar sesion</a> ">
  				<label><?php echo $mayus?></label>
  			</button>
  			<a href="">&nbsp;&nbsp;<?php if(isset($_SESSION['nombre_usuario'])){echo $_SESSION['nombre_usuario'];} ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
  			<span class="label label-primary">&nbsp; <?php if(isset($_SESSION['tipo_usuario'])){echo $_SESSION['tipo_usuario'];} ?> &nbsp;</span>
  			<?php if($tipo=="Administrador"){?><a href="#"> &nbsp; &nbsp; &nbsp; <span class="label label-warning">&nbsp; Backup &nbsp;</span></a><?php } ?>
  			
		</div>
	</header>
	<nav>
	</nav>
	<aside>
		<br><br>
		<br>
		<img src="img/OriginalShop.png" class="img-circle" alt="Logo">
		<br>
		<BR>
		<label>ORIGINAL SHOP MENU</label>


		<br><br>
		<ul class="nav nav-pills nav-stacked">
  			<li role="presentation" ><a href="menu.php">Inicio</a></li>
  			<li role="presentation"><a href="inventario.php">Inventario</a></li>
 		 	<li role="presentation"><a href="ventas.php">Ventas</a></li>
 		 	<?php if($tipo=="Administrador"){?>
 		 	<li role="presentation"><a href="administracion.php">Administración</a></li>
 		 	<?php }?>

		</ul>
	</aside>
	<div id="blue">
	</div>

	<script>
		$(document).ready(function(){
    		$('[data-toggle="popover"]').popover({ html : true });   
		});
	</script>