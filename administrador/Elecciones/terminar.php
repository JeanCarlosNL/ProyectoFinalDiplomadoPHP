<?php 

include "../helpers/autorizado.php";
include '../layout/layout.php';
include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'Eleccion.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryEleccion.php';
include 'EleccionService.php';

$layout = new layout(true,"elecciones",true);
$utilities = new Utilities();
$service = new EleccionService("../../database");

$cambioEstado = $service->ChangeStatus($_GET['id'], 0);

header('location:listaElecciones.php');
 exit();


?>
