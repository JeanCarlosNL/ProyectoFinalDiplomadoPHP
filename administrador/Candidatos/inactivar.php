<?php 

include "../helpers/autorizado.php";
include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'Candidato.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryCandidato.php';
include 'CandidatoService.php';

$utilities = new Utilities();
$service = new CandidatoService("../../database");

$cambioEstado = $service->ChangeStatus($_GET['id'], 0);

header('location:listaCandidatos.php');
 exit();


?>