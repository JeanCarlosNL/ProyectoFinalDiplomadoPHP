<?php 
include "../helpers/autorizado.php";
include '../layout/layout.php';
include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'Partido.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryPartidos.php';
include 'PartidoServices.php'; 

$service = new PartidoService("../../database");
$containId = isset($_GET['id']); 
$Id = 0;
if ($containId) {
    $Id = $_GET['id']; 
    $service->Delete($Id);
}
 header("Location: listaPartidos.php"); 
 exit(); 


?>