<?php include("Complementos/validador.php");?>
<html lang="es">
<head>
	<meta charset="UTF-8" >
	<title>ORIGINAL SHOP | MENU </title>
	<link rel="StyleSheet" href="css/style_areglo.css" type="text/css"></link>	
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap.css" type="text/css"></link>
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap-theme.min.css" type="text/css"></link>
  <link rel="stylesheet" href="Bootstrap/css/bootstrap-select.css">
  <link rel="StyleSheet" href="css/datepicker.css" type="text/css"></link>
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script src="jquery-ui/jquery-ui.js"></script> 
  <script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="Bootstrap/js/bootstrap-select.js"></script>
  <script type="text/javascript" src="Bootstrap/js/bootstrap-datepicker.js"></script>
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
      <div class="panel-heading">Ventas Realizadas </div>
      <div class="panel_body">
        <a href="factura.php"><button type="button" class="btn btn-success glyphicon glyphicon-plus"> Facturar</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" data-toggle="modal"  data-target="#mymodal1" class="btn btn-success glyphicon glyphicon-file"> Reporte</button>
        <hr>

    <?php
 
    require('buscador/config.php');
    require('buscador/conexion.php');
    require('buscador/funciones.php');
    require('buscador/pagination.class.php');

    if(isset($_GET['page']) and is_numeric($_GET['page']) and $page = $_GET['page'])
      $limit = " LIMIT ".(($page-1)*$items).",$items";
    else
      $limit = " LIMIT $items";

    if(isset($_GET['q']) and !eregi('^ *$',$_GET['q'])){
      $q = sql_quote($_GET['q']); //para ejecutar consulta
      $busqueda = htmlentities($q); //para mostrar en pantalla

      $sqlStr = "SELECT * FROM factura WHERE id_factura LIKE '%$q%' OR nombre_cliente LIKE '%$q%'";
      $sqlStrAux = "SELECT count(*) as total FROM factura WHERE id_factura LIKE '%$q%' OR nombre_cliente LIKE '%$q%'";
    }else{
      $sqlStr = "SELECT  * FROM factura";
      $sqlStrAux = "SELECT count(*) as total FROM factura";
    }

    $aux = Mysql_Fetch_Assoc(mysql_query($sqlStrAux,$link));
    $query = mysql_query($sqlStr.$limit, $link);

    ?>
    <link rel="stylesheet" href="buscador/pagination.css" media="screen">
    <script src="buscador/buscador_factura.js" type="text/javascript" language="javascript"></script>

    <form method="GET" role="form" id="formulario">
    <div class="row">
     <div class="col-md-8">
      <input type="text" id="q" name="q" class="form-control" placeholder="Ingrese consulta por codigo de factura, nombre de cliente o pellido "
      value="<?php if(isset($q)) echo $busqueda;?>" onKeyUp="return buscar()">
     </div>
     <div class="col-md-4">
      <button type="submit" class="btn btn-success">Buscar</button>
       <span id="loading"></span>
     </div>
     </div>
     </form>
     
<div id="resultados">
  <p><?php
    
    if($aux['total'] and isset($busqueda)){
        echo "{$aux['total']} Resultado".($aux['total']>1?'s':'')." que coinciden con tu b&uacute;squeda \"<strong>$busqueda</strong>\".";
      }elseif($aux['total'] and !isset($q)){
        echo "Total de registros:";
        echo " <span class=\"badge\">{$aux['total']}</span>";
      }elseif(!$aux['total'] and isset($q)){
        echo"No hay registros que coincidan con tu b&uacute;squeda \"<strong>$busqueda</strong>\"";
      }
  ?></p>

  <?php 
    if($aux['total']>0){
      $p = new pagination;
      $p->Items($aux['total']);
      $p->limit($items);
      if(isset($q))
          $p->target("ventas_realizadas.php?q=".urlencode($q));
        else
          $p->target("ventas_realizadas.php");
      $p->currentPage($page);
      //$p->show();
      echo " <div class=\"table-responsive\">";
      echo "<table class=\"table table-hover\" >";
      echo "<tr>
      <td>N° de Factura</td>
      <td>Cliente</td>
      <td>Fecha</td>
      <td>Total</td>
      <td>Acción</td>
      </tr>";
      $q=isset($_GET["q"]);
      while($row = mysql_fetch_assoc($query)){
      echo "\t\t<tr><td>".$row['id_factura']."</td><td>".$row['nombre_cliente']."</td><td>".$row['fecha']."</td><td> $ ".$row['total']."</td><td>
      <div class='btn-group'>
        <button type='button' class='btn btn-success glyphicon glyphicon-user dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Menu <span class='caret'></span>
      </button>
      <ul class='dropdown-menu'>
        <li data-toggle='modal data-target='#mymodal' onclick='show1(".$row['id_factura'].");'> <a id='send' class='open-modal glyphicon glyphicon-zoom-in' style='cursor: pointer'> Ver detalles</a></li>
      </ul>
      </div>

      </td></tr>\n";
      
      }
      echo "\t</table>\n";
      echo "</div>";
      $p->show();
    }
  ?>
    </div>

     
      </div>
    </div>
	</section>
</body>
</html>
<script type="text/javascript">
function show1(id){
  $.ajax({
      url:'Controles/procesos.php',
      type:'POST',
      success:function(respuesta){
        $('#mfactura').text("0000"+id);
        var cont=0;
        var datos=$.parseJSON(respuesta);
        jQuery.each(datos, function(i,val){
          //alert(cont);
          if(cont==0){
            $('#mcliente').text(val);
          }
          if(cont==1){
            $('#mfecha').text(val);
          }
          if(cont==2){
            $('#mtotal').text("Total: $ "+val)
          }
          cont++;

        });

      },
      data:{
        id_factura:id,
        op:"detalle-factura"
      }

    });

  $.ajax({
      url:'Controles/procesos.php',
      type:'POST',
      success:function(respuesta){
        var datos=$.parseJSON(respuesta);
        var filas;
        var fila1;
        $('#mdetalles td').remove();
        fila1="<tr><td><strong>CANTIDAD</strong></td><td><strong>PRODUCTO</strong></td><td><strong>PRECIO VENTA</strong></td><td><strong>SUBTOTAL</strong></td></tr>";
        $('#mdetalles tr:last').after(fila1);
        jQuery.each(datos, function(i,val){
          //alert(datos[i]['presioVendido']);
          filas="<tr><td>"+datos[i]['cantidad']+"</td><td>"+datos[i]['nombre']+"</td><td> $ "+datos[i]['presioVendido']+"</td><td> $ "+datos[i]['subtotal']+"</td></tr>";
          $('#mdetalles tr:last').after(filas);
        });

      },
      data:{
        id_factura:id,
        op:"detalle-factura-producto"
      }

    });

  $('#mymodal').modal('show');
}
function imprimir(){
  var id=$("#mfactura").text();
  id=parseInt(id);

  window.open('viewfactura.php?idf='+id, '_blank');
}
</script>
<div class="modal fade" tabindex="-1" role="dialog" id="mymodal" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Detalle de Venta</h4>
      </div>
      <div class="modal-body">
        <div id="datosfactira">
          <span>N° de Factura: </span><span id="mfactura"></span><br>
          <span>Cliente: </span><span id="mcliente"></span><br>
          <span>Fecha: </span><span id="mfecha"></span><br>
          <table class="table table-hover" id="mdetalles">
            <tr>
              <td><strong>CANTIDAD</strong></td>
              <td><strong>PRODUCTO</strong></td>
              <td><strong>PRECIO</strong></td>
              <td><strong>SUBTOTAL</strong></td>
            </tr>
          </table>
          <label style="text-align: right; width: 90%;" id="mtotal"></label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="imprimir();">Imprimir</button></a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="mymodal1" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Reporte</h4>
      </div>
      <div class="modal-body">
        <label>Seleccione la fecha para el reporte</label>
        <form role="form" method="GET" action="viewreporte_venta.php">
          <label>Desde: </label><br>
          <div class="col-sm-6">
            <input type="text" class=" form-control datepicker" data-date-format="yyyy-mm-dd" name="fecha1" id="fecha1"
           placeholder="Introduce la fecha de inicio"> 
          </div><br><br>
           <label>Hasta: </label><br>
          <div class="col-sm-6">
           <input type="text" class=" form-control datepicker" data-date-format="yyyy-mm-dd" name="fecha2" id="fecha2"
           placeholder="Introduce la fecha fin">
         </div>
         <div style="float: left;position:absolute; margin-left: 400px;margin-top: -40px;">
          <button type="submit" class="btn btn-success"  formtarget="_blank">Generar reporte</button>
         

         </div>
         <br>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="close();" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

function close(){

  $('#fecha1').val("");
  $('#fecha2').val("");
}
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


</script>