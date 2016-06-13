<?php
include_once 'productos.class.php';

$productos = new Productos();

echo json_encode($productos->buscarProductos($_GET['term']));// voy a codificar todo lo q eta en la caja .ter no se busca es propio 
?>