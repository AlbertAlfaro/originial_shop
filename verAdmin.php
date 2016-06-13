<?php include("Complementos/validador.php");
include("Complementos/conexion.php");
if(isset($_GET["action"])){
  if($_GET["action"]== "del" && $_GET["var"]== "c"){
    mysql_query("delete from cliente where id_cliente='$_GET[id]'");
    echo mysql_error();
    ?>
    <script>alert("Registro Eliminado");</script>
      <?php    
  }
  if($_GET["action"]== "del" && $_GET["var"]== "e"){
    mysql_query("delete from empleado where id_empleado='$_GET[id]'");
    echo mysql_error();
    ?>
    <script>alert("Registro Eliminado");</script>
      <?php    
  }
  if($_GET["action"]== "del" && $_GET["var"]== "s"){
    mysql_query("delete from sucursal where id_sucursal='$_GET[id]'");
    echo mysql_error();
    ?>
    <script>alert("Registro Eliminado");</script>
      <?php    
  }
  if($_GET["action"]== "del" && $_GET["var"]== "p"){
    mysql_query("delete from proveedor where id_proveedor='$_GET[id]'");
    echo mysql_error();
    ?>
    <script>alert("Registro Eliminado");</script>
      <?php    
  }

}?>
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
			<label><a href="#.php">Administracion\Ver DATOS</a></label>
			<hr>
		</div>
		<center>
			<nav id="barra" class="navbar navbar-inverse">
				<div class="collapse navbar-collapse" id="navbar-ex1-collpase">
					<ul class="nav navbar-nav">				
						<li><a href="#clientes"><span class="glyphicon glyphicon-pencil"></span>CLIENTES</a></li>
      					<li><a href="#empleado">EMPLEADOS </a></li>
      					<li><a href="#sucursal">SUCURSALES</a></li>   
      					<li><a href="#proveedor">PROVEEDORES</a></li>    					
    				</ul>  				
    			</div>
			</nav>
		</center>	
    <div id="tablas">
      <p><a name="clientes"></a></p>
      <h4>CLIENTES</h4>
      <div class="table-responsive">
        <table class="table table-hover table-bordered">
          <thead>
    				<tr class="info">
    					<th>N</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th>Acción</th>
              <th>Acción</th>
            </tr>
        	</thead>
        	<tbody>
            <?php 
            $contador=0;
         	  $sql_soli="SELECT *FROM cliente order by id_cliente ASC"; //String de la consulta
            $consulta=mysql_query($sql_soli);
            $contar=mysql_num_rows($consulta);
            if($contar==0) die("No hay registros para mostrar");
              while($datos_soli= mysql_fetch_array($consulta)){
                $contador+=1;
                echo "\t\t<tr class=\"success\"><td>".$contador."</td><td>".$datos_soli['nombre']."</td><td>".$datos_soli['apellido']."</td><td>".$datos_soli['direccion']."</td><td>".$datos_soli['telefono']."</td><td align=center><a href='modificarDatos.php?id=$datos_soli[id_cliente]&op=c'><img src='img/user_edit.png' border=0 title='Modificar'></a></td><td><a href=# onclick=\"javascript:if(window.confirm('¿Confirma que desea eliminar el registro')){location.replace('$_SERVER[PHP_SELF]?action=del&var=c&id=$datos_soli[id_cliente]')}\" ><img src='img/delete_user.png' border=0 title='Eliminar'></a></td></tr>\n";
              }
              ?>
            </tbody>
          </table>
        </div>
    </div>		
    <div id="tabla2">
      <p><a name="empleado"></a></p>
      <h4>EMPLEADOS</h4>
      <div class="table-responsive">
        <table class="table table-hover table-bordered">
          <thead>
            <tr class="info">
              <th>N</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Sucursal</th>
              <th>Accion</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $contador=0;
            $sql_soli="SELECT *FROM empleado order by id_empleado ASC"; //String de la consulta
            $consulta=mysql_query($sql_soli);
            $contar=mysql_num_rows($consulta);
            if($contar==0) die("No hay registros para mostrar");
              while($datos_soli= mysql_fetch_array($consulta)){
                $ide=$datos_soli['0'];
                $nombre=$datos_soli['1'];
                $apellido=$datos_soli['2'];
                $id=$datos_soli['3'];
                $contador+=1;
                $sql_usuario="SELECT *FROM sucursal where id_sucursal=$id " ; //String de la consulta
                $consul=mysql_query($sql_usuario);
                while($datos_usuario= mysql_fetch_array($consul)){
                  $local=$datos_usuario['1'];
                  echo "\t\t<tr class=\"success\"><td>".$contador."</td><td>".$nombre."</td><td>".$apellido."</td><td>".$local."</td><td align=center><a href='modificarDatos.php?id=$datos_soli[id_empleado]&op=e'><img src='img/user_edit.png' border=0 title='Modificar'></a></td><td><a href=# onclick=\"javascript:if(window.confirm('¿Confirma que desea eliminar el registro')){location.replace('$_SERVER[PHP_SELF]?action=del&id=$ide&var=e')}\" ><img src='img/delete_user.png' border=0 title='Eliminar'></a></td></tr>\n";
                  
                }
                
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    <div id="tabla2">
      <p><a name="sucursal"></a></p>
      <h4>SUCURSALES</h4>
      <div class="table-responsive">
        <table class="table table-hover table-bordered">
          <thead>
            <tr class="info">
              <th>N</th>
              <th>Nombre</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th>Accion</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $contador=0;
            $sql_soli="SELECT *FROM sucursal order by id_sucursal ASC"; //String de la consulta
            $consulta=mysql_query($sql_soli);
            $contar=mysql_num_rows($consulta);
            if($contar==0) die("No hay registros para mostrar");
              while($datos_soli= mysql_fetch_array($consulta)){
                $ids=$datos_soli['0'];
                $nombre=$datos_soli['1'];
                $direccion=$datos_soli['2'];
                $telefono=$datos_soli['3'];
                $contador+=1;
                echo "\t\t<tr class=\"success\"><td>".$contador."</td><td>".$nombre."</td><td>".$direccion."</td><td>".$telefono."</td><td align=center><a href='modificarDatos.php?id=$datos_soli[id_sucursal]&op=s'><img src='img/user_edit.png' border=0 title='Modificar'></a></td><td><a href=# onclick=\"javascript:if(window.confirm('¿Confirma que desea eliminar el registro')){location.replace('$_SERVER[PHP_SELF]?action=del&id=$ids&var=s')}\" ><img src='img/delete_user.png' border=0 title='Eliminar'></a></td></tr>\n";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div id="tabla2">
      <p><a name="proveedor"></a></p>
      <h4>PROVEEDORES</h4>
      <div class="table-responsive">
        <table class="table table-hover table-bordered">
          <thead>
            <tr class="info">
              <th>N</th>
              <th>Nombre</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th>Accion</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $contador=0;
            $sql_soli="SELECT *FROM proveedor order by id_proveedor ASC"; //String de la consulta
            $consulta=mysql_query($sql_soli);
            $contar=mysql_num_rows($consulta);
            if($contar==0) die("No hay registros para mostrar");
              while($datos_soli= mysql_fetch_array($consulta)){
                $idp=$datos_soli['0'];
                $nombre=$datos_soli['1'];
                $direccion=$datos_soli['2'];
                $telefono=$datos_soli['3'];
                $contador+=1;
                echo "\t\t<tr class=\"success\"><td>".$contador."</td><td>".$nombre."</td><td>".$direccion."</td><td>".$telefono."</td><td align=center><a href='modificarDatos.php?id=$datos_soli[id_proveedor]&op=p'><img src='img/user_edit.png' border=0 title='Modificar'></a></td><td><a href=# onclick=\"javascript:if(window.confirm('¿Confirma que desea eliminar el registro')){location.replace('$_SERVER[PHP_SELF]?action=del&id=$idp&var=p')}\" ><img src='img/delete_user.png' border=0 title='Eliminar'></a></td></tr>\n";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      
    </section>	
</body>
</html>