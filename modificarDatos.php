<?php include("Complementos/validador.php");
include("Complementos/conexion.php");
 $ide=$_GET['id'];?>
<html lang="es">
<head>
	<meta charset="UTF-8" >
	<title>ORIGINAL SHOP | MENU </title>
	<link rel="StyleSheet" href="css/style_menu.css" type="text/css"></link>	
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap.min.css" type="text/css"></link>
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap-theme.min.css" type="text/css"></link>
  <link rel="StyleSheet" href="css/formularios.css" type="text/css"></link>
  <link rel="stylesheet" href="css/alertify.default.css" />
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="js/proceso.js"></script>
  <script type="text/javascript" src="js/alertify.js"></script>
   
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
      					<li><a href="#usuarios">USUARIOS</a></li>    					
    				</ul>  				
    			</div>
			</nav>
		</center>	
    
      
    </section>	
    <div id="cuadro">
      <div id="reForm">
        <center>
          <?php
          if(isset($_GET["op"])){
            if($_GET["op"]== "c"){
              $sql_cons="SELECT *FROM cliente where id_cliente=$ide";
              $ejecuta_sql_mod=mysql_query($sql_cons);//Ejecuto la consulta y la almaceno en una variable
              $comprueba_cons=mysql_numrows($ejecuta_sql_mod);
              if ($comprueba_cons==0) {
              # code...
              }else{
                $datos=mysql_fetch_array($ejecuta_sql_mod);
                ?>
                <h4>MODIFICIACION - CLIENTES</h4>
              <form class="form-horizontal">
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nombre:</label>
                  <div class="col-sm-4">
                    <input id="nameCliente" type="text" class="form-control" placeholder="Nombre" value="<?php echo $datos[1];?>">
                  </div>
                  <br><br>
                  <label  class="col-sm-2 control-label">Apellido:</label>
                  <div class="col-sm-4">
                    <input id="lastNameCliente" type="text" class="form-control"  placeholder="Apellido" value="<?php echo $datos[2];?>">
                  </div>
                  <br><br>
                  <label  class="col-sm-2 control-label">Direccion:</label>
                  <div class="col-sm-7">
                    <input id="addressCliente"  type="text" class="form-control"  placeholder="Direccion" value="<?php echo $datos[3];?>">
                  </div>
                  <br><br>
                  <label  class="col-sm-2 control-label">Telefono:</label>
                  <div class="col-sm-4">
                    <input id="telephoneCliente" type="text" class="form-control"  placeholder="Telefono" value="<?php echo $datos[4];?>">
                  </div>
                  <br><br>
                  <div class="col-sm-7">
                    <br><br>
                    <button onclick="modificarCliente();" type="button" class="btn btn-success">Guardar</button>
                  </div>
                </div>
              </form>
                <?php

              }
              ?>
              
              <?php
            }
            if ($_GET["op"]== "e") {
              $sql_cons="SELECT *FROM empleado where id_empleado=$ide";
              $ejecuta_sql_mod=mysql_query($sql_cons);//Ejecuto la consulta y la almaceno en una variable
              $comprueba_cons=mysql_numrows($ejecuta_sql_mod);
              if ($comprueba_cons==0) {
              # code...
              }else{
                $datos=mysql_fetch_array($ejecuta_sql_mod);
                ?>
                <h4>MODIFICIACION - EMPLEADOS</h4>
              <form class="form-horizontal">
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nombre:</label>
                  <div class="col-sm-4">
                    <input id="nameEmpleado" type="text" class="form-control" placeholder="Nombre" value="<?php echo $datos[1];?>" >
                  </div>
                  <br><br>
                  <label  class="col-sm-2 control-label">Apellido:</label>
                  <div class="col-sm-7">
                    <input id="lastnameEmpleado"  type="text" class="form-control"  placeholder="Direccion" value="<?php echo $datos[2];?>">
                  </div>
                  <br><br>
                  
                <?php
                $id_cat=$datos[3];

              }
              $sele_con="SELECT *FROM sucursal";
              $ejecuta_sql_sel=mysql_query($sele_con);//Ejecuto la consulta y la almaceno en una variable
              $comprueba_sel=mysql_numrows($ejecuta_sql_sel);
              if ($comprueba_sel==0) {
                # code...
              }else{
                ?>
                <label  class="col-sm-2 control-label">Sucursal:</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="opcio" id="opcio"> 
                    <option value="">Seleccionar</option>
                    <?php 
                    while ($data = mysql_fetch_array($ejecuta_sql_sel)) {
                      if ($id_cat == $data['id_sucursal']) {
                        echo "<option value='".$data['id_sucursal']."'selected>".$data['nombre']."</option>";
                      }else{
                        echo "<option value='".$data['id_sucursal']."'>".$data['nombre']."</option>";
                      }
                    }
                    ?>
                  </select>
                  </div>
                <?php
              }
              ?>
              
                  <br><br>
                  <div class="col-sm-7">
                    <br><br>
                    <button onclick="modificarEmpleado();" type="button" class="btn btn-success">Guardar</button>
                  </div>
                </div>
              </form>
              <?php
            }
            if ($_GET["op"]== "s") {
              $sql_cons="SELECT *FROM sucursal where id_sucursal=$ide";
              $ejecuta_sql_mod=mysql_query($sql_cons);//Ejecuto la consulta y la almaceno en una variable
              $comprueba_cons=mysql_numrows($ejecuta_sql_mod);
              if ($comprueba_cons==0) {
              # code...
              }else{
                $datos=mysql_fetch_array($ejecuta_sql_mod);
                ?>
                <h4>MODIFICIACION - SUCURSALES</h4>
              <form class="form-horizontal">
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nombre:</label>
                  <div class="col-sm-4">
                    <input id="nameSurcursal" type="text" class="form-control" placeholder="Nombre" value="<?php echo $datos[1];?>" >
                  </div>
                  <br><br>
                  <label  class="col-sm-2 control-label">Direccion:</label>
                  <div class="col-sm-7">
                    <input id="addressSurcursal"  type="text" class="form-control"  placeholder="Direccion" value="<?php echo $datos[2];?>">
                  </div>
                  <br><br>
                  <label  class="col-sm-2 control-label">Telefono:</label>
                  <div class="col-sm-4">
                    <input id="telephoneSurcursal" type="text" class="form-control"  placeholder="Telefono" value="<?php echo $datos[3];?>" >
                  </div>
                  <br><br>
                  <div class="col-sm-7">
                    <br><br>
                    <button onclick="modificarSurcursal();" type="button" class="btn btn-success">Guardar</button>
                  </div>
                </div>
              </form>
                <?php
              }
              ?>
              
              <?php
            }
            if ($_GET["op"]== "p") {
              $sql_cons="SELECT *FROM proveedor where id_proveedor=$ide";
              $ejecuta_sql_mod=mysql_query($sql_cons);//Ejecuto la consulta y la almaceno en una variable
              $comprueba_cons=mysql_numrows($ejecuta_sql_mod);
              if ($comprueba_cons==0) {
              # code...
              }else{
                $datos=mysql_fetch_array($ejecuta_sql_mod);
                ?>
                <h4>MODIFICIACION - PROVEEDOR</h4>
              <form class="form-horizontal">
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nombre:</label>
                  <div class="col-sm-4">
                    <input id="nameProveedor" type="text" class="form-control" placeholder="Nombre" value="<?php echo $datos[1];?>">
                  </div>
                  <br><br>
                  <label  class="col-sm-2 control-label">Direccion:</label>
                  <div class="col-sm-7">
                    <input id="addressProveedor"  type="text" class="form-control"  placeholder="Direccion" value="<?php echo $datos[2];?>">
                  </div>
                  <br><br>
                  <label  class="col-sm-2 control-label">Telefono:</label>
                  <div class="col-sm-4">
                    <input id="telephoneProveedor" type="text" class="form-control"  placeholder="Telefono" value="<?php echo $datos[3];?>">
                  </div>
                  <br><br>
                  <div class="col-sm-7">
                    <br><br>
                    <button onclick="modificarProveedor();" type="button" class="btn btn-success">Guardar</button>
                  </div>
                </div>
              </form>
                <?php
              }
              ?>
              
              <?php
            }
            if ($_GET["op"]== "u") {
              $sql_cons="SELECT *FROM usuarios where id_usuario=$ide";
              $ejecuta_sql_mod=mysql_query($sql_cons);//Ejecuto la consulta y la almaceno en una variable
              $comprueba_cons=mysql_numrows($ejecuta_sql_mod);
              if ($comprueba_cons==0) {
              # code...
              }else{
                $datos=mysql_fetch_array($ejecuta_sql_mod);
                $sql_conss="SELECT *FROM empleado where id_empleado=$datos[4]";
                $ejecuta_sql_mods=mysql_query($sql_conss);//Ejecuto la consulta y la almaceno en una variable
                $comprueba_conss=mysql_numrows($ejecuta_sql_mods);
                $datoss=mysql_fetch_array($ejecuta_sql_mods);
                ?>
                <h4>MODIFICIACION - USUARIO</h4>
              <form class="form-horizontal">
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Empleado:</label>
                  <div class="col-sm-4">
                    <input id="nameEmple" type="text" class="form-control" placeholder="Nombre" value="<?php echo $datoss[1];?>" disabled="true">
                  </div>
                  <br><br>
                  <label  class="col-sm-2 control-label">Usuario:</label>
                  <div class="col-sm-4">
                    <input id="nameUsu" type="text" class="form-control" placeholder="Nombre" value="<?php echo $datos[1];?>" >
                  </div>
                  <br><br>
                  <label  class="col-sm-2 control-label">Contraseña:</label>
                  <div class="col-sm-7">
                    <input id="passUsu"  type="password" class="form-control"  placeholder="Contraseña" >
                  </div>
                  <br><br>
                  
                <?php
                $id_cat=$datos[3];

              }
             
                ?>
                <label  class="col-sm-2 control-label">Sucursal:</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="opcioU" id="opcioU"> 
                      
                      <option value="NO TIENE PERMISOS">Seleccione</option>
                      <option value="Administrador">Administrador</option>
                      <option value="Usuario Normal">Usuario Normal</option>
                    </select>
                  </div>
                
              
                            
                  <br><br>
                  <div class="col-sm-7">
                    <br><br>
                    <button onclick="modificarUsuario();" type="button" class="btn btn-success">Guardar</button>
                  </div>
                </div>
              </form>
              <?php
            }
          }
          echo '<script languaje="JavaScript">
          var vari="'.$ide.'";
          </script>';
          ?>
          
        </center>
      </div>
    </div>
</body>
</html>
<script>
  function modificarCliente(){
    var nombre=$('#nameCliente').val();
    var apellido=$('#lastNameCliente').val();
    var direccion=$('#addressCliente').val();
    var telefono=$('#telephoneCliente').val();
    $.ajax({
      url:'Controles/procesos.php?',
      type:'POST',
      success:function(respuesta){
        if(respuesta=="exito"){
          window.location.href = "verAdmin.php#clientes";
        }
        if(respuesta=="error"){
          error();
        }
      },
      data:{
        name:nombre,
        lastname:apellido,
        address: direccion,
        telephone: telefono,
        id:vari,
        op:'updateCliente'
      }

    });

  }
  function modificarEmpleado(){
    var nombreE=$('#nameEmpleado').val();
    var apellidoE=$('#lastnameEmpleado').val();
    var sucursalE=$('#opcio').val();
    $.ajax({
      url:'Controles/procesos.php',
      type:'POST',
      success:function(respuesta){
        if(respuesta=="exito"){
          window.location.href = "verAdmin.php#empleado";
        }
        if(respuesta=="error"){
          error();
        }
      },
      data:{
        nameE:nombreE,
        lastnameE: apellidoE,
        localE: sucursalE,
        id:vari,
        op:'updateEmpleado'
      }

    });

  }
  function modificarSurcursal(){
    var nombreS=$('#nameSurcursal').val();
    var direccionS=$('#addressSurcursal').val();
    var telefonoS=$('#telephoneSurcursal').val();
    $.ajax({
      url:'Controles/procesos.php',
      type:'POST',
      success:function(respuesta){
        if(respuesta=="exito"){
          window.location.href = "verAdmin.php#sucursal";
        }
        if(respuesta=="error"){
          error();
        }
      },
      data:{
        nameS:nombreS,
        addressS: direccionS,
        telephoneS: telefonoS,
         id:vari,
        op:'updateSucursal'
      }

    });

  }
  function modificarProveedor(){
    var nombreP=$('#nameProveedor').val();
    var direccionP=$('#addressProveedor').val();
    var telefonoP=$('#telephoneProveedor').val();
    $.ajax({
      url:'Controles/procesos.php',
      type:'POST',
      success:function(respuesta){
        if(respuesta=="exito"){
          window.location.href = "verAdmin.php#proveedor";
        }
        if(respuesta=="error"){
          error();
        }
      },
      data:{
        nameP:nombreP,
        addressP: direccionP,
        telephoneP: telefonoP,
         id:vari,
        op:'updateProveedor'
      }

    });

  }
  function modificarUsuario(){
    var nombreEm=$('#nameEmple').val();
    var nameUs=$('#nameUsu').val();
    var pasUser=$('#passUsu').val();
    var tipoUs=$('#opcioU').val();
    $.ajax({
      url:'Controles/procesos.php',
      type:'POST',
      success:function(respuesta){
        if(respuesta=="exito"){
          window.location.href = "verAdmin.php#usuario";
        }
        if(respuesta=="error"){
          error();
        }
      },
      data:{
        nameEmpleado:nombreEm,
        users: nameUs,
        passUsers: pasUser,
        typeU:tipoUs,
        id:vari,
        op:'updateUsuario'
      }

    });

  }

  function error(){
        alertify.error("No se ingresaron los datos."); 
        //return false; 
  }
</script>
