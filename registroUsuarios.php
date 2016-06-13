<?php include("Complementos/validador.php");include("Complementos/conexion.php");?>  
<html>
<head>
  <link rel="StyleSheet" href="css/formularios.css" type="text/css"></link>
  <link rel="stylesheet" href="css/alertify.default.css" />
  <script type="text/javascript" src="js/alertify.js"></script>
</head>
<body>
  <div id="reClientes">
    <center>
      <form class="form-horizontal">
        <div class="form-group">
          <label  class="col-sm-2 control-label">Emppleado:</label>
          <div class="col-sm-4">
            <?php
            $consulta_categoria=mysql_query("SELECT *FROM empleado");
            echo " <select  id=\"op\" name=\"op\" class=\"form-control\">";
            echo "<option value=''>Seleccione..</option>";
            while($fila=mysql_fetch_array($consulta_categoria)){
              echo "<option value='".$fila['id_empleado']."'>".$fila['nombre']."</option>";
            }
            echo "  </select>";
            ?>
          </div>
          <br><br>
          <label  class="col-sm-2 control-label">Usuario:</label>
          <div class="col-sm-4">
            <input id="nUsuario" type="text" class="form-control" placeholder="Usuario" >
          </div>
          <br><br>
          <label  class="col-sm-2 control-label">Contraseña:</label>
          <div class="col-sm-7">
            <input id="lPass"  type="password" class="form-control"  placeholder="Contraseña">
          </div>
          <br><br>
          <label class="col-sm-2 control-label">Tipo:</label>
          <div class="col-sm-4">
            <select id="tipoU" class="form-control">
              <option value="#">Seleccione</option>
              <option value="Administrador">Administrador</option>
              <option value="Usuario Normal">Usuario Normal</option>
            </select>
          </div>
          <div class="col-sm-7">
            <br><br>
            <button onclick="insertarUsuario();" type="button" class="btn btn-success">Guardar</button>
          </div>
        </div>
      </form>
    </center>
  </div>
</body>
</html>  
<script>
  function insertarUsuario(){
    var userU=$('#nUsuario').val();
    var claveU=$('#lPass').val();
    var opU=$('#op').val();
    var type=$('#tipoU').val();
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
        usuU:userU,
        passU: claveU,
        empleadoU: opU,
        tipo: type,
        op:'guardarUsuario'
      }

    });

  }

  function error(){
        alertify.error("No se ingresaron los datos."); 
        //return false; 
  }
</script>