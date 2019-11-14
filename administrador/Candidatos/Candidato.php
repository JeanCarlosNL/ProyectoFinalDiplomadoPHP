<?php
class Candidato{
    public $id;
    public $nombre;
    public $apellido;
    public $idPartido;
    public $idPuesto;
    public $foto;
    public $estado;

    public function InitializeData($Id,$nombre,$apellido,$idPartido,$idPuesto,$estado){
        $this->id = $Id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->idPartido = $idPartido;
        $this->idPuesto = $idPuesto;
        $this->estado = $estado;

    }
}
?>