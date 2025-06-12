<?php

class Persona{
    $nombre = '';
    $apellido = '';
    $edad = 0;
    $nacionalidad = '';
    $dni = 0;
    $email = '';
    $telefono = 0;

    function public function __construct(Type $nombre = null, Type $apellido = null, 
    Type $edad = null, Type $nacionalidad = null, Type $dni = null,Type $email = null, 
    Type $telefono = null) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->nacionalidad = $nacionalidad;
        $this->dni = $dni;
        $this->email = $email;
        $this->telefono = $telefono;
    }

    
}

?>