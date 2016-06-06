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
        <h1>Ingreso de productos en Inventario</h1>
        <br>
        <hr>
        <div id="contenedor">
          
        <form class="form-horizontal">
          <table width="100%">
            <tr>
              <td>
              <label>Seleccione Tipo de Entrada</label>
              <?php
              //$consulta_categoria=mysql_query("SELECT *FROM categoria");
              echo " <select  id=\"op\" name=\"op\" class=\"form-control col-sm-25\" >";
              echo "<option value='factura de compra'>FACTURA DE COMPRA</option>";
              //while($fila=mysql_fetch_array($consulta_categoria)){
              echo "<option value='factura de compra'>FACTURA DE COMPRA</option>";
              //}
              echo "  </select>";
              ?>
              </td>
            </tr>
            <tr height=10></tr>
            <tr><td><label>Factura de Compra</label></td></tr>
            <tr>
            <td>
            <label>Fecha</label>
            <input type="text" class="form-control" id="fecha" name="fecha">
            </td>
            <td width=10></td>
            <td>
            <label>Numero de Factura</label>
            <input type="text" class="form-control" id="nf" name="nf">
            </td>
            </tr>
            <tr>
            <td>
            <label>Lote</label>
            <input type="text" class="form-control" id="lote" name="lote"> 
            </td>
            <td width="10"></td>
            <td>
            <label>Seleccione Proveedor</label> 
              <?php
              //$consulta_categoria=mysql_query("SELECT *FROM proveedor");
              echo " <select  id=\"op\" name=\"op\" class=\"form-control col-sm-30\" >";
              echo "<option value=''>Seleccione..</option>";
              //while($fila=mysql_fetch_array($consulta_categoria)){
              echo "<option value='".$fila['nombre']."'>".$fila['nombre']."</option>";
              //}
              echo "  </select>";
              ?>
            </td>
            </tr>
             <tr>
            <td>
              <label>Buscar Producto</label>
              <input type="text" class="form-control" id="producto" name="producto" placeholder="Ingrese el nombre del producto">
            </td>
            </tr>
            <tr>
            <td>
              <div id="datos" class="modal-body">
              </div>
            </td>
            </tr>
          </table>
          <table class="table table-responsive " id="detalle-fac">
          <tr class="bg-primary">
          <td id="idpro">id_producto</td>
          <td id="nombre">Nombre</td>
          <td id="costo">Costo prom.Ant</td>
          <td id="precio">precio compra</td>
          <td >Cantidad</td>
          <td >Acción</td>
        
          </tr>
          <tr id="row_total" >
          </tr>
          </table>
          <button type="submit" class="btn btn-primary" id="guardar" name="guardar">Guardar</button>
        </form>





          </div>
        </div>
    </center>
      
  </section>  
    


</body>
</html>