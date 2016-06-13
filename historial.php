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
			<label><a href="historial.php">Historial\</a></label>
			<hr>
		</div>
				<br>
				<div id="tab">
					<center><h1>Actividades</h1></center>
					<br><br><br>
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

      $sqlStr = "SELECT * FROM historial WHERE descripcion LIKE '%$q%' OR fecha LIKE '%$q%' OR hora LIKE '%$q%'";
      $sqlStrAux = "SELECT count(*) as total FROM historial WHERE descripcion LIKE '%$q%' OR fecha LIKE '%$q%' OR hora LIKE '%$q%'";
    }else{
      $sqlStr = "SELECT  * FROM historial";
      $sqlStrAux = "SELECT count(*) as total FROM historial";
    }

    $aux = Mysql_Fetch_Assoc(mysql_query($sqlStrAux,$link));
    $query = mysql_query($sqlStr.$limit, $link);

    ?>
    <link rel="stylesheet" href="buscador/pagination.css" media="screen">
    <script src="buscador/buscador_historial.js" type="text/javascript" language="javascript"></script>

    <form method="GET" role="form" id="formulario">
    <div class="row">
     <div class="col-md-8">
      <input type="text" id="q" name="q" class="form-control" placeholder="Ingrese actividad realizada fecha o hora "
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
          $p->target("historial.php?q=".urlencode($q));
        else
          $p->target("historial.php");
      $p->currentPage($page);
      //$p->show();
      echo " <div class=\"table-responsive\">";
      echo "<table class=\"table table-hover\" >";
      echo "<tr>
      <td>N° de Actividad</td>
      <td>Actividad Realizada</td>
      <td>Fecha</td>
      <td>Hora</td>
      <td>Usuario</td>
      </tr>";
      $q=isset($_GET["q"]);
      while($row = mysql_fetch_assoc($query)){
      echo "\t\t<tr><td>".$row['id_historial']."</td><td>".$row['descripcion']."</td><td>".$row['fecha']."</td><td>".$row['hora']."</td><td>".$row['nombre_usuario']."</td></tr>\n";
      
      }
      echo "\t</table>\n";
      echo "</div>";
      $p->show();
    }
  ?>
				</div>
				<br>
				
			</div>
			
	</section>	
</body>
</html>
