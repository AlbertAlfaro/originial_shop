<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/html2canvas.js"></script>
<script type="text/javascript" src="../js/filesaver.js"></script>

<?php 
session_start();

$nom=$_SESSION['nombre_usuario'];
$reco=$nom[0];
$mayus=strtoupper($reco);
?>
<style type="text/css">
#imagen{width: 200px; height: 200px; background: #0AD03F; border: 5px solid #fff; border-radius: 5px; box-shadow: 1px 1px 5px;}
#circulo{width: 120px; height: 120px; -moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%; background: #fff; margin: auto; margin-top: 44px;}
#nomdefecto{ margin: auto; font-size: 75px; margin-left: 30px; color: #0AD03F;}
</style>

<div id="imagen"> 
	<div id="circulo">
		<br>
		<p id="nomdefecto"><?php echo $mayus?></p>
	</div>

</div>
