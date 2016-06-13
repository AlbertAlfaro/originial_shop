<?php include("Complementos/validador.php");include("Complementos/conexion.php");?>
<html lang="es">
<head>
	<meta charset="UTF-8" >
	<title>ORIGINAL SHOP | MENU </title>
	<link rel="StyleSheet" href="css/style_menu.css" type="text/css"></link>	
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap.min.css" type="text/css"></link>
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap-theme.min.css" type="text/css"></link>
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="js/proceso.js"></script>
   
</head>
<body>
	<?php include("Complementos/menu-cabezado.php");?>
	<section>
		<div id="directorio"> 
			<br>
			<label><a href="#.php">Administracion\Ingreso de DATOS</a></label>
			<hr>
		</div>
		<center>
			<nav id="barra" class="navbar navbar-inverse">
				<div class="collapse navbar-collapse" id="navbar-ex1-collpase">
					<ul class="nav navbar-nav">				
						<li><a id="clients" style="cursor:pointer;" href="#"><span class="glyphicon glyphicon-pencil"></span>CLIENTES</a></li>
      			<li><a id="empleado" style="cursor:pointer;" href="#">EMPLEADOS </a></li>
      			<li><a id="locales" style="cursor:pointer;" href="#">SUCURSALES</a></li>   
      			<li><a id="proveedores" style="cursor:pointer;" href="#">PROVEEDORES</a></li>    
      			<li><a id="usuarios" style="cursor:pointer;" href="#">USUARIOS</a></li>					
    			</ul>  				
    		</div>
			</nav>
		</center>	
		<div id="cuadro">
    				
    	</div>		
    </section>	
</body>
</html>
