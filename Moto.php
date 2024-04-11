<?php

/**
 * En la clase Moto:
 * 1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).
 * 2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.
 * 3. Los métodos de acceso de cada uno de los atributos de la clase.
 * 4. Redefinir el método toString para que retorne la información de los atributos de la clase.
 * 5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto.
 */

class Moto{
    private $codigo;
    private $costo;
    private $modelo;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;

    public function __construct($codigoInput, $costoInput, $modeloInput, $descripcionInput, $porcentajeIncrementeAnualInput, $activaInput){
        $this->codigo = $codigoInput;
        $this->costo = $costoInput;
        $this->modelo = $modeloInput;
        $this->descripcion = $descripcionInput;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementeAnualInput;
        $this->activa = $activaInput;
    }

    //Metodos GET de las variables instancia

    public function getCodigo(){
    return $this->codigo;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function getModelo(){
        return $this->modelo;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getPorcentajeIncrementoAnual(){
        return $this->porcentajeIncrementoAnual;
    }
    public function getActiva(){
        return $this->activa;
    }

    //Metodo SET de las variables instancia
    
    public function setCodigo($codigoInput){
        $this->codigo = $codigoInput;
    }
    public function setCosto($costoInput){
        $this->costo = $costoInput;
    }
    public function setModelo($modeloInput){
        $this->modelo = $modeloInput;
    }
    public function setDescripcion($descripcionInput){
        $this->descripcion = $descripcionInput;
    }
    public function setPorcentajeIncrementoAnual($porcentajeIncrementeAnualInput){
        $this->porcentajeIncrementoAnual = $porcentajeIncrementeAnualInput;
    }
    public function setActiva($activaInput){
        $this->activa = $activaInput;
    }

    //Metodo porcentaje
    public function conversorPorcentaje($porcentajeIncrementoAnualInput){
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnualInput / 100;

        return $this->porcentajeIncrementoAnual;
    }

    //Se calcula el valor de la venta de moto
    public function darPrecioVenta($anioActual){
        if($this->getActiva() == false){
            return -1;
        }
        $anioTranscurrido = $anioActual - $this->getModelo();
        $_venta = $this->costo + $this->costo * ($anioTranscurrido * $this->getPorcentajeIncrementoAnual());
        return $_venta;
    }

    public function __toString(){
        return "Codigo: " .$this->getCodigo() . "\n" . 
        "Costo: " .$this->getCosto() . "\n" . 
        "Modelo: " .$this->getModelo() . "\n" . 
        "Descripcion: " .$this->getDescripcion() . "\n" . 
        "Incremento: " .$this->getPorcentajeIncrementoAnual() . "\n" . 
        "Activa: " .$this->getActiva() . "\n";
    }
}