<?php 
error_reporting(0);
//$nfactura=$_GET['idf'];
$host_db = "localhost";
$user_db = "root";
$pass_db = "1234";
$db_name = "db_originalShop";

// Conexion a la base de datos y seleccionamos la base a utilizar
$link = mysql_connect("$host_db", "$user_db", "$pass_db")or die("No se puede conectar a la base de datos.");
mysql_select_db("$db_name")or die("No selecciono base de datos");
$fecha1=$_GET["fecha1"];
$fecha2=$_GET["fecha2"];
$consulta="SELECT *FROM factura WHERE DATE(fecha) BETWEEN '$fecha1' AND '$fecha2'";
$sql = mysql_query($consulta);
?>
<style type="text/css">
#enpresa{margin-left: 350px; float: left; margin-top: 35px;}
#nom{font-size: 32px;}
#tipo{font-size: 20px;}
#dir{font-size: 20px;}
#tel{font-size: 20px;}
#tiporepo{font-size: 25px;}
table{background: #eee; border-collapse:collapse; }
table td{border: solid 2px; }
#posimg{float:left; position:absolute; margin-top: 50px; margin-left: 30px;}




</style>
<div id="posimg">
<img src="img/logoOrigianlShop.jpg" style="width: 250px;">
</div>


<div id="enpresa">
    <p><span id="nom">ORIGINAL SHOP S.A de C.V</span> <br> <span id="tipo">VARIEDADES DE ROPA Y ACCESORIOS</span>
    <br><br><br>
    <br>
    <br></p>
</div>
<br><br><br>  
<span id="tiporepo">REPORTE DE VENTA FECHA (<?php echo $fecha1?>) a (<?php echo $fecha2;?>)</span>
<br><br>
<table align="center" cellspacing="1" style="width: 100%; border: solid 2px;  text-align: center; font-size: 15pt;  font-family:helvetica,serif;">
    <tr style=" background: #9D0C0C; color:#fff;">
        <td style="width:20%"><strong>N° DE FACTURA</strong></td>
        <td style="width:35%"><strong>CLIENTE</strong></td>
        <td style="width:25%"><strong>FECHA</strong></td>
        <td style="width:20%"><strong>TOTAL</strong></td>
    </tr>
    <?php 
    while($da_factura = mysql_fetch_array($sql)){
     

      ?>
      <tr>
        <td><?php echo $da_factura[0];?></td>
        <td><?php echo $da_factura[2];?></td>
        <td><?php echo $da_factura[3];?></td>
        <td> $ <?php echo $da_factura[4];?></td>

      </tr>


    <?php  
    }
    ?>
   

</table>
<br><br>
<br><span id="dir">Departamento La Union *El Salvador *Centroamerica</span>
<br><span id="tel">Telefono: (+503) 7525 5968 Fax: (+503) 2222 1111 </span>

<?php
$content =  ob_get_clean();
require_once('html2pdf_v4.03/html2pdf.class.php');
$pdf= new HTML2PDF('L', 'A4', 'es', 'UTF-8');
$pdf->writeHTML($content);
$pdf->output('reporte_venta'.$fecha1.'a'.$fecha2.'.pdf');
?>

