<?php
class RepositoryPuestosE extends RepositoryBase
{
    public $puestoE;
    public $utility;
    function __construct($db)
    {
        $this->puestoE = new PuestoElectivo();
        $this->utility = new Utilities();
        parent::__construct($db);
    }
    public function GetAll($entity = null)
    {
        return parent::GetAll($this->puestoE);
    }
    public function GetAllActive($entity = null, $field = null)
    {
        return parent::GetAllActive($this->puestoE, $field);
    }
    public function GetAllInactive($entity = null, $field = null)
    {
        return parent::GetAllInactive($this->puestoE, $field);
    }
    public function GetById($id, $field = null, $entity = null)
    {
        return parent::GetById($id, $field, $this->puestoE);
    }
    public function Update($entity, $field = null)
    {
        return parent::Update($entity, $field = null);
    }
    public function ChangeStatus($id, $value, $fieldStatus = null,$field = null, $entity = null)
    {
        return parent::ChangeStatus($id, $value, $fieldStatus,$field, $this->puestoE );
    }
    public function Add($entity)
    {
        return parent::Add($entity);
    }
    public function Delete($id,$entity=null, $field = null)
    {
        return parent::Delete($id,$this->puestoE);
    }

}