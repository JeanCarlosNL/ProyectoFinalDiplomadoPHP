<?php 

class Votaciones{

    public $presidente;
    public $alcalde;
    public $senador;
    public $diputado;
    public $eleccion;
    public $usuario;

    public function constructor($presidente,$alcalde,$senador,$diputado,$eleccion,$usuario){
        $this->presidente= $presidente;
        $this->alcalde = $alcalde;
        $this->senador = $senador;
        $this->diputado=$diputado;
        $this->eleccion=$eleccion;
        $this->usuario=$usuario;
    }
}
?>