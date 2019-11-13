<?php
class Ciudadano{
    public $documentoIdentidad;
    public $nombre;
    public $apellido;
    public $email;
    public $estado;

    public function InitializeData($documentoIdentidad,$nombre,$apellido,$email,$estado){
        $this->documentoIdentidad = $documentoIdentidad;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->estado = $estado;

    }
}
?>