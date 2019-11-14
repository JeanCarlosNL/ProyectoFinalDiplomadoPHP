<?php

include "../helpers/autorizado.php";
include "../layout/layout.php";
include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'Candidato.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryCiudadano.php';
include 'CandidatoService.php';

$service = new CandidatoService("../../database");
$containId = isset($_GET['id']); 
$Id = 0;
if ($containId) {
    $Id = $_GET['id']; 
    $service->Delete($Id);
}
 header("Location: listaCandidatos.php"); 
 exit(); 

?>