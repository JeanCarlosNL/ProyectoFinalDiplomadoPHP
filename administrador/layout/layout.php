<?php 

class layout

{
    private $validation;
    private $entidad;
    private $directory;

   function __construct($esEntidad, $entidad, $directory)
    {
        $this->validation = ($esEntidad) ? '../../' : "../";
        $this->entidad = $entidad;
        $this->directory = ($directory) ? '../' : "";
    }

    function esDashboard(){
      if($this->entidad=="dashboard"){
        return "active";
     }else{
     return "";
     }
    }
    function esCandidatos(){
      if($this->entidad=="candidatos"){
         return "active";
      }else{
        return "";
      }
    }
    function esCiudadanos(){
     if($this->entidad=="ciudadanos"){
        return "active";
     }else{
     return "";
     }
   }
   function esElecciones(){
     if($this->entidad=="elecciones"){
        return "active";
     }else{
     return "";
     }
   }
   function esPartidos(){
     if($this->entidad=="partidos"){
        return "active";
     }else{
     return "";
     }
   }
   function esPuestos(){
     if($this->entidad=="puestos"){
        return "active";
     }else{
     return "";
     }
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

    <a class="navbar-brand mr-1" href="index.html">Votaciones ITLA</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group" hidden>
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
      <li class="nav-item no-arrow">
        <a class="nav-link" href="{$this->directory}helpers/logout.php" id="userDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>Terminar Sesion
        </a>
      </li>
    </ul>

  </nav>
  <div id="wrapper">

    <!-- Menu -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item {$this->esDashboard()}">
        <a class="nav-link" href="{$this->directory}dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item {$this->esCandidatos()}">
        <a class="nav-link" href="{$this->directory}Candidatos/listaCandidatos.php">
        <i class="fa fa-users" aria-hidden="true"></i>
          <span>Candidatos</span>
        </a>
      </li>
      <li class="nav-item {$this->esPartidos()}">
        <a class="nav-link" href="{$this->directory}Partidos/listaPartidos.php">
        <i class="fa fa-university" aria-hidden="true"></i>
          <span>Partidos</span>
        </a>
      </li>
      <li class="nav-item {$this->esPuestos()}">
        <a class="nav-link" href="{$this->directory}PuestosElectivos/listaPuestos.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Puesto electivo</span></a>
      </li>
      <li class="nav-item {$this->esCiudadanos()}">
        <a class="nav-link" href="{$this->directory}Ciudadanos/listaCiudadanos.php">
        <i class="fa fa-user" aria-hidden="true"></i>
          <span>Ciudadanos</span></a>
      </li>
      <li class="nav-item {$this->esElecciones()}">
        <a class="nav-link" href="{$this->directory}Elecciones/listaElecciones.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Elecciones</span></a>
      </li>
    </ul>

EOF;

      echo $header;

    }

    public function mostrarFooter(){

        $footer = <<<EOF
        <!-- Sticky Footer -->
<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright © Your Website 2019</span>
    </div>
  </div>
</footer>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" href="login.html">Logout</a>
  </div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{$this->validation}styles/vendor/jquery/jquery.min.js"></script>
<script src="../styles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{$this->validation}styles/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="{$this->validation}styles/vendor/chart.js/Chart.min.js"></script>
<script src="{$this->validation}styles/vendor/datatables/jquery.dataTables.js"></script>
<script src="{$this->validation}styles/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="{$this->validation}styles/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="{$this->validation}styles/js/demo/datatables-demo.js"></script>
<script src="{$this->validation}styles/js/demo/chart-area-demo.js"></script>
EOF;

   echo $footer;
    }
}





