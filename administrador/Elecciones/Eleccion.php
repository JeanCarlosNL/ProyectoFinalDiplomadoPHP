<?php
class Eleccion{
    public $id;
    public $nombre;
    public $fechaRealizada;
    public $estado;

    public function InitializeData($Id,$nombre,$fechaRealizada,$estado){
        $this->id = $Id;
        $this->nombre = $nombre;
        $this->fechaRealizada = $fechaRealizada;
        $this->estado = $estado;

    }
}
?>