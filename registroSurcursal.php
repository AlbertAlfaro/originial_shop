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
            <input id="nameSurcursal" type="text" class="form-control" placeholder="Nombre" >
          </div>
          <br><br>
          <label  class="col-sm-2 control-label">Direccion:</label>
          <div class="col-sm-7">
            <input id="addressSurcursal"  type="text" class="form-control"  placeholder="Direccion">
          </div>
          <br><br>
          <label  class="col-sm-2 control-label">Telefono:</label>
          <div class="col-sm-4">
            <input id="telephoneSurcursal" type="text" class="form-control"  placeholder="Telefono">
          </div>
          <br><br>
          <div class="col-sm-7">
            <br><br>
            <button onclick="insertarSurcursal();" type="button" class="btn btn-success">Guardar</button>
          </div>
        </div>
      </form>
    </center>
  </div>
</body>
</html>  
<script>
  function insertarSurcursal(){
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
        op:'guardarSucursal'
      }

    });

  }

  function error(){
        alertify.error("No se ingresaron los datos."); 
        //return false; 
  }
</script>