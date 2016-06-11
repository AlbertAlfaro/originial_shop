<?php include("Complementos/validador.php");?>
<html lang="es">
<head>
	<meta charset="UTF-8" >
	<title>ORIGINAL SHOP | MENU </title>
	<link rel="StyleSheet" href="css/style_registro_productos.css" type="text/css"></link>	
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap.min.css" type="text/css"></link>
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap-theme.min.css" type="text/css"></link>
	<link rel="StyleSheet" href="css/datepicker.css" type="text/css"></link>
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="Bootstrap/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script>
  $(function(){
      $.fn.datepicker.dates['es'] = {
                days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
                daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"],
                daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
        };
      window.prettyPrint && prettyPrint();
      $('#fecha1').datepicker({
        format: 'yyyy-mm-dd',
        language:'es',
        
      });
      $('#fecha2').datepicker({
        format: 'yyyy-mm-dd',
        language:'es',
        });
    });
  </script>  
</head>
<body>
	<?php include("Complementos/menu-cabezado.php");?>
	<section>
		<div id="directorio"> 
			<br>
			<label><a href="inventario.php">Inventario\ </a><a href="registro_productos.php">Registro de productos</a></label>
			<hr>
		</div>
		<center>
			<div class="jumbotron">
				<h1>Ingreso de productos</h1>
				<br>
				<hr>
				<div id="contenedor">
					
				<form class="form-horizontal">
  					<div class="form-group">
    					<label  class="col-sm-2 control-label">Nombre</label>
    					<div class="col-sm-7">
      					<input type="text" class="form-control" id="inputEmail3" placeholder="Nombre de producto">
    					</div>
    					<br>
    					<br>
    					<label  class="col-sm-2 control-label">Precio de compra</label>
    					<div class="col-sm-4">
      					<input type="text" class="form-control"  placeholder="Precio de compra">
    					</div>
    					<br>
    					<br>
    					<label  class="col-sm-2 control-label">Cantidad </label>
    					<div class="col-sm-4">
      					<input type="text" class="form-control"  placeholder="Cantidad">
    					</div>
    					<br>
    					<br>
    					<label  class="col-sm-2 control-label">Precio de venta </label>
    					<div class="col-sm-4">
      					<input type="text" class="form-control"  placeholder="Precio de venta">
    					</div>
    					<br>
    					<br>
    					<label  class="col-sm-2 control-label">Fecha de ingreso </label>
    					<div class="col-sm-4">
      					 <input type="text" class=" form-control datepicker" data-date-format="yyyy-mm-dd" name="fecha1" id="fecha1"
           placeholder="Introduce la fecha de inicio">
    					</div>
    					<br>
    					<br>
    					<label  class="col-sm-2 control-label">Proveedor</label>
    					<div class="col-sm-7">
      						<input type="text" class="form-control"  placeholder="Ingrese el proveedor">
    					</div>
    					<br>
    					<br>
    					<label  class="col-sm-2 control-label">Tipo</label>
    					<div class="col-sm-7">
  							<input type="text" class="form-control"  placeholder="Ingrese el tipo">
    					</div>
    					<br>
    					<br>
    					<label  class="col-sm-2 control-label">Descripción</label>
    					<div class="col-sm-7">
      					<textarea class="form-control" rows="3" placeholder="Descripción de producto"></textarea>
    					</div>
    					<div class="col-sm-7">
    						<br>
    						<br>
      					<button type="button" class="btn btn-success">Guardar</button>
    					</div>
  					</div>
            </form>
					</div>
				</div>
		</center>
			
	</section>	
		


</body>
</html>