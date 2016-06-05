<?php 

session_start();

$nom=$_SESSION['nombre_usuario'];
$reco=$nom[0];
$mayus=strtoupper($reco);

?>
	<header>
		<label id="titulo"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> OriginalShop</label><br>
		<div id="menu-notificaciones">

			<button type="button" class="btn btn-info btn-circle" title="Notificasiones" data-container="body" data-toggle="popover" data-placement="bottom" 
			data-content="<ul><li> Pedido de 4 camisas, necesarias para la venta <a href='#'>Aceptar</a></li><li> Necesito 3 camisas <a href='#'>Aceptar</a></li></ul> ">
  				<span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
  			</button>
  			<button type="button" class="btn btn-success btn-circle" title="Perfil" data-container="body" data-toggle="popover" data-placement="bottom" 
			data-content="<img src='http://icons.iconarchive.com/icons/dakirby309/windows-8-metro/256/Folders-OS-User-No-Frame-Metro-icon.png' alt='' class='img-thumbnail'><br><a href='cerrarSession.php' type='button' class='btn btn-success'>Cerrar sesion</a> ">
  				<label><?php echo $mayus?></label>
  			</button>
  			<a href="">&nbsp;&nbsp;<?php if(isset($_SESSION['nombre_usuario'])){echo $_SESSION['nombre_usuario'];} ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
  			<span class="label label-primary">&nbsp; <?php if(isset($_SESSION['tipo_usuario'])){echo $_SESSION['tipo_usuario'];} ?> &nbsp;</span>
  			
		</div>
	</header>
	<nav>
	</nav>
	<aside>
		<br><br>
		<img src="http://www.talcualdigital.com/Content/images/v3/Instagram.png" class="img-responsive img-circle" alt="Responsive image">
		<br>
		<label>ORIGINAL SHOP MENU</label>


		<br><br>
		<ul class="nav nav-pills nav-stacked">
  			<li role="presentation" ><a href="menu.php">Inicio</a></li>
  			<li role="presentation"><a href="inventario.php">Inventario</a></li>
 		 	<li role="presentation"><a href="ventas.php">Ventas</a></li>
 		 	<li role="presentation"><a href="empleados.php">Administración</a></li>

		</ul>
	</aside>
	<div id="blue">
	</div>

	<script>
		$(document).ready(function(){
    		$('[data-toggle="popover"]').popover({ html : true });   
		});
	</script>