<?php 
//include '../helpers/auth.php';
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
$utilities = new Utilities();
$service = new PuestoElectivoService("../../database");$containId = isset($_GET['id']); 
$Id = 0;
if ($containId) {
    $Id = $_GET['id']; 
    $service->Delete($Id);
}
 header("Location: listaPuestos.php"); 
 exit(); 


?>