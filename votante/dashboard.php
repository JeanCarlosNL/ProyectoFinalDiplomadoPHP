
<?php

include "helpers/autorizado.php";
include "layout/layout.php";

$layout = new layout(false,false);



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
                  <div class="col-sm-3" >
                      <div class="card">
                          <a href="votaciones/presidentes.php"><img src="http://aytomengibar.com/wp-content/uploads/2019/04/generica-votaciones-votar-elecciones-democracia-745x450.jpg"
                              class="card-img-top" alt="..."></a>
                          <div class="card-body">
                              <h5 class="card-title fuente_cuerpo">Votaciones Presidenciales</h5>
                              <a href="votaciones/presidentes.php" class="card-link">Votar</a>
                          </div>
                      </div>
                  </div>
      
                  <div class="col-sm-3" >
                      <div class="card">
                          <a href="votaciones/alcaldes.php"><img src="http://aytomengibar.com/wp-content/uploads/2019/04/generica-votaciones-votar-elecciones-democracia-745x450.jpg"
                              class="card-img-top" alt="..."></a>
                          <div class="card-body">
                              <h5 class="card-title fuente_cuerpo">Votaciones<br>Alcaldes</h5>
                              <a href="votaciones/alcaldes.php" class="card-link">Votar</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3" >
                      <div class="card">
                          <a href="votaciones/senadores.php"><img src="http://aytomengibar.com/wp-content/uploads/2019/04/generica-votaciones-votar-elecciones-democracia-745x450.jpg"
                              class="card-img-top" alt="..."></a>
                          <div class="card-body">
                              <h5 class="card-title fuente_cuerpo">Votaciones Senadores</h5>
                              <a href="votaciones/senadores.php" class="card-link">Votar</a>
                          </div>
                      </div>
                  </div>
      
                  <div class="col-sm-3" >
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
