<?php
class Partido{
    public $id;
    public $nombre;
    public $descripcion;
    public $logo;
    public $estado;

    public function InitializeData($id,$nombre,$descripcion,$estado){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->estado = $estado;

    }
}
?>