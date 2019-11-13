<?php 

class layout

{

    private $directory;
    private $log;

   function __construct($directory,$log)
    {
        $this->directory = ($directory) ? '../../' : "../";
        $this->log = ($log) ? "../" : "";
    }


    public function mostrarHeader(){

        $header=<<<EOF
        <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Vota.com</title>
  <link rel="shortcut icon" href="https://cdn.pixabay.com/photo/2015/12/09/22/24/filmklappe-1085692_960_720.png">


<!-- Bootstrap core CSS -->
<link href="{$this->directory}styles/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{$this->directory}styles/css/heroic-features.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link href="{$this->directory}styles/css/modern-business.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto&display=swap" rel="stylesheet">

<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet">
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/js/mdb.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

</head>
<body>
        <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #070d59">
  <div class="container">
      <a class="navbar-brand fuente_titulo" href="">
         Votacines Itla - Por unas votacines libre de algoritmos</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item no-arrow">
        <a class="nav-link" href="{$this->log}helpers/logout.php" id="userDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>Terminar Sesion
        </a>
      </li>
    </ul>

    </div>
  </nav>

EOF;

      echo $header;

    }

    public function mostrarFooter(){

        $footer = <<<EOF
        <br><br><br><br><br><br><br><br><br>

  <!-- Footer -->
  <footer class="py-5 bg-blue" style="background-color: #1f3c88">
    <div class="container">
    <p class="m-0 text-center text-white fuente_titulo">Neo Techniques &copy;Copyright</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{$this->directory}styles/vendor/jquery/jquery.min.js"></script>
  <script src="{$this->directory}styles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
EOF;

   echo $footer;
    }
}