<?php
class RepositoryVotos extends RepositoryBase
{
    public $votos;
    public $utility;
    function __construct($db)
    {
        $this->votos = new Votaciones();
        $this->utility = new Utilities();
        parent::__construct($db);
    }
    public function GetAll($entity = null)
    {
        return parent::GetAll($this->votos);
    }
    public function GetAllActive($entity = null, $field = null)
    {
        return parent::GetAllActive($this->votos, $field);
    }
    public function GetAllInactive($entity = null, $field = null)
    {
        return parent::GetAllInactive($this->votos, $field);
    }
    public function GetById($id, $field = null, $entity = null)
    {
        return parent::GetById($id, $field, $this->votos);
    }
    public function Update($entity, $field = null)
    {
        return parent::Update($entity, $field = null);
    }
    public function ChangeStatus($id, $value, $fieldStatus = null,$field = null, $entity = null)
    {
        return parent::ChangeStatus($id, $value, $fieldStatus,$field, $this->votos );
    }
    public function Add($entity)
    {
        return parent::Add($entity);
    }
    public function Delete($id,$entity=null, $field = null)
    {
        return parent::Delete($id,$this->votos);
    }
}