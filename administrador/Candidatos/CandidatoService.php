<?php

class PartidoService
{
    public $context;
    public $utility;
    public $repository;
    function __construct($directory)
    {
        $this->context = new SADVContext($directory);
        $this->utility = new Utilities();
        $this->repository = new RepositoryCiudadano($this->context->db);
    }
    public function GetById($id, $field = null)
    {
        return $this->repository->GetById($id, $field);
    }
    public function Update($entity, $field = null)
    {
        return $this->repository->Update($entity, $field);
    }
    public function Add($entity)
    {
        if ($_FILES['foto']) {

            $typeReplace = str_replace("image/", "", $_FILES["foto"]["type"]);
            $type =  $_FILES["foto"]["type"];
            $size =  $_FILES["foto"]["size"];
            $name = 'img/' . $entity->nombre . '.' . $typeReplace;

            $sucess = $this->utility->uploadImage("../Candidatos/img", $name, $_FILES['foto']['tmp_name'], $type, $size);

            if ($sucess) {
                $entity->logo = $name;
            }
        }
        return $this->repository->Add($entity);
        
    }
    public function GetAll()
    {
        return $this->repository->GetAll();
    }
    public function GetAllActive()
    {
        return $this->repository->GetAllActive();
    }
    public function ChangeStatus($id, $value, $fieldStatus = null, $field = null, $entity = null)
    {
        return $this->repository->ChangeStatus($id, $value, $fieldStatus, $field, $entity);
    }
    public function Delete($id)
    {
        return $this->repository->Delete($id);
    }
    public function GetAllInactive()
    {
        return $this->repository->GetAllInactive();
    }
}