<?php 

include "../helpers/autorizado.php";
include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'Partido.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryPartidos.php';
include 'PartidoServices.php';

$utilities = new Utilities();
$service = new PartidoService("../../database");

$cambioEstado = $service->ChangeStatus($_GET['id'], 0);

header('location:listaPartidos.php');
 exit();


?>