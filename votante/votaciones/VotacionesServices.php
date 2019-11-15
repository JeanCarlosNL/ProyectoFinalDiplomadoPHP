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
            setcookie("Votaciones", json_encode($votacion), $this->utility->GetCookieTime(), "/");
        }

        return $votacion;
    }
    
    
    
    public function addcookie($entity,$variable){
        
        $votacion = $this->GetListCookies();

        $ingresar =array($entity,$variable);

    array_push($votacion, $ingresar); //Agregamos el personaje al listado de personajes

    setcookie("Votaciones", json_encode($votacion), $this->utility->GetCookieTime(), "/"); 
    }
    
    public function Delete()
    {
        $votacion = $this->GetListCookies();

        //Obtenemos el listado actual de heroes almacenado en la session

        unset($votacion);

        $votacion = array_values($votacion);

        setcookie("Votaciones", "", $this->utility->GetCookieTime(), "/");
    }

}
?>