<?php 

class Votaciones{

    public $presidente;
    public $alcalde;
    public $senador;
    public $diputado;
    public $eleccion;
    public $usuario;

    public function constructor(){

    }
    public function ini($presidente,$alcalde,$senador,$diputado,$eleccion,$usuario){
        $this->presidente= $presidente;
        $this->alcalde = $alcalde;
        $this->senador = $senador;
        $this->diputado=$diputado;
        $this->eleccion=$eleccion;
        $this->usuario=$usuario;
    }

    public function setPresidente($p){
        $this->presidente= $p;

    }
    public function setAlcalde($a){
        $this->alcalde = $a;

    }
    public function setSenador($s){
        $this->senador = $s;

    }
    public function setDiputado($d){
        $this->diputado=$d;

    }
    public function setEleccion($e){
        $this->eleccion=$e;

    }
    public function setUsuario($u){
        $this->usuario=$u;

    }
}
?>