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
include '../../database/repository/RepositoryCandidato.php';
include '../../database/repository/RepositoryPartidos.php';
include '../../database/repository/RepositoryPuestosE.php';
include 'CandidatoService.php';
include '../Partidos/Partido.php';
include '../Partidos/PartidoServices.php';
include '../PuestosElectivos/PuestosElectivos.php';
include '../PuestosElectivos/PuestosService.php';

$layout = new layout(true,"candidatos",true);
$utilities = new Utilities();
$service = new CandidatoService("../../database");
$partidoService = new PartidoService("../../database");
$puestoEService = new PuestoElectivoService("../../database");

$listadoCandidato = $service->GetAll();
$listadoPartido = $partidoService->GetAll();
$listadoPuesto = $puestoEService->GetAll();

?>

