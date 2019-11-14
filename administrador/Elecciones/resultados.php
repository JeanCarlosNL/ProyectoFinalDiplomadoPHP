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

$listado = $service->GetById($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Detalles</title>

  <!-- Custom fonts for this template-->
  <link href="../../styles/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../../styles/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../styles/css/sb-admin.css" rel="stylesheet">

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
          <li class="breadcrumb-item active">Detalles de la eleccion del <?php echo"fecha de la eleccion seleccionada" ?></li>
        </ol>

        <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12" style="text-align:center; margin-left: auto;margin-right: auto;">
          <div class="card"style="border:solid;">
              <h5 class="card-header">Elecciones Precidenciales</h5>
              <div class="card-body p-0">
                  <div class="table-responsive">
                      <table class="table">
                          <thead class="bg-light">
                              <tr class="border-0">
                                  <th class="border-0">Foto</th>
                                  <th class="border-0">Posicion</th>
                                  <th class="border-0">Candidato</th>
                                  <th class="border-0">Cantidad de votos</th>
                                  <th class="border-0">Porcentaje</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>
                                    <div class="m-r-10"><img src="assets/images/product-pic-2.jpg" alt="user" class="rounded" width="45"></div>
                                  </td>
                                  <td>1</td>
                                  <td>Nombre del candidato</td>
                                  <td>Candidad de votos</td>
                                  <td>Porcentaje de los votos totales</td>
                              </tr>
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
                                  <th class="border-0">Posicion</th>
                                  <th class="border-0">Candidato</th>
                                  <th class="border-0">Cantidad de votos</th>
                                  <th class="border-0">Porcentaje</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>
                                    <div class="m-r-10"><img src="assets/images/product-pic-2.jpg" alt="user" class="rounded" width="45"></div>
                                  </td>
                                  <td>1</td>
                                  <td>Nombre del candidato</td>
                                  <td>Candidad de votos</td>
                                  <td>Porcentaje de los votos totales</td>
                              </tr>
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
                                  <th class="border-0">Posicion</th>
                                  <th class="border-0">Candidato</th>
                                  <th class="border-0">Cantidad de votos</th>
                                  <th class="border-0">Porcentaje</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>
                                    <div class="m-r-10"><img src="assets/images/product-pic-2.jpg" alt="user" class="rounded" width="45"></div>
                                  </td>
                                  <td>1</td>
                                  <td>Nombre del candidato</td>
                                  <td>Candidad de votos</td>
                                  <td>Porcentaje de los votos totales</td>
                              </tr>
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
                                  <th class="border-0">Posicion</th>
                                  <th class="border-0">Candidato</th>
                                  <th class="border-0">Cantidad de votos</th>
                                  <th class="border-0">Porcentaje</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                 <td>
                                    <div class="m-r-10"><img src="assets/images/product-pic-2.jpg" alt="user" class="rounded" width="45"></div>
                                  </td>
                                  <td>1</td>
                                  <td>Nombre del candidato</td>
                                  <td>Candidad de votos</td>
                                  <td>Porcentaje de los votos totales</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      <br><hr>

     <?php $layout->mostrarFooter(); ?>

</body>

</html>
