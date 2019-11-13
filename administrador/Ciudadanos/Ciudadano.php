<?php
class Ciudadano{
    public $documentoIdentidad;
    public $nombre;
    public $apellido;
    public $email;
    public $estado;

    public function InitializeData($Id,$nombre,$apellido,$email,$estado){
        $this->documentoIdentidad = $Id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->estado = $estado;

    }
}
?>