

<?php 
error_reporting(0);
$nfactura=$_GET['idf'];
$host_db = "localhost";
$user_db = "root";
$pass_db = "1234";
$db_name = "db_originalShop";

// Conexion a la base de datos y seleccionamos la base a utilizar
$link = mysql_connect("$host_db", "$user_db", "$pass_db")or die("No se puede conectar a la base de datos.");
mysql_select_db("$db_name")or die("No selecciono base de datos");

$consulta=" SELECT *FROM factura WHERE id_factura='$nfactura' ";
$sql = mysql_query($consulta);
while($da_factura = mysql_fetch_array($sql)){
    $id_cliente=$da_factura[1];
    $total= $da_factura[4];
    $fecha=$da_factura[3];
}

$consulta1=" SELECT *FROM cliente WHERE id_cliente='$id_cliente'";
$sql = mysql_query($consulta1);
while($da_cliente = mysql_fetch_array($sql)){
    $nombre= $da_cliente[1];
    $apellido=$da_cliente[2];
    $direccion=$da_cliente[3];
    $telefono=$da_cliente[4];
}



?>
<style type="text/css">
#enpresa{margin-left: 250px; float: left; margin-top: 20px;}
#nom{font-size: 32px;}
#tipo{font-size: 20px;}
#dir{font-size: 16px;}
#tel{font-size: 16px;}
#nfactura{border: 3px; width: 200px; border-radius: 10px; margin-left: 820px; margin-top: -85px;}
#cont{margin-left: 55px;}
#infoclien{font-size: 20px;}
table{background: #eee; border-collapse:collapse; }
table td{border: solid 2px; }
#posnombre{float:left; position:absolute; margin-top: 230px; font-size: 20px; margin-left: 90px;}
#postelefono{float:left; position:absolute; margin-top: 230px; font-size: 20px; margin-left: 700px;}
#posdireccion{float:left; position:absolute; margin-top: 273px; font-size: 20px; margin-left: 95px;}
#posfecha{float:left; position:absolute; margin-top: 273px; font-size: 20px; margin-left: 700px;}
#posimg{float:left; position:absolute; margin-top: 50px;}




</style>
<div id="posnombre">
<?php echo $nombre." ".$apellido?>
</div>
<div id="postelefono">
<?php echo $telefono?>
</div>
<div id="posdireccion">
<?php echo $direccion?>
</div>
<div id="posfecha">
<?php echo $fecha?>
</div>
<div id="posimg">
<img src="img/logoOrigianlShop.jpg" style="width: 200px;">
</div>


<div id="enpresa">
    <p><span id="nom">ORIGINAL SHOP S.A de C.V</span> <br> <span id="tipo">VARIEDADES DE ROPA Y ACCESORIOS</span>
    <br><span id="dir">Departamento La Union *El Salvador *Centroamerica</span>
    <br><span id="tel">Telefono: (+503) 7525 5968 Fax: (+503) 2222 1111 </span></p>

</div>
<div id="nfactura">
    <div id="cont">
        <h3>FACTURA<br>
        <span style="color:red;">N° 0000<?php echo $nfactura?></span></h3>
    </div>
    <h4>&nbsp; &nbsp;REGISTRO N° 100001-1 <br>
        <span>&nbsp;&nbsp; NIT: 0614-290209-000-0</span></h4>

</div>
<br><br><br>
<div id="infoclien">
    <span>Cliente:_____________________________________________</span><span> Telefono:______________________________</span><br><br>
    <span>Dirección:____________________________________________</span><span> Fecha:________________________________</span>
</div>
<br><br>
<table align="center" cellspacing="1" style="width: 100%; border: solid 2px;  text-align: center; font-size: 15pt;  font-family:helvetica,serif;">
    <tr style=" background: #A9A9A9;">
        <td style="width:15%"><strong>CANTIDAD</strong></td>
        <td style="width:40%"><strong>DESCRIPCION</strong></td>
        <td style="width:15%"><strong>PRECIO UNITARIO</strong></td>
        <td style="width:15%"><strong>VENTAS EXENTAS</strong></td>
        <td style="width:15%"><strong>VENTAS GRAVADAS</strong></td>
    </tr>
    <?php 
    $consulta2=" SELECT detalleFactura.presioVendido,detalleFactura.cantidad,detalleFactura.subtotal,producto.nombre FROM detalleFactura, producto WHERE detalleFactura.id_producto=producto.id_producto and id_factura='$nfactura'";
    $sql = mysql_query($consulta2);
    while($da_detalle = mysql_fetch_array($sql)){
        $presioVendido=$da_detalle[0];
        $cantidad=$da_detalle[1];
        $subtotal=$da_detalle[2];
        $nombrep=$da_detalle[3];
    ?>
    <tr>
        <td><?php echo $cantidad;?></td>
        <td><?php echo $nombrep;?></td>
        <td><?php echo $presioVendido;?></td>
        <td></td>
        <td><?php echo $subtotal;?></td>
    </tr>
    <?php
    }
    ?>

    <tr>
        <td colspan="2" rowspan="2"><br>
            <span>ENTREGADO POR</span> <span> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;RECIBIDO POR </span><br><br>
            Nombre:_________________ Nombre:_____________________<br>
            DUI:_____________________ DUI:________________________<br>
            Firma:__________________ Firma:________________________
        </td>
        <td >Sumas</td>
        <td>US$ 0.00</td>
        <td>US$ <?php echo $total;?> </td>
    </tr>
    <tr>
        <td >
            Ventas Exentas<br>Sub-Total<br>(-) Retenciones <br> Venta Total
        </td>
        <td ></td>
        <td>
            $ 0.00 <br> $ <?php echo $total;?><br> $ 0.00<br> $ <?php echo $total;?><br> 

        </td>
    </tr>

</table>
<br><br>
<?php

    $V=new EnLetras();
    $con_letra=strtoupper($V->ValorEnLetras($total,"Dolares"));
?>
<span style="font-size: 18px;">SON: <?php echo $con_letra;?></span>
<br>



<?php
$content =  ob_get_clean();
require_once('html2pdf_v4.03/html2pdf.class.php');
$pdf= new HTML2PDF('L', 'A4', 'es', 'UTF-8');
$pdf->writeHTML($content);
$pdf->output('facturaventa  '.$nfactura.'.pdf');


// funcion de convertir numero a letras 



class EnLetras
{
  var $Void = "";
  var $SP = " ";
  var $Dot = ".";
  var $Zero = "0";
  var $Neg = "Menos";
  
function ValorEnLetras($x, $Moneda ) 
{
    $s="";
    $Ent="";
    $Frc="";
    $Signo="";
        
    if(floatVal($x) < 0)
     $Signo = $this->Neg . " ";
    else
     $Signo = "";
    
    if(intval(number_format($x,2,'.','') )!=$x) //<- averiguar si tiene decimales
      $s = number_format($x,2,'.','');
    else
      $s = number_format($x,2,'.','');
       
    $Pto = strpos($s, $this->Dot);
        
    if ($Pto === false)
    {
      $Ent = $s;
      $Frc = $this->Void;
    }
    else
    {
      $Ent = substr($s, 0, $Pto );
      $Frc =  substr($s, $Pto+1);
    }

    if($Ent == $this->Zero || $Ent == $this->Void)
       $s = "Cero ";
    elseif( strlen($Ent) > 7)
    {
       $s = $this->SubValLetra(intval( substr($Ent, 0,  strlen($Ent) - 6))) . 
             "Millones " . $this->SubValLetra(intval(substr($Ent,-6, 6)));
    }
    else
    {
      $s = $this->SubValLetra(intval($Ent));
    }

    if (substr($s,-9, 9) == "Millones " || substr($s,-7, 7) == "Millón ")
       $s = $s . "de ";

    $s = $s . $Moneda;

    if($Frc != $this->Void)
    {
       $s = $s . " " . $Frc. "/100";
       //$s = $s . " " . $Frc . "/100";
    }
    $letrass=$Signo . $s . " M.N.";
    return ($Signo . $s . " M.N.");
   
}


function SubValLetra($numero) 
{
    $Ptr="";
    $n=0;
    $i=0;
    $x ="";
    $Rtn ="";
    $Tem ="";

    $x = trim("$numero");
    $n = strlen($x);

    $Tem = $this->Void;
    $i = $n;
    
    while( $i > 0)
    {
       $Tem = $this->Parte(intval(substr($x, $n - $i, 1). 
                           str_repeat($this->Zero, $i - 1 )));
       If( $Tem != "Cero" )
          $Rtn .= $Tem . $this->SP;
       $i = $i - 1;
    }

    
    //--------------------- GoSub FiltroMil ------------------------------
    $Rtn=str_replace(" Mil Mil", " Un Mil", $Rtn );
    while(1)
    {
       $Ptr = strpos($Rtn, "Mil ");       
       If(!($Ptr===false))
       {
          If(! (strpos($Rtn, "Mil ",$Ptr + 1) === false ))
            $this->ReplaceStringFrom($Rtn, "Mil ", "", $Ptr);
          Else
           break;
       }
       else break;
    }

    //--------------------- GoSub FiltroCiento ------------------------------
    $Ptr = -1;
    do{
       $Ptr = strpos($Rtn, "Cien ", $Ptr+1);
       if(!($Ptr===false))
       {
          $Tem = substr($Rtn, $Ptr + 5 ,1);
          if( $Tem == "M" || $Tem == $this->Void)
             ;
          else          
             $this->ReplaceStringFrom($Rtn, "Cien", "Ciento", $Ptr);
       }
    }while(!($Ptr === false));

    //--------------------- FiltroEspeciales ------------------------------
    $Rtn=str_replace("Diez Un", "Once", $Rtn );
    $Rtn=str_replace("Diez Dos", "Doce", $Rtn );
    $Rtn=str_replace("Diez Tres", "Trece", $Rtn );
    $Rtn=str_replace("Diez Cuatro", "Catorce", $Rtn );
    $Rtn=str_replace("Diez Cinco", "Quince", $Rtn );
    $Rtn=str_replace("Diez Seis", "Dieciseis", $Rtn );
    $Rtn=str_replace("Diez Siete", "Diecisiete", $Rtn );
    $Rtn=str_replace("Diez Ocho", "Dieciocho", $Rtn );
    $Rtn=str_replace("Diez Nueve", "Diecinueve", $Rtn );
    $Rtn=str_replace("Veinte Un", "Veintiun", $Rtn );
    $Rtn=str_replace("Veinte Dos", "Veintidos", $Rtn );
    $Rtn=str_replace("Veinte Tres", "Veintitres", $Rtn );
    $Rtn=str_replace("Veinte Cuatro", "Veinticuatro", $Rtn );
    $Rtn=str_replace("Veinte Cinco", "Veinticinco", $Rtn );
    $Rtn=str_replace("Veinte Seis", "Veintiseís", $Rtn );
    $Rtn=str_replace("Veinte Siete", "Veintisiete", $Rtn );
    $Rtn=str_replace("Veinte Ocho", "Veintiocho", $Rtn );
    $Rtn=str_replace("Veinte Nueve", "Veintinueve", $Rtn );

    //--------------------- FiltroUn ------------------------------
    If(substr($Rtn,0,1) == "M") $Rtn = "Un " . $Rtn;
    //--------------------- Adicionar Y ------------------------------
    for($i=65; $i<=88; $i++)
    {
      If($i != 77)
         $Rtn=str_replace("a " . Chr($i), "* y " . Chr($i), $Rtn);
    }
    $Rtn=str_replace("*", "a" , $Rtn);
    return($Rtn);
}


function ReplaceStringFrom(&$x, $OldWrd, $NewWrd, $Ptr)
{
  $x = substr($x, 0, $Ptr)  . $NewWrd . substr($x, strlen($OldWrd) + $Ptr);
}


function Parte($x)
{
    $Rtn='';
    $t='';
    $i='';
    Do
    {
      switch($x)
      {
         Case 0:  $t = "Cero";break;
         Case 1:  $t = "Un";break;
         Case 2:  $t = "Dos";break;
         Case 3:  $t = "Tres";break;
         Case 4:  $t = "Cuatro";break;
         Case 5:  $t = "Cinco";break;
         Case 6:  $t = "Seis";break;
         Case 7:  $t = "Siete";break;
         Case 8:  $t = "Ocho";break;
         Case 9:  $t = "Nueve";break;
         Case 10: $t = "Diez";break;
         Case 20: $t = "Veinte";break;
         Case 30: $t = "Treinta";break;
         Case 40: $t = "Cuarenta";break;
         Case 50: $t = "Cincuenta";break;
         Case 60: $t = "Sesenta";break;
         Case 70: $t = "Setenta";break;
         Case 80: $t = "Ochenta";break;
         Case 90: $t = "Noventa";break;
         Case 100: $t = "Cien";break;
         Case 200: $t = "Doscientos";break;
         Case 300: $t = "Trescientos";break;
         Case 400: $t = "Cuatrocientos";break;
         Case 500: $t = "Quinientos";break;
         Case 600: $t = "Seiscientos";break;
         Case 700: $t = "Setecientos";break;
         Case 800: $t = "Ochocientos";break;
         Case 900: $t = "Novecientos";break;
         Case 1000: $t = "Mil";break;
         Case 1000000: $t = "Millón";break;
      }

      If($t == $this->Void)
      {
        $i = $i + 1;
        $x = $x / 1000;
        If($x== 0) $i = 0;
      }
      else
         break;
           
    }while($i != 0);
   
    $Rtn = $t;
    Switch($i)
    {
       Case 0: $t = $this->Void;break;
       Case 1: $t = " Mil";break;
       Case 2: $t = " Millones";break;
       Case 3: $t = " Billones";break;
    }
    return($Rtn . $t);
}

}

//-------------- Programa principal ------------------------

?>