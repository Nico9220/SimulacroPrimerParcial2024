<?php

/**
 * En la clase Empresa:
 * 1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
motos y la colección de ventas realizadas.
 * 2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
 * 3. Los métodos de acceso para cada una de las variables instancias de la clase.
 * 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 * 5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
 * 6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta.
 * 7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
 */

include_once "Venta.php";

class Empresa{
    private $denominacion;
    private $direccion;
    private $arrayClientes;
    private $arrayMotos;
    private $arrayVentas;

    public function __construct($denominacionInput, $direccionInput){
        $this->denominacion = $denominacionInput;
        $this->direccion = $direccionInput;
        $this->arrayClientes = [];
        $this->arrayMotos = [];
        $this->arrayVentas = [];
    }

    //Metodos GET

    public function getDenominacion() {
        return $this->denominacion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getClientes() {
        return $this->arrayClientes;
    }

    public function getMotos() {
        return $this->arrayMotos;
    }

    public function getVentas() {
        return $this->arrayVentas;
    }

    //Metodos SET

    public function setDenominacion($denominacionInput) {
        $this->denominacion = $denominacionInput;
    }

    public function setDireccion($direccionInput) {
        $this->direccion = $direccionInput;
    }

    public function setClientes($clientes) {
        $this->arrayClientes[] = $clientes;
    }

    public function setMotos($moto){
        $this->arrayMotos[] = $moto;
    }

    public function setVentas($ventas){
        $this->arrayVentas[] = $ventas;
    }

    public function retornarMoto($codigoMoto){
        $i = 0;
        $cantidadMotos = count($this->arrayMotos);
        $motoEncontrada = null;

        while($i < $cantidadMotos && $motoEncontrada === null){
            $moto = $this->arrayMotos[$i];
            if ($moto->getCodigo() === $codigoMoto){
                $motoEncontrada = $moto;
            }
            $i++;
        }
        return $motoEncontrada;
    }

    
    
    public function registrarVenta($colCodigosMoto, $objCliente){
        //Primero registramos si el cliente se encuentra dado de alta para poder comprar
        $condicion = $objCliente->getEstadoCliente();
        $valorFinal = 0;
        if($condicion === "alta"){

            //se crea el obj venta con la colMotos de ventas vacia y el precio igual a 0
            $objVenta = new Venta (0, "", "", [], 0);

            //recorro la coleccion de codigos de moto
            for($i=0;$i < count($colCodigosMoto); $i++){
                $unaMoto = $this->getMotos($colCodigosMoto[$i]);
                if($unaMoto != null){
                    $objVenta->incorporarMoto($unaMoto);
                }
            }
            $valorFinal = $objVenta->getPrecioFinal();
        }
        return $valorFinal;
    }

    public function retornarVentasXCliente($tipoDocu, $documento){
        $ventasXCliente = [];
    
        // Recorrer la colección de ventas
        foreach ($this->arrayVentas as $venta) {
            // Verifico si el cliente asociado a la venta coincide con el tipo y número de documento dados
            if ($venta->getCliente()->getTipoDocu() === $tipoDocu && $venta->getCliente()->getDocumento() === $documento) {
                $ventasXCliente[] = $venta;
            }
        }
        return $ventasXCliente;
    }

    public function __toString(){
        return "Denominacion: " .$this->getDenominacion() . "\n" . 
        "Direccion: " . $this->getDireccion() . "\n" . 
        "Clientes: " . $this->getClientes() . "\n" . 
        "Motos: " . $this->getMotos() . "\n". 
        "Ventas: " . $this->getVentas() . "\n";
    }

}