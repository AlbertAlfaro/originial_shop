<?php include("Complementos/validador.php");include("Complementos/conexion.php");?>  
<html>
<head>
  <link rel="StyleSheet" href="css/formularios.css" type="text/css"></link>
</head>
<body>
  <div id="reClientes">
    <center>
      <form class="form-horizontal">
        <div class="form-group">
          <label  class="col-sm-2 control-label">Nombre:</label>
          <div class="col-sm-4">
            <input id="nameCliente" type="text" class="form-control" placeholder="Nombre" >
          </div>
          <br><br>
          <label  class="col-sm-2 control-label">Apellido:</label>
          <div class="col-sm-4">
            <input id="lastNameCliente" type="text" class="form-control"  placeholder="Apellido">
          </div>
          <br><br>
          <label  class="col-sm-2 control-label">Direccion:</label>
          <div class="col-sm-7">
            <input id="addressCliente"  type="text" class="form-control"  placeholder="Direccion">
          </div>
          <br><br>
          <label  class="col-sm-2 control-label">Telefono:</label>
          <div class="col-sm-4">
            <input id="telephoneCliente" type="text" class="form-control"  placeholder="Telefono">
          </div>
          <br><br>
          <div class="col-sm-7">
            <br><br>
            <button onclick="insertarCliente();" type="button" class="btn btn-success">Guardar</button>
          </div>
        </div>
      </form>
    </center>
  </div>
</body>
</html>  
<script>
  function insertarCliente(){
    var nombre=$('#nameCliente').val();
    var apellido=$('#lastNameCliente').val();
    var direccion=$('#addressCliente').val();
    var telefono=$('#telephoneCliente').val();
    $.ajax({
      url:'Controles/procesos.php',
      type:'POST',
      success:function(respuesta){
        if(respuesta=="exito"){
          window.location.href = "ingresoAdmin.php#clientes";
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
        op:'guardarCliente'
      }

    });

  }

  function error(){
        alertify.error("No se ingresaron los datos."); 
        //return false; 
  }
</script>
