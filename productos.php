<?php include("Complementos/validador.php");?>
<html lang="es">
<head>
	<meta charset="UTF-8" >
	<title>ORIGINAL SHOP | MENU </title>
	<link rel="StyleSheet" href="css/style_menu.css" type="text/css"></link>	
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap.css" type="text/css"></link>
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap-theme.min.css" type="text/css"></link>
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script src="jquery-ui/jquery-ui.js"></script> 
  	<script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script>
</head>
<body>
	<?php include("Complementos/menu-cabezado.php");?>
	<section>
		<div id="directorio"> 
			<br>
			<label><a href="empleados.php">Productos\</a></label>
			<hr>
		</div>
		<br><br>
		<div class="panel panel-default" style="width: 80%; margin: auto;">
  		<div class="panel-heading">Administrar Productos</div>
  		<div class="panel_body">
    		<button type="button" data-toggle="modal"  data-target="#Mymodal" class="btn btn-success glyphicon glyphicon-plus">Agregar Producto</button>
    		<button type="button" data-toggle="modal"  data-target="#Mymodal" class="btn btn-success glyphicon glyphicon-plus">Generar Reporte</button>
        
        <br><br>
    		<div id="table"></div>
    		<table class="table table-hover">
      		<tr>
        		<td>Id</td>
        		<td><strong>Nombre</strong></td>
        		<td><strong>Descripción</strong></td>
        		<td><strong>Accion</strong></td>
      		</tr>
      		<?php 
          if(isset($consul)){
      		while($datos= mysql_fetch_array($consul)){
      		}
          ?>
      		<tr>
        		<td><?php echo $datos[0] ?></td>
        		<td><?php echo $datos[1] ?></td>
        		<td><?php echo $datos[3] ?></td>
        		<td>
          		<div class="btn-group">
            		<button type="button" class="btn btn-success glyphicon glyphicon-user dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Menu <span class="caret"></span>
            		</button>
            		<ul class="dropdown-menu">
              		<li><a href="#" class="glyphicon glyphicon-remove" onclick="javascript:if(window.confirm('¿Confirma que desea eliminar el registro')){location.replace('eliminar_user.php?id=<?php echo $datos[0] ?>')}"> Eliminar</a></li>
              		<li><a href="" data-toggle="modal"  data-target="#Mymodal1" class="glyphicon glyphicon-pencil"> Modificar</a></li>
            		</ul>
          		</div>

        		</td>
      		</tr>
      		<?php }?>
      		<tr>
      			<td>1</td>
        		<td>Alfaro</td>
        		<td>Administrador</td>
        		<td><div class="btn-group">
            		<button type="button" class="btn btn-success glyphicon glyphicon-user dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Menu <span class="caret"></span>
            		</button>
            		<ul class="dropdown-menu">
              		<li><a href="#" class="glyphicon glyphicon-remove" onclick="javascript:if(window.confirm('¿Confirma que desea eliminar el registro')){location.replace('eliminar_user.php?id=<?php echo $datos[0] ?>')}"> Eliminar</a></li>
              		<li><a href="" data-toggle="modal"  data-target="#Mymodal1" class="glyphicon glyphicon-pencil"> Modificar</a></li>
            		</ul>
          		</div></td></tr>
    		</table>
  		</div>
		</div>
		
			
	</section>	


</body>
</html>

<div class="modal fade" tabindex="-1" role="dialog" id="Mymodal" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Ingreso de productos</h4>
      </div>
      <div class="modal-body">
      <div id="contenedor">
        <fieldset>
        <legend>Datos del producto</legend>  
        <form class="form-horizontal" id="ingreso_producto">
            <div class="form-group">
              <label  class="col-sm-4 control-label">Nombre</label>
              <div class="col-sm-5" >
                <input type="text" class="form-control" id="inputEmail3" placeholder="Nombre de producto">
              </div>
              <br>
              <br>
              <label  class="col-sm-4 control-label">Precio de compra</label>
              <div class="col-sm-4">
                <input type="text" class="form-control"  placeholder="Precio de compra">
              </div>
              <br>
              <br>
              <label  class="col-sm-4 control-label">Cantidad </label>
              <div class="col-sm-4">
                <input type="text" class="form-control"  placeholder="Cantidad">
              </div>
              <br>
              <br>
              <label  class="col-sm-4 control-label">Precio de venta </label>
              <div class="col-sm-4">
                <input type="text" class="form-control"  placeholder="Precio de venta">
              </div>
              <br>
              <br>
              <label  class="col-sm-4 control-label">Fecha de ingreso </label>
              <div class="col-sm-6">
                 <input type="text" class=" form-control datepicker" data-date-format="yyyy-mm-dd" name="fecha1" id="fecha1"
           placeholder="Introduce la fecha de inicio">
              </div>
              <br>
              <br>
              <label  class="col-sm-4 control-label">Proveedor</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control"  placeholder="Ingrese el proveedor">
              </div>
              <br>
              <br>
              <label  class="col-sm-4 control-label">Tipo</label>
              <div class="col-sm-4">
                <input type="text" class="form-control"  placeholder="Ingrese el tipo">
              </div>
              <br>
              <br>
              <label  class="col-sm-4 control-label">Descripción</label>
              <div class="col-sm-5">
                <textarea class="form-control" rows="3" placeholder="Descripción de producto"></textarea>
              </div>
              <div class="col-sm-7">
                <br>
                <br>
                <button type="button" class="btn btn-success col-sm-7 glyphicon glyphicon-plus">Guardar</button>
              </div>
            </div>
            </form>
            </fieldset>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" tabindex="-1" role="dialog" id="Mymodal1" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Modificacion empleados</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">.col-md-4</div>
          <div class="col-md-4 col-md-offset-4">.col-md-4 .col-md-offset-4</div>
        </div>
        <div class="row">
          <div class="col-md-3 col-md-offset-3">.col-md-3 .col-md-offset-3</div>
          <div class="col-md-2 col-md-offset-4">.col-md-2 .col-md-offset-4</div>
        </div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">.col-md-6 .col-md-offset-3</div>
        </div>
        <div class="row">
          <div class="col-sm-9">
            Level 1: .col-sm-9
            <div class="row">
              <div class="col-xs-8 col-sm-6">
                Level 2: .col-xs-8 .col-sm-6
              </div>
              <div class="col-xs-4 col-sm-6">
                Level 2: .col-xs-4 .col-sm-6
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
