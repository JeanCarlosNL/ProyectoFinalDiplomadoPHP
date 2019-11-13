<?php
class Ciudadano{
    public $id;
    public $documentoIdentidad;
    public $nombre;
    public $apellido;
    public $email;
    public $estado;

    public function InitializeData($id,$documentoIdentidad,$nombre,$apellido,$email,$estado){
        $this->id=$id;
        $this->documentoIdentidad = $documentoIdentidad;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->estado = $estado;

    }
}
?>