<html lang="es">
<head>
	<meta charset="UTF-8" >
	<title>ORIGINAL SHOP | LOGIN </title>
	<link rel="StyleSheet" href="css/style_login.css" type="text/css"></link>	
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap.min.css" type="text/css"></link>
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap-theme.min.css" type="text/css"></link>
  <link rel="StyleSheet" href="css/progressBar.css" type="text/css"></link>
    <link rel="stylesheet" href="css/alertify.core.css" />
    <link rel="stylesheet" href="css/alertify.default.css" />

  <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="js/progressBar.js"></script>
  <script type="text/javascript" src="Bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/alertify.js"></script>
</head>
<body>
	<header>
		<b class="glyphicon glyphicon-tasks"></b>
		<label id="titulo">OriginalShop</label><br>
	</header>
	<nav>
	</nav>
	<div class="jumbotron">
	<section>
      <form class="form-signin">
        <h2 class="form-signin-heading">Iniciar Secion</h2>


        <label for="inputEmail" class="sr-only">Usuario</label>
        <input id="user" class="form-control" placeholder="Usuario" required="" autofocus="" type="text">
        <br>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input id="pass" class="form-control" placeholder="Contraseña" required="" type="password">
        <div class="checkbox">
          <label>
            <input value="remember-me" type="checkbox"> Remember me
          </label>
        </div>
        <button  onclick="logearse();" class="btn btn-lg btn-success btn-block " type="button">Entrar</button>
      </form>
	</section>

</div>
</body>
</html>

<script>
  function logearse(){
    var usuario=$('#user').val();
    var clave=$('#pass').val();
    $.ajax({
      url:'Controles/procesos.php',
      type:'POST',
      success:function(respuesta){
        if(respuesta=="exito"){
          window.location.href = "menu.php";
        }
        if(respuesta=="error"){
          error();
        }
      },
      data:{
        user:usuario,
        pass:clave,
        op:'login'
      }

    });

  }

  function error(){
        alertify.error("Usuario o constraseña incorrecto/a."); 
        //return false; 
  }
</script>