<?php 
include "../layout/layout.php";
include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'Ciudadano.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryCiudadano.php';
include 'CiudadanoService.php';

$service = new CiudadanoService("../../database");
$containId = isset($_GET['documentoIdentidad']); 
$Id = 0;
if ($containId) {
    $Id = $_GET['documentoIdentidad']; 
    $service->Delete($Id);
}
 header("Location: listaCiudadano.php"); 
 exit(); 
 
?>