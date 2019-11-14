<?php

include "../helpers/autorizado.php";
include "../layout/layout.php";
include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include '../../administrador/Candidatos/Candidato.php';
include '../../administrador/Partidos/Partido.php';
include '../../administrador/PuestosElectivos/PuestosElectivos.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryCandidato.php';
include '../../database/repository/RepositoryPartidos.php';
include '../../database/repository/RepositoryPuestosE.php';
include '../../administrador/Candidatos/CandidatoService.php';
include '../../administrador/Partidos/PartidoServices.php';
include '../../administrador/PuestosElectivos/PuestosService.php';

$layout = new layout(true,true);
$utilites = new Utilities();
$serviceCandidato = new CandidatoService("../../database");
$servicePardidos = new PartidoService("../../database");
$servicePuestos = new PuestoElectivoService("../../database");

$listadoCandidatos = $serviceCandidato->GetAll();
$listadoPartidos = $servicePardidos->GetAll();
$listadoPuestos = $servicePuestos->GetAll();

$newListado=array();
$partidos=array();
$puesto="";

foreach($listadoPartidos as $lista){

    $partidos[] = $lista;

}

foreach($listadoPuestos as $lista){
 if($lista->nombre  =='Presidente'){
    $puesto = $lista->id;
 }
}

foreach($listadoCandidatos as $lista){

  if($lista->estado == 1 && $lista->idPuesto==$puesto){
    $newListado[]=$lista;
  }
}

foreach($newListado as $listado){

    foreach($partidos as $partido){
        if($listado->idPartido==$partido->id){
            $listado->idPartido = $partido->nombre;
         }
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
                                <span class = "font-weight fuente_titulo" style="margin-left: 90px; color: white">Usted esta votando por PRESIDENTE</span>
                            </h1>
                    </div>
                  </div>
                </nav> 
              </div>
                <br>
                <div class="card-group">

                  <!-- Cards -->
                  <?php foreach($newListado as $candidato): ?>
                    <div class="col-sm-3" >
                      <div class="card">
                          <a href="candidatos/presidentes.php"><img src="../<?php echo $candidato->foto;?>"
                              class="card-img-top" alt="..."></a>
                          <div class="card-body">
                              <h5 class="card-title fuente_cuerpo"><?php echo $candidato->nombre." ".$candidato->apellido;?></h5>
                              <a href="desarrollador_software.html" class="card-link"><?php echo $candidato->idPartido;?></a>
                          </div>
                      </div>
                  </div> 
                  <?php endforeach;?>
                  <div class="col-sm-3" >
                      <div class="card">
                          <a href="candidatos/presidentes.php"><img src="http://aytomengibar.com/wp-content/uploads/2019/04/generica-votaciones-votar-elecciones-democracia-745x450.jpg"
                              class="card-img-top" alt="..."></a>
                          <div class="card-body">
                              <h5 class="card-title fuente_cuerpo">Ninguno</h5>
                              <a href="desarrollador_software.html" class="card-link"></a>
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