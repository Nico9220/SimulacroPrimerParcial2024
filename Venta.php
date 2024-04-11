<?php

/**
 * En la clase Venta:
 * 1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
motos y el precio final.
 * 2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
 * 3. Los métodos de acceso de cada uno de los atributos de la clase.
 * 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 * 5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario
 */

    class Venta{
        private $numero;
        private $fecha;
        private $referencia;
        private $arrayMotos;
        private $precioFinal;

        public function __construct($numeroInput, $fechaInput, $referenciaInput, $precioFinalInput){
            $this->numero = $numeroInput;
            $this->fecha = $fechaInput;
            $this->referencia = $referenciaInput;
            $this->arrayMotos = [];
            $this->precioFinal = $precioFinalInput;
        }

        //Metodos GET de las variables instancia

        public function getNumero(){
            return $this->numero;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function getReferencia(){
            return $this->referencia;
        }
        public function getArrayMotos(){
            return $this->arrayMotos;
        }
        public function getPrecioFinal(){
            return $this->precioFinal;
        }

        //Metodos SET de las variables instancia

        public function setNumero($numeroInput){
            $this->numero = $numeroInput;
        }
        public function setFecha($fechaInput){
            $this->fecha = $fechaInput;
        }
        public function setReferencia($referenciaInput){
            $this->referencia = $referenciaInput;
        }
        public function setArrayMotos($moto){
            $this->arrayMotos [] = $moto;
        }
        public function setPrecioFinal($precioFinalInput){
            $this->precioFinal = $precioFinalInput;
        }

        public function incorporarMoto($objMoto){
            if ($objMoto->getActiva()){
                $this->arrayMotos[] = $objMoto;
                $this->precioFinal += $objMoto->darPrecioVenta();
            }
        }

        public function __toString(){
            return "Numero: " .$this->getNumero() . "\n" . 
            "Fecha: " . $this->getFecha() . "\n" . 
            "Referencia de cliente: " . $this->getReferencia() . "\n" . 
            "Motos: " . $this->getArrayMotos() . "\n" . 
            "Precio Final: " . $this->getPrecioFinal() . "\n";
        }
    }