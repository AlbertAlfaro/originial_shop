<?php
class Productos
{
    public function  __construct() {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '1234';
        $dbname = 'db_originalShop';

        mysql_connect($dbhost, $dbuser, $dbpass);

        mysql_select_db($dbname);   
    }

    public function buscarProductos($buscarProductos){
        $datos = array();

        $sql = "SELECT *from producto WHERE id_producto LIKE '%$buscarProductos%' or nombre LIKE '%$buscarProductos%'";
                
               
        

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){// aqui ocupamos dos array 
            $datos[] = array("value" => '('.$row['id_producto'].') '.$row['nombre'],
                            "id_producto"=> $row['id_producto'],
                            "nombre"=> $row['nombre'],
                            "precioCompra"=> $row['precioCompra'],
                            "precioVenta"=> $row['precioVenta'],
                            "cantidad"=> $row['cantidad']
    
			     
                 );
        }

        return $datos;
    }
}