<?php 
class VotacionService
{
    public $context;
    public $utility;
    public $repository;
    function __construct($directory)
    {
        $this->context = new SADVContext($directory);
        $this->utility = new Utilities();
        $this->repository = new RepositoryVotos($this->context->db);
    }
    public function GetById($id, $field = null)
    {
        return $this->repository->GetById($id, $field);
    }
    public function Add($entity)
    {
        return $this->repository->Add($entity);
        
    }
    public function GetAll()
    {
        return $this->repository->GetAll();

    } 
    public function GetListCookies()
    {
        $votacion = array();

        if (isset($_COOKIE['Votaciones'])) {
            $votacion = json_decode($_COOKIE['Votaciones'],false); 
        } else {
            setcookie("Votaciones", json_encode($votacion), $utilitiy->GetCookieTime(), "/");
        }

        return $votacion;
    }
    
    
    
    public function addcookie($entity){
        $votacion = $this->GetListCookies();

       if (!empty($$votacion)) { //validamos si ya hay personajes creado
        $lastCharacter = $utilitiy->getLastElement($votacion); //Obtenemos el ultimo elemento del listado de heroe  
        $characterId =  $lastCharacter->id + 1; //como ya existen heroes el id del nuevo heroe debe ser el id el ultimo + 1
    }

    array_push($votacion, $entity); //Agregamos el personaje al listado de personajes

    setcookie("Votaciones", json_encode($votacion), $utilitiy->GetCookieTime(), "/"); 
    }
    

}
?>