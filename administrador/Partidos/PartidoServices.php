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
        $this->repository = new RepositoryPartido($this->context->db);
    }
    public function GetById($id, $field = null)
    {
        return $this->repository->GetById($id, $field);
    }
    public function Update($id, $entity, $field = null)
    {
        $element = $this->GetById($id);

        if ($_FILES['logo']) {

            if ($_FILES['logo']['error'] == 4) {
                //$entity->logo = $element->logo;
            } else {
                $typeReplace = str_replace("image/", "", $_FILES["logo"]["type"]);
            $type =  $_FILES["logo"]["type"];
            $size =  $_FILES["logo"]["size"];
            $name = 'img/' . $entity->nombre . '.' . $typeReplace;

            $sucess = $this->utility->uploadImage("../Partidos/img", $name, $_FILES['logo']['tmp_name'], $type, $size);

                if ($sucess) {
                    $entity->logo = $name;
                }
            }
        }
        return $this->repository->Update($entity, $field);
    }
    public function Add($entity)
    {
        if ($_FILES['logo']) {

            $typeReplace = str_replace("image/", "", $_FILES["logo"]["type"]);
            $type =  $_FILES["logo"]["type"];
            $size =  $_FILES["logo"]["size"];
            $name = 'img/' . $entity->nombre . '.' . $typeReplace;

            $sucess = $this->utility->uploadImage("../Partidos/img", $name, $_FILES['logo']['tmp_name'], $type, $size);

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