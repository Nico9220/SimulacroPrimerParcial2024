<?php

include_once "Cliente.php";
include_once "Moto.php";
include_once "Empresa.php";

//Creo dos instancias de la clase Cliente

$objCliente1 = new Cliente ("Nicolas", "Caretta", true, "DNI", "36329071");
$objCliente2 = new Cliente ("Florencia", "Ramirez", "alta", "DNI", "39765293");

//Creo tres objetos Moto
//código, costo ,anio_fabricacion ,Descripcion ,porc_increment ,activo
$objMoto1 = new Moto (11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150Ohc", 70,true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

//Objeto Empresa

$objEmpresa = new Empresa ("Alta Gama", "AV Argentina 123", [$objCliente1, $objCliente2], [$objMoto1, $objMoto2, $objMoto3], []);

$resultadoVenta = $objEmpresa->registrarVenta([11, 12, 13], $objCliente2);
echo "El resultado de la venta es: " . $resultadoVenta;

