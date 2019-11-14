<?php 
class CandidatoService
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
?>