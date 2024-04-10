<?php

/**
 * En la clase Cliente:
 * 0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
    documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
 * 1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
 * 2. Los métodos de acceso de cada uno de los atributos de la clase.
 * 3. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 */

    class Cliente{
        private $nombre;
        private $apellido;
        private $estadoCliente;
        private $documento;
        private $tipoDocu;

        public function __construct($nombreInput, $apellidoInput, $estadoClienteInput, $documentoInput, $tipoDocuInput){
            $this->nombre = $nombreInput;
            $this->apellido = $apellidoInput;
            $this->estadoCliente = $estadoClienteInput;
            $this->documento = $documentoInput;
            $this->tipoDocu = $tipoDocuInput;
        }

        //Metodos GET de las variables instancia
        
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        public function getEstadoCliente(){
            return $this->estadoCliente;
        }
        public function getDocumento(){
            return $this->documento;
        }
        public function getTipoDocu(){
            return $this->tipoDocu;
        }

        //Metodos SET de las variables instancia

        public function setNombre($nombreInput){
            $this->nombre = $nombreInput;
        }
        public function setApellido($apellidoInput){
            $this->apellido = $apellidoInput;
        }
        public function setEstadoCliente($estadoClienteInput){
            $this->estadoCliente = $estadoClienteInput;
        }
        public function setDocumento($documentoInput){
            $this->documento = $documentoInput;
        }
        public function setTipoDocu($tipoDocuInput){
            $this->tipoDocu = $tipoDocuInput;
        }

        public function __toString(){
            return "Nombre del cliente: " .$this->getNombre() . "\n" .
            "Apellido: " . $this->getApellido() . "\n" . 
            "Estado: " .$this->getEstadoCliente() . "\n" . 
            "Documento: " .$this->getDocumento() . "\n" .
            "Tipo de documento: " .$this->getTipoDocu() . "\n";
        }
    }