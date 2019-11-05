<?php 

class layout

{
    private $validation;
    private $directory; 
    private $mantenimiento;
    private $detalle;
    private $guardar;
    function __construct($isPage,$validation,$isMantenimiento,$isGuardar)
    {
        $this->directory = ($isPage) ? '../../' : "";
        $this->validation = ($validation) ? "guardar.php" : "#guardar";
        $this->mantenimiento = $isMantenimiento;
        $this->guardar = $isGuardar;
    }

    function guardarPag(){

      if($this->guardar=="pokemon"){
         return "../../index.php";
      }
      if($this->guardar=="region"){
           return "listaRegiones.php";
      }
      if($this->guardar=="tipo"){
            return "listaTipos.php";
      }

      if($this->guardar==false){
         return "hidden";
      }
      return "";
    }

    function guardarPag2(){

      if($this->guardar=="pokemon" || $this->guardar=="region" || $this->guardar=="tipo" ){
         return "hidden";
      }
      return "";
    }

    function mantenimientosPag(){
      
      $mant;

      if($this->directory==true){
         if($this->mantenimiento=="regiones"){
            $mant = "../";
         }
      }else{
          $mant = "utilities/";
      }

      return $mant;
    }

    function mantenimientosPagPokemon(){
      $mantP;
      if($this->directory==true){
        if($this->mantenimiento=="regiones"){
           $mantP = "../../";
        }
      }else{
        $mantP ="";
      }
     return $mantP;
   }

    function validationPag(){
      
      $detal= $this->detalle;
      $pagina;

      if(isset($_GET['ID']) && $detal==false) {
        
        $pagina = "Editar";
        
      }else{
        $pagina = "Añadir";
      }  

      if($detal==true){
        $pagina = "Detalles";
      }

      return $pagina;

    }


    public function mostrarHeader(){

        $header=<<<EOF
        <!-- Navigation -->
        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>
  <div id="wrapper">

    <!-- Menu -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="Candidatos/listaCandidatos.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Candidatos</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Partidos/listaPartidos.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Partidos</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="PuestosElectivos/listaPuestos.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Puesto electivo</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Ciudadanos/listaCiudadanos.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Ciudadanos</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Elecciones/listaElecciones.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Elecciones</span></a>
      </li>
    </ul>

EOF;

      echo $header;

    }

    public function mostrarFooter(){

        $footer = <<<EOF
        <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{$this->directory}styles/vendor/jquery/jquery.min.js"></script>
<script src="{$this->directory}styles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="{$this->directory}styles/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="{$this->directory}styles/js/scrolling-nav.js"></script>

EOF;

   echo $footer;
    }
}
















