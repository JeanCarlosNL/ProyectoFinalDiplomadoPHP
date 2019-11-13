<?php
class RepositoryCiudadano extends RepositoryBase
{
    public $ciudadano;
    public $utility;
    function __construct($db)
    {
        $this->ciudadano = new Ciudadano();
        $this->utility = new Utilities();
        parent::__construct($db);
    }
    public function GetAll($entity = null)
    {
        return parent::GetAll($this->ciudadano);
    }
    public function GetAllActive($entity = null, $field = null)
    {
        return parent::GetAllActive($this->ciudadano, $field);
    }
    public function GetAllInactive($entity = null, $field = null)
    {
        return parent::GetAllInactive($this->ciudadano, $field);
    }
    public function GetById($id, $field = null, $entity = null)
    {
        return parent::GetById($id, $field, $this->ciudadano);
    }
    public function Update($entity, $field = null)
    {
        return parent::Update($entity, $field = null);
    }
    public function ChangeStatus($id, $value, $fieldStatus = null,$field = null, $entity = null)
    {
        return parent::ChangeStatus($id, $value, $fieldStatus,$field, $this->ciudadano );
    }
    public function Add($entity)
    {
        return parent::Add($entity);
    }
    public function Delete($id,$entity=null, $field = null)
    {
        return parent::Delete($id,$this->ciudadano);
    }

}