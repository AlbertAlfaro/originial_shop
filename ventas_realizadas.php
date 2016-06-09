<?php include("Complementos/validador.php");?>
<html lang="es">
<head>
	<meta charset="UTF-8" >
	<title>ORIGINAL SHOP | MENU </title>
	<link rel="StyleSheet" href="css/style_menu.css" type="text/css"></link>	
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap.css" type="text/css"></link>
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap-theme.min.css" type="text/css"></link>
  <link rel="stylesheet" href="Bootstrap/css/bootstrap-select.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script src="jquery-ui/jquery-ui.js"></script> 
  <script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="Bootstrap/js/bootstrap-select.js"></script>
</head>
<body>
	<?php include("Complementos/menu-cabezado.php");?>
	<section>
		<div id="directorio"> 
			<br>
			<label><a href="ventas.php">Ventas\</a><a href="ventas_realizadas.php">Ventas Realizadas</a></label>
			
		</div>
		<br><br>
    <div class="panel panel-default" style="width: 80%; margin: auto;">
      <div class="panel-heading">Empleados </div>
      <div class="panel_body">
        <a href="factura.php"><button type="button" class="btn btn-success glyphicon glyphicon-plus"> Facturar</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" data-toggle="modal"  data-target="#Mymodal" class="btn btn-success glyphicon glyphicon-file"> Reporte</button>
        <hr>
        <div class="bus">
            <label for="recipient-name" class=" control-label">
            <input type="text" class="form-control" id="busqueda" placeholder="Buscar...">
            </label>
        </div>
        <br>
        <table class="table table-hover">
          <tr>
            <td><strong>N° de Factura</strong></td>
            <td><strong>Cliente</strong></td>
            <td><strong>Fecha</strong></td>
            <td><strong>Total</strong></td>
            <td><strong>Accion</strong></td>
          </tr>
          <tr>
            <td>0001</td>
            <td>Juan Perez</td>
            <td>02-06-2016</td>
            <td>$ 40.53</td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-success glyphicon glyphicon-user dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Menu <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#" class="glyphicon glyphicon-remove" onclick="javascript:if(window.confirm('¿Confirma que desea eliminar el registro')){location.replace('eliminar_user.php?id=<?php echo $datos[0] ?>')}"> Eliminar</a></li>
                  <li data-toggle="modal" data-target="#mymodal"> <a id="send" class="open-modal glyphicon glyphicon-zoom-in" style="cursor: pointer"> Ver detalles</a></li>
                </ul>
              </div>
            </td>
          </tr>

          <tr>
            <td>0002</td>
            <td>Juan Fernandez</td>
            <td>02-06-2016</td>
            <td>$ 34.2</td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-success glyphicon glyphicon-user dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Menu <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#" class="glyphicon glyphicon-remove" onclick="javascript:if(window.confirm('¿Confirma que desea eliminar el registro')){location.replace('eliminar_user.php?id=<?php echo $datos[0] ?>')}"> Eliminar</a></li>
                  <li data-toggle="modal" data-target="#mymodal"> <a id="send" class="open-modal glyphicon glyphicon-zoom-in" style="cursor: pointer"> Ver detalles</a></li>
                
                </ul>
              </div>
            </td>
          </tr>
        </table>
        </div>
        <nav>
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">Previous</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">Next</span>
      </a>
    </li>
  </ul>
</nav>
	</section>
</body>
</html>

<div class="modal fade" tabindex="-1" role="dialog" id="mymodal" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Registro empleados</h4>
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