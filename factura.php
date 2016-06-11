<?php 
include('Complementos/conexion.php');
$cliente=mysql_query("SELECT *FROM cliente");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" >
  <title>ORIGINAL SHOP | FACTURA </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <link rel="StyleSheet" href="Bootstrap/css/bootstrap.min.css" type="text/css"></link>
  <link rel="StyleSheet" href="Bootstrap/css/bootstrap-theme.min.css" type="text/css"></link>
  <link rel="stylesheet" href="Bootstrap/css/bootstrap-select.css">
  <link rel="StyleSheet" href="css/style1.css" type="text/css"></link>
  <link rel="StyleSheet" href="css/style_menu.css" type="text/css"></link>  
  <link rel="StyleSheet" href="css/datepicker.css" type="text/css"></link>
  <link type="text/css" rel="stylesheet" href="jquery-ui/jquery-ui.min.css" />
  <link href="css/toastr.css" rel="stylesheet" type="text/css" />
  <link rel="StyleSheet" href="css/progressBar.css" type="text/css"></link>
  <link rel="stylesheet" href="css/alertify.core.css" />
  <link rel="stylesheet" href="css/alertify.default.css" />
  <script type="text/javascript" src="js/progressBar.js"></script>
  <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
  <script src="jquery-ui/jquery-ui.js"></script> 
  <script type="text/javascript" src="Bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="Bootstrap/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="Bootstrap/js/bootstrap-select.js"></script>
  <script type="text/javascript" src="progreso/jquery-progreso.js"></script>
  <script type="text/javascript" src="progreso/main.js"></script>
  <script src="js/toastr.js"></script>
  <script type="text/javascript" src="js/alertify.js"></script>
 

    
</head>
<body>

  <?php include("Complementos/menu-cabezado.php");?>
  <form id="envio-factura">
  <section>
    <div id="directorio"> 
      <br>
      <label><a href="ventas.php">Venta\</a><a href="factura.php">Factura</a></label>
      <hr>
    </div>
    <div id="det">
    <div id="clien">
      <label>Seleccione cliente: </label>
      <div class="form-group">
          <select class="selectpicker" data-style="btn-success" id="cliente" name="cliente">
            <option value="" selected="selected">Seleccione</option>
            <option value="0">General</option>
            <?php while($datos= mysql_fetch_array($cliente)){ ?>
            <option value="<?php echo $datos[0];?>"><?php echo $datos[1]." ".$datos[2];?></option>
            <?php $nid=$datos[0];}?>
          </select>
        </div>
    </div>
    <div id="nuevo-client">

      <button data-toggle="modal" data-target="#mymodal1" type="button" class="btn btn-primary" aria-label="Left Align">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Cliente
      </button>

    </div>
    <div id="fecha">
      <label>Fecha: </label>
      <input type="text" class=" form-control datepicker" data-date-format="yyyy-mm-dd" name="fecha1" id="fecha1"
           placeholder="Fecha">
    </div>
    <hr>
    <div id="buscar_producto">
      <label>Buscar producto</label>
      <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Ingrese nombre de producto"> 
    </div>
  </div>
    <br>
    <div id="factura">
      <label>FACTURACION</label>
      <table class="table table-responsive " id="detalle-fac">
        <tr class="bg-primary">
          <td><strong>Id</strong></td>
          <td><strong>Descripcion</strong></td>
          <td><strong>Stock</strong></td>
          <td><strong>Precios</strong></td>
          <td><strong>Preciove.</strong></td>
          <td><strong>Cantidad</strong></td>
          <td><strong>Subtotal</strong></td>
          <td><strong>Accion</strong></td>
        </tr>

      </table>
      <label id="total"></label>
      <br>
      <label id="total-letras" style="color:"></label>
      <br>
      <br>
      <button type="button" class="btn btn-success" onclick="guardar();" id="showtoast">Guardar</button>
      <button data-toggle="modal" data-target="#mymodadl" type="button" onclick="tiempo();" class="btn btn-success">Guardarprogreso</button>
      <br>
      <br>
      <div class="progress">
       <div class="progress-bar progress-bar-success progress-bar-striped" id="progreso-buss" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
         <span class="sr-only">40% Complete (success)</span>
       </div>
      </div>


    </div>
  </form>
  </section>
</body>
<br>
<br>
.
</body>
</html>



<div class="modal fade bs-example-modal-sm"  tabindex="-1" role="dialog" id="mymodal" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-sm">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Factura</h4>
      </div>
      <div class="modal-body" >
        <div class="form-group">
            <label for="recipient-name" class="control-label">Cliente: </label>
            
              <label for="recipient-name" class="control-label" id="nomcliente"></label>
            
        </div>
      
        <div class="form-group">
            <label for="recipient-name" class=" control-label">Efectivo: </label>
           
              <input type="text" class="form-control" id="efectivo" placeholder="$ efectivo">
            
        </div>
       
        <div class="form-group">
            <label for="recipient-name" class="control-label">Total: </label>
            
              <label for="recipient-name" class="control-label" id="total-modal"></label>
           
        </div>
       
         <div class="form-group">
            <label for="recipient-name" class="control-label">Cambio: </label>
            
              <label for="recipient-name" class="control-label" id="cambio-modal"></label>
            
        </div>
        .
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default">Ver Factura</button>
        <button type="button" class="btn btn-primary">Imprimir Factura</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade bs-example-modal-sm"  tabindex="-1" role="dialog" id="mymodal1" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-sm">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Nuevo cliente</h4>
      </div>
      <div class="modal-body" >
        <div class="form-group">
            <label for="recipient-name" class="control-label">Nombre: </label>
            
              <input type="text" class="form-control" id="nombre" placeholder="Nombre Cliente">
            
        </div>
      
        <div class="form-group">
            <label for="recipient-name" class=" control-label">Apellido: </label>
           
              <input type="text" class="form-control" id="apellido" placeholder="Apellido Cliente">
            
        </div>
       
        <div class="form-group">
            <label for="recipient-name" class="control-label">Dirreccion: </label>
            
              <input type="text" class="form-control" id="direccion" placeholder="Direccion Cliente">
           
        </div>
       
         <div class="form-group">
            <label for="recipient-name" class="control-label">Telefono: </label>
            
              <input type="text" class="form-control" id="telefono" placeholder="Telefono Cliente">
            
        </div>
        .
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick="agregarcliente();">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
  $(function(){
      $.fn.datepicker.dates['es'] = {
                days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
                daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"],
                daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
        };
      window.prettyPrint && prettyPrint();
      $('#fecha1').datepicker({
        format: 'yyyy-mm-dd',
        language:'es',
        
      });
      $('#fecha2').datepicker({
        format: 'yyyy-mm-dd',
        language:'es',
        });
    });
  </script>  

  <script type="text/javascript">
  var contador=0;
  var total=0;
  var subtotal=0;
  var exi=0;
  function selecionar(id_fila){
    $('#'+id_fila).remove();

      for(var x=1;x<=contador; x++){

        if($("#presio"+x).length != 0 && $("#cantidad"+x).length !=0 ){
          subtotal=$('#subtotal'+x).text();
          var res = subtotal.slice(1,100);
          total=parseFloat(total)+parseFloat(res);
          if($("#subtotal"+x).text() != '')
            $('#total').text('Total: $ '+total);
            $('#total-modal').text('$ '+total);
            exi++;
        }else{
          $('#total').text("");
          $('#total-modal').text("");
          $("#total-letras").text("");
        }

      }

      total=0;

  }
$(document).ready(function () {
    $('#detalle-fac').keyup(function() {
      for(var n=1; n<=contador; n++){
        var presio=$("#presio"+n).val()
        var cantidad=$("#cantidad"+n).val()
        var stock=$("#stock"+n).text();
        var pcompra=$("#pcompra"+n).val();
        /*var npresio=pcompra.length;
        if(presio<pcompra){
          if ($("#presio"+n).val()!=""){
            $("#presio"+n).val(pcompra);
          }
        }*/
        if(parseFloat(cantidad)>parseFloat(stock)){
          $("#cantidad"+n).val(stock);
        }
        subto=parseFloat(presio)*parseFloat(cantidad)
        if($("#presio"+n).val() != '' && $("#cantidad"+n).val() != ''){
          $('#subtotal'+n).text('$ '+subto);

        }
      }
      for(var x=1;x<=contador; x++){
        if($("#presio"+x).length != 0 && $("#cantidad"+x).length !=0 ){
        subtotal=$('#subtotal'+x).text();
        var res = subtotal.slice(1,100);
        total=parseFloat(total)+parseFloat(res);
        if($("#subtotal"+x).text() != '')
          $('#total').text('Total: $ '+total);
          $('#total-modal').text('$ '+total);


        }
        if($("#presio"+x).val()!="" && $("#cantidad"+x).val()!=""){
          $.ajax({
            url:'Controles/NumAletras.php',
            type:'POST',
            success:function(respuesta){
              $("#total-letras").text(respuesta);
            },
            data:{
              post_total:total
            }

          });
        }
      }

      total=0;
    });

    $('#efectivo').keyup(function(){
      var totalm=$('#total-modal').text();
      var recotet=totalm.slice(2,100);
      var efectivo=$('#efectivo').val();
      var cambio=0;
      cambio=parseFloat(efectivo)-parseFloat(recotet);
      if(parseFloat(cambio)>=0){
        $('#cambio-modal').text('$ '+cambio);
      }
      
    });
});

$(function(){//utizamos jquery
  $('#buscar').autocomplete({// aqui utilizamos ui
    source : 'Controles/ajax.php',// enviamos a ajax,.pph
    select : function(event, ui){
      var des=ui.item.codigobarra;
      var idd=ui.item.id_producto;
      contador++;
      var fila='<tr id="fila'+contador+'"><td><p id="idproducto'+contador+'">'+idd+'</p></td><td>'+'('+ui.item.id_producto+')'+ui.item.nombre+'</td><td><p id="stock'+contador+'">'+ui.item.cantidad+'</p></td><td><select class="form-control" id="select'+contador+'"><option id="pcompra'+contador+'" value="'+ui.item.precioCompra+'">'+ui.item.precioCompra+'</option><option id="pventa'+contador+'" value="'+ui.item.precioVenta+'">'+ui.item.precioVenta+'</option></select></td><td><input type="text" name="presiov" style="width:90px;" class="form-control" id="presio'+contador+'"></td><td><input type="text" name="cant"  id="cantidad'+contador+'" style="width:90px;" class="form-control"></td><td><p id="subtotal'+contador+'"></p></td><td><span class="glyphicon glyphicon-remove-circle" style="cursor: pointer" aria-hidden="true" id="fila'+contador+'" onclick="selecionar(this.id);"></span></td></tr>';            
      $('#detalle-fac tr:last').after(fila);

    }
  });
});


function guardar(){
  var ids=[];
  var idproducto;
  var cantidads=[];
  var can;
  var precios=[];
  var prec;
  var subtotals=[];
  var subt;
  for(var x=1;x<=contador; x++){
      if($('#idproducto'+x).length != 0 ){
        idproducto=$('#idproducto'+x).text();
        can=$('#cantidad'+x).val();
        prec=$('#presio'+x).val();
        subt=$('#subtotal'+x).text();
        subt=subt.slice(2,100)
        ids.push(idproducto);
        cantidads.push(can);
        precios.push(prec);
        subtotals.push(subt);

      }
      }
      //alert(ids);


  var cliente=$('#cliente').val();
  var fecha=$('#fecha1').val();
  var total=$('#total').text();
  var recor=total.slice(9,100);
  //alert('cliente='+cliente+' fecha='+fecha+' ids=('+ids+') precios=('+precios+') cantidades=('+cantidads+') subtotal=('+subtotals+')'+' total'+recor);
  $.ajax({
      url:'Controles/procesos.php',
      type:'POST',
      success:function(respuesta){
        if(respuesta=="exito"){
          var cliente=$("#cliente option:selected").html();
          $("#nomcliente").text(cliente);
          $('#mymodal').modal('show');
        }
        if(respuesta=="error"){
          error();
        }
      },
      data:{
        cliente:cliente,
        fecha:fecha,
        total:recor,
        idss:JSON.stringify(ids),
        cantidads:JSON.stringify(cantidads),
        precios:JSON.stringify(precios),
        subtotals:JSON.stringify(subtotals),
        op:"facturaa"
      }

    });


}
var ncliente=1;
function agregarcliente(){
    var nombre=$('#nombre').val();
    var apellido=$('#apellido').val();
    var direccion=$('#direccion').val();
    var telefono=$('#telefono').val();
    $.ajax({
      url:'Controles/procesos.php',
      type:'POST',
      success:function(respuesta){
        if(respuesta=="exito"){
          exito();
          $('#mymodal1').modal('hide');
          var nids="<?php echo $nid; ?>"; 
          //var nselect=$('#cliente option').size();
          if(nids==""){ nids=1;}else{
          nids=parseFloat(nids) + parseFloat(ncliente);
          }
          $('#cliente').append('<option value="'+nids+'">'+nombre+' '+apellido+'</option>');
          $('.selectpicker').selectpicker('refresh');
          $('#nombre').val("");
          $('#apellido').val("");
          $('#direccion').val("");
          $('#telefono').val("");

          ncliente++;
        }
        if(respuesta=="error"){
          error();
        }
      },
      data:{
        name:nombre,
        lastname:apellido,
        address:direccion,
        telephone:telefono,
        op:'guardarCliente'
      }

    });

  }

  function error(){
        alertify.error("Error al registrar cliente"); 
        //return false; 
  }
  function exito(){
    alertify.success("Cliente agregado exitosamente.");
        //return false; 
  }


// processBar

$(function () {
        var i = -1;
        var toastCount = 0;
        var $toastlast;

        var getMessage = function () {
            var msgs = ['My name is Inigo Montoya. You killed my father. Prepare to die!',
                '<div><input class="input-small" value="textbox"/>&nbsp;<a href="http://johnpapa.net" target="_blank">This is a hyperlink</a></div><div><button type="button" id="okBtn" class="btn btn-primary">Close me</button><button type="button" id="surpriseBtn" class="btn" style="margin: 0 8px 0 8px">Surprise me</button></div>',
                'Are you the six fingered man?',
                'Inconceivable!',
                'I do not think that means what you think it means.',
                'Have fun storming the castle!'
            ];
            i++;
            if (i === msgs.length) {
                i = 0;
            }

            return msgs[i];
        };

        var getMessageWithClearButton = function (msg) {
            msg = msg ? msg : 'Clear itself?';
            msg += '<br /><br /><button type="button" class="btn clear">Yes</button>';
            return msg;
        };

        $('#showtoast').click(function () {
            var shortCutFunction = "error";
            var msg = "Espere!!";
            var title = "Procesando";
            var $showDuration = '300';
            var $hideDuration = '900';
            var $timeOut = '900';
            var $extendedTimeOut = '900';
            var $showEasing = "swing";
            var $hideEasing = "linear";
            var $showMethod = "fadeIn";
            var $hideMethod = "fadeOut";
            var toastIndex = toastCount++;
            var addClear = $('#addClear').prop('checked');

            toastr.options = {
                closeButton: $('#closeButton').prop('checked'),
                debug: $('#debugInfo').prop('checked'),
                newestOnTop: $('#newestOnTop').prop('checked'),
                progressBar: 'progressBar',
                positionClass: 'toast-top-full-width' || 'toast-top-right',
                preventDuplicates: $('#preventDuplicates').prop('checked'),
                onclick: null
            };

            if ($('#addBehaviorOnToastClick').prop('checked')) {
                toastr.options.onclick = function () {
                    alert('You can perform some custom action after a toast goes away');
                };
            }

            if ($showDuration.length) {
                toastr.options.showDuration = $showDuration;
            }

            if ($hideDuration.length) {
                toastr.options.hideDuration = $hideDuration;
            }

            if ($timeOut.length) {
                toastr.options.timeOut = addClear ? 0 : $timeOut;
            }

            if ($extendedTimeOut.length) {
                toastr.options.extendedTimeOut = addClear ? 0 : $extendedTimeOut;
            }

            if ($showEasing.length) {
                toastr.options.showEasing = $showEasing;
            }

            if ($hideEasing.length) {
                toastr.options.hideEasing = $hideEasing;
            }

            if ($showMethod.length) {
                toastr.options.showMethod = $showMethod;
            }

            if ($hideMethod.length) {
                toastr.options.hideMethod = $hideMethod;
            }

            if (addClear) {
                msg = getMessageWithClearButton(msg);
                toastr.options.tapToDismiss = false;
            }
            if (!msg) {
                msg = getMessage();
            }

            $('#toastrOptions').text('Command: toastr["'
                            + shortCutFunction
                            + '"]("'
                            + msg
                            + (title ? '", "' + title : '')
                            + '")\n\ntoastr.options = '
                            + JSON.stringify(toastr.options, null, 2)
            );

            var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
            $toastlast = $toast;

            if(typeof $toast === 'undefined'){
                return;
            }

            if ($toast.find('#okBtn').length) {
                $toast.delegate('#okBtn', 'click', function () {
                    alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
                    $toast.remove();
                });
            }
            if ($toast.find('#surpriseBtn').length) {
                $toast.delegate('#surpriseBtn', 'click', function () {
                    alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
                });
            }
            if ($toast.find('.clear').length) {
                $toast.delegate('.clear', 'click', function () {
                    toastr.clear($toast, { force: true });
                });
            }
        });

        function getLastToast(){
            return $toastlast;
        }
        
    })
</script>
