<?php
 
include "helpers/autorizado.php"; 
include "layout/layout.php";
include '../helpers/utilities.php';
include '../helpers/FileHandler/IFileHandler.php';
include '../helpers/FileHandler/JsonFileHandler.php';
include '../database/SADVContext.php';
include 'Elecciones/Eleccion.php';
include 'Candidatos/Candidato.php';
include '../database/repository/IRepository.php';
include '../database/repository/RepositoryBase.php';
include '../database/repository/RepositoryEleccion.php';
include '../database/repository/RepositoryCandidato.php';
include '../database/repository/RepositoryPartidos.php';
include '../database/repository/RepositoryPuestosE.php';
include '../database/repository/RepositoryVotos.php';
include 'Elecciones/EleccionService.php';
include 'Candidatos/CandidatoService.php';
include 'Partidos/Partido.php';
include 'Partidos/PartidoServices.php';
include 'PuestosElectivos/PuestosElectivos.php';
include 'PuestosElectivos/PuestosService.php';
include '../votante/votaciones/Votacion.php';
include '../votante/votaciones/VotacionesServices.php';


$layout = new layout(false,"dashboard",false);
$service = new EleccionService("../database");
$utilities = new Utilities();
$serviceCandidatos = new CandidatoService("../database");
$partidoService = new PartidoService("../database");
$puestoEService = new PuestoElectivoService("../database");
$serviceVotaciones = new VotacionService("../database");


$Votaciones = $serviceVotaciones->getAll();
$eleccionActiva = $service->GetAll();
$Candidatos=$serviceCandidatos->GetAll();
$puesto=$puestoEService->GetAll();

$presidenteid=0;
$diputadoid=0;
$senadorid=0;
$alcaldeid=0;
$contadorVotos=0;

$activa = false;
$idEleccion=0;

foreach($eleccionActiva as $eleccion){

    if($eleccion->estado == 1){
        $idEleccion=$eleccion->id;
       $activa = true;
    }

}
foreach($Votaciones as $votos){
    if ($idEleccion==$votos->eleccion){
    }
}
foreach($puesto as $puesto){
    if($puesto->nombre=="Presidente"){
        $presidenteid=$puesto->id;
    }
    if($puesto->nombre=="Diputado"){
        $diputadoid=$puesto->id;
    }
    if($puesto->nombre=="Senador"){
        $senadorid=$puesto->id;
    }
    if($puesto->nombre=="Alcalde"){
        $alcaldeid=$puesto->id;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../styles/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../styles/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../styles/css/sb-admin.css" rel="stylesheet">

  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/libs/css/style.css">
  <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
  <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
  <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
  <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
  <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

</head>

<body id="page-top">
     
     <?php $layout->mostrarHeader();?>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Eleccion Actual</li>
        </ol>

        <?php if($activa==false):?>
        <?php else:?>

        <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12" style="text-align:center; margin-left: auto;margin-right: auto;">
          <div class="card"style="border:solid;">
              <h5 class="card-header">Elecciones Precidenciales</h5>
              <div class="card-body p-0">
                  <div class="table-responsive">
                      <table class="table">
                          <thead class="bg-light">
                              <tr class="border-0">
                                  <th class="border-0">Foto</th>
                                  <th class="border-0">Candidato</th>
                                  <th class="border-0">Cantidad de votos</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                              <?php foreach($Candidatos as $candidato):?>
                              <?php $contadorVotos=0;?>
                              <?php if($candidato->idPuesto==$presidenteid):?>
                                  <td>
                                    <div class="m-r-10"><img src="Candidatos/<?php echo $candidato->foto; ?>" height="100px" alt="user" class="rounded" width="90px"></div>
                                  </td>
                                  <td><?php echo $candidato->nombre." ".$candidato->apellido;?></td>
                                  <?php foreach($Votaciones as $votos):?>
                                  <?php if($votos->presidente==$candidato->id){$contadorVotos++;}?>
                                  <?php endforeach;?>
                                  <td><?php echo $contadorVotos;?></td>
                              </tr>
                              <?php endif;?>
                              <?php endforeach;?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      <br><hr>
      <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12" style="text-align:center; margin-left: auto;margin-right: auto;">
          <div class="card"style="border:solid;">
              <h5 class="card-header">Elecciones Alcaldes</h5>
              <div class="card-body p-0">
                  <div class="table-responsive">
                      <table class="table">
                          <thead class="bg-light">
                              <tr class="border-0">
                                  <th class="border-0">Foto</th>
                                  <th class="border-0">Candidato</th>
                                  <th class="border-0">Cantidad de votos</th>
                              </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <?php foreach($Candidatos as $candidato):?>
                              <?php $contadorVotos=0;?>
                              <?php if($candidato->idPuesto==$alcaldeid):?>
                                  <td>
                                    <div class="m-r-10"><img src="Candidatos/<?php echo $candidato->foto; ?>" height="100px" alt="user" class="rounded" width="90px"></div>
                                  </td>
                                  <td><?php echo $candidato->nombre." ".$candidato->apellido;?></td>
                                  <?php foreach($Votaciones as $votos):?>
                                  <?php if($votos->alcalde==$candidato->id){$contadorVotos++;}?>
                                  <?php endforeach;?>
                                  <td><?php echo $contadorVotos;?></td>
                              </tr>
                              <?php endif;?>
                              <?php endforeach;?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      <br><hr>
      <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12" style="text-align:center; margin-left: auto;margin-right: auto;">
          <div class="card"style="border:solid;">
              <h5 class="card-header">Elecciones Senadores</h5>
              <div class="card-body p-0">
                  <div class="table-responsive">
                      <table class="table">
                          <thead class="bg-light">
                              <tr class="border-0">
                                  <th class="border-0">Foto</th>
                                  <th class="border-0">Candidato</th>
                                  <th class="border-0">Cantidad de votos</th>
                              </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <?php foreach($Candidatos as $candidato):?>
                              <?php $contadorVotos=0;?>
                              <?php if($candidato->idPuesto==$senadorid):?>
                                  <td>
                                    <div class="m-r-10"><img src="Candidatos/<?php echo $candidato->foto; ?>" height="100px" alt="user" class="rounded" width="90px"></div>
                                  </td>
                                  <td><?php echo $candidato->nombre." ".$candidato->apellido;?></td>
                                  <?php foreach($Votaciones as $votos):?>
                                  <?php if($votos->senador==$candidato->id){$contadorVotos++;}?>
                                  <?php endforeach;?>
                                  <td><?php echo $contadorVotos;?></td>
                              </tr>
                              <?php endif;?>
                              <?php endforeach;?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      <br><hr>
      <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12" style="text-align:center; margin-left: auto;margin-right: auto;">
          <div class="card"  style="border:solid;">
              <h5 class="card-header">Elecciones Diputados</h5>
              <div class="card-body p-0">
                  <div class="table-responsive">
                      <table class="table">
                          <thead class="bg-light">
                              <tr class="border-0">
                                <th class="border-0">Foto</th>
                                  <th class="border-0">Candidato</th>
                                  <th class="border-0">Cantidad de votos</th>
                              </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <?php foreach($Candidatos as $candidato):?>
                              <?php $contadorVotos=0;?>
                              <?php if($candidato->idPuesto==$diputadoid):?>
                                  <td>
                                    <div class="m-r-10"><img src="Candidatos/<?php echo $candidato->foto; ?>" height="100px" alt="user" class="rounded" width="90px"></div>
                                  </td>
                                  <td><?php echo $candidato->nombre." ".$candidato->apellido;?></td>
                                  <?php foreach($Votaciones as $votos):?>
                                  <?php if($votos->diputado==$candidato->id){$contadorVotos++;}?>
                                  <?php endforeach;?>
                                  <td><?php echo $contadorVotos;?></td>
                              </tr>
                              <?php endif;?>
                              <?php endforeach;?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      <br><hr>
        <?php endif;?>

     <?php $layout->mostrarFooter(); ?>

</body>

</html>
