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
          <label  class="col-sm-2 control-label">Nombre:</label>
          <div class="col-sm-4">
            <input id="nameEmpleado" type="text" class="form-control" placeholder="Nombre" >
          </div>
          <br><br>
          <label  class="col-sm-2 control-label">Apellido:</label>
          <div class="col-sm-7">
            <input id="lastnameEmpleado"  type="text" class="form-control"  placeholder="Direccion">
          </div>
          <br><br>
          <label  class="col-sm-2 control-label">Sucursal:</label>
          <div class="col-sm-4">
            <?php
            $consulta_categoria=mysql_query("SELECT *FROM sucursal");
            echo " <select  id=\"op\" name=\"op\" class=\"form-control\">";
            echo "<option value=''>Seleccione..</option>";
            while($fila=mysql_fetch_array($consulta_categoria)){
              echo "<option value='".$fila['id_sucursal']."'>".$fila['nombre']."</option>";
            }
            echo "  </select>";
            ?>
          </div>
          <br><br>
          <div class="col-sm-7">
            <br><br>
            <button onclick="insertarEmpleado();" type="button" class="btn btn-success">Guardar</button>
          </div>
        </div>
      </form>
    </center>
  </div>
</body>
</html>  
<script>
  function insertarEmpleado(){
    var nombreE=$('#nameEmpleado').val();
    var apellidoE=$('#lastnameEmpleado').val();
    var sucursalE=$('#op').val();
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
        op:'guardarEmpleado'
      }

    });

  }

  function error(){
        alertify.error("No se ingresaron los datos."); 
        //return false; 
  }
</script>