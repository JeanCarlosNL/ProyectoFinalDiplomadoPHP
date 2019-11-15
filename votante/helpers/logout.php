<?php

include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryVotos.php';
include '../votaciones/Votacion.php';
include '../votaciones/VotacionesServices.php';
session_start();
session_destroy();
$service = new VotacionService("../../database");
$service->Delete();
header("location:../../index.php");
exit();