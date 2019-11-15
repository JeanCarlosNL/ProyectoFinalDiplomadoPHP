<?php 

include "../helpers/autorizado.php";
include '../layout/layout.php';
include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'PuestosElectivos.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryPuestosE.php';
include 'PuestosService.php';

$layout = new layout(true,"elecciones",true);
$utilities = new Utilities();
$service = new PuestoElectivoService("../../database");

$cambioEstado = $service->ChangeStatus($_GET['id'], 0);

header('location:listaPuestos.php');
 exit();


?>