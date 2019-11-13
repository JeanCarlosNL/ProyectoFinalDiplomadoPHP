<?php

class Partido{
    public $id;
    public $nombre;
    public $descripcion;
    public $logo;
    public $estado;

    public function InitializeData($Id,$nombre,$descripcion,$estado){
        $this->id = $Id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->estado = $estado;

    }
}
?>