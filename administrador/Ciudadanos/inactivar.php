<?php 

include "../helpers/autorizado.php";
include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'Ciudadano.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryCiudadano.php';
include 'CiudadanoService.php';

$utilities = new Utilities();
$service = new CiudadanoService("../../database");

$cambioEstado = $service->ChangeStatus($_GET['id'], 0);

header('location:listaCiudadanos.php');
 exit();


?>