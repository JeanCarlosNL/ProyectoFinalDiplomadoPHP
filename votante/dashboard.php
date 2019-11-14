<?php

include "helpers/autorizado.php";
include "layout/layout.php";
include '../helpers/utilities.php';
include '../helpers/FileHandler/IFileHandler.php';
include '../helpers/FileHandler/JsonFileHandler.php';
include '../database/SADVContext.php';
include '../administrador/PuestosElectivos/PuestosElectivos.php';
include '../administrador/Elecciones/Eleccion.php';
include '../database/repository/IRepository.php';
include '../database/repository/RepositoryBase.php';
include '../database/repository/RepositoryPuestosE.php';
include '../database/repository/RepositoryEleccion.php';
include '../administrador/PuestosElectivos/PuestosService.php';
include '../administrador/Elecciones/EleccionService.php';


$layout = new layout(false,false);
$servicePuestos = new PuestoElectivoService("../database");
$seviceElecciones = new EleccionService("../database");

$listaElecciones = $seviceElecciones->GetAll();
if($listaElecciones==null){
    $_SESSION['mensajeAutorizacion']="No hay elecciones activas";
    header("location:../index.php");
    exit();
}

$lista=$servicePuestos->GetAll();
$listaActivos = array();

// Validacion de Puestos Activos
foreach($lista as $activos){

    if($activos->estado==1){
        $listaActivos[]=$activos;
    }

}

$presidente=false;
$alcalde=false;
$senador=false;
$diputado=false;

foreach($listaActivos as $activos){
    
    switch($activos->nombre){
        case 'Presidente':
            $presidente=true;
            break;
        case 'Alcalde':
            $alcalde=true;
            break;
        case 'Senador':
            $senador=true;
            break;
        case 'Diputado':
            $diputado=true;
            break;
    }
}


?>

  <?php $layout->mostrarHeader();?>

  <!-- Se  termina el nav -->

<br>
<div class='container'>
<div class = "text-center">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1f3c88">
                <div class="container">
                    <a class="navbar-brand" href=""> </a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                      <h1 class="display-6 text-center">
                                <span class = "font-weight fuente_titulo" style="margin-left: 90px; color: white">Escoge un proceso de votacion</span>
                            </h1>
                    </div>
                  </div>
                </nav> 
              </div>
                <br>
                <div class="card-group">

                  <!-- Cards -->
                  <div class="col-sm-3" <?php if($presidente==false){echo "style='display: none;'";} ?>>
                      <div class="card">
                          <a href="votaciones/presidentes.php"><img src="http://aytomengibar.com/wp-content/uploads/2019/04/generica-votaciones-votar-elecciones-democracia-745x450.jpg"
                              class="card-img-top" alt="..."></a>
                          <div class="card-body">
                              <h5 class="card-title fuente_cuerpo">Votaciones Presidenciales</h5>
                              <a href="votaciones/presidentes.php" class="card-link">Votar</a>
                          </div>
                      </div>
                  </div>
      
                  <div class="col-sm-3"<?php if($alcalde==false){echo "style='display: none;'";} ?> >
                      <div class="card">
                          <a href="votaciones/alcaldes.php"><img src="http://aytomengibar.com/wp-content/uploads/2019/04/generica-votaciones-votar-elecciones-democracia-745x450.jpg"
                              class="card-img-top" alt="..."></a>
                          <div class="card-body">
                              <h5 class="card-title fuente_cuerpo">Votaciones<br>Alcaldes</h5>
                              <a href="votaciones/alcaldes.php" class="card-link">Votar</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3" <?php if($senador==false){echo "style='display: none;'";} ?>>
                      <div class="card">
                          <a href="votaciones/senadores.php"><img src="http://aytomengibar.com/wp-content/uploads/2019/04/generica-votaciones-votar-elecciones-democracia-745x450.jpg"
                              class="card-img-top" alt="..."></a>
                          <div class="card-body">
                              <h5 class="card-title fuente_cuerpo">Votaciones Senadores</h5>
                              <a href="votaciones/senadores.php" class="card-link">Votar</a>
                          </div>
                      </div>
                  </div>
      
                  <div class="col-sm-3"<?php if($diputado==false){echo "style='display: none;'";} ?> >
                      <div class="card">
                          <a href="votaciones/diputados.php"><img src="http://aytomengibar.com/wp-content/uploads/2019/04/generica-votaciones-votar-elecciones-democracia-745x450.jpg"
                              class="card-img-top" alt="..."></a>
                          <div class="card-body">
                              <h5 class="card-title fuente_cuerpo">Votaciones Diputados</h5>
                              <a href="votaciones/diputados.php" class="card-link">Votar</a>
                          </div>
                      </div>
                  </div>
      
                  
                  <!-- Fin Cards -->
      
              </div>
              <!-- Fin Card Group -->
    </div>
  </div>
</div>


<?php $layout->mostrarFooter();?>

</body>

</html>