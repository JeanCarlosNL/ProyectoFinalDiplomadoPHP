<?php
class RepositoryPartido extends RepositoryBase
{
    public $partido;
    public $utility;
    function __construct($db)
    {
        $this->partido = new Partido();
        $this->utility = new Utilities();
        parent::__construct($db);
    }
    public function GetAll($entity = null)
    {
        return parent::GetAll($this->partido);
    }
    public function GetAllActive($entity = null, $field = null)
    {
        return parent::GetAllActive($this->partido, $field);
    }
    public function GetAllInactive($entity = null, $field = null)
    {
        return parent::GetAllInactive($this->partido, $field);
    }
    public function GetById($id, $field = null, $entity = null)
    {
        return parent::GetById($id, $field, $this->partido);
    }
    public function Update($entity, $field = null)
    {
        return parent::Update($entity, $field = null);
    }
    public function ChangeStatus($id, $value, $fieldStatus = null,$field = null, $entity = null)
    {
        return parent::ChangeStatus($id, $value, $fieldStatus,$field, $this->partido );
    }
    public function Add($entity)
    {
        return parent::Add($entity);
    }
    public function Delete($id,$entity=null, $field = null)
    {
        return parent::Delete($id,$this->partido);
    }

}