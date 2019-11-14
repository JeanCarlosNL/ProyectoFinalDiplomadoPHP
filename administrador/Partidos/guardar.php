<?php 
include "../helpers/autorizado.php";
include '../layout/layout.php';
include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'Partido.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryPartidos.php';
include 'PartidoServices.php';
//include '../PhpMailer/Exception.php';
//include '../PhpMailer/PHPMailer.php';
//include '../PhpMailer/SMTP.php';
//include '../helpers/emailHandler.php';


$layout = new layout(true,"partidos",true);
$utilities = new Utilities();
$service = new PartidoService("../../database");

// Validacion de POST

if(isset($_POST['nombre']) && isset($_POST['descripcion'])){
    $newEntity = new Partido();
    $newEntity->InitializeData(0, $_POST['nombre'], $_POST['descripcion'],true);
    $service->Add($newEntity);
    header("Location: listaPartidos.php"); 
    exit(); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Custom fonts for this template-->
    <link href="../../styles/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../../styles/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../styles/css/sb-admin.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Partidos</title>
</head>
<body  id="page-top">
<?php $layout->mostrarHeader();?>

<div id="content-wrapper">

    <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="listaPartidos.php">Partidos</a>
        </li>
        <li class="breadcrumb-item active">Guardar</li>
    </ol>

    
    <!--Formulario-->
    <div class="card mb-3">
        <div class="card-header">
        <i class="fas fa-user-cog"></i> Formulario de Partidos
        </div>

        <div class="card-body">

        <!-- Formulario -->

        <form class="needs-validation" method="POST" action= "guardar.php" enctype="multipart/form-data" novalidate>
            <div class="form-row">
                <div class="col-md-5 mb-3">
                <h6><label for="nombre" class="col-form-label-lg col-form-label">Nombre</label></h6>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del partido" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                    Digite un nombre valido
                    </div>
                </div>
                </div>
                <div class="col-md-4 mb-3">
                <h6><label for="logo" class="col-form-label-lg col-form-label">Logo del Partido</label></h6>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01"><i class="fa fa-file-image" aria-hidden="true"></i></span>
                    </div>
                    <div class="custom-file">
                        <input name ="logo" type="file" class="custom-file-input" id="foto"
                        aria-describedby="inputGroupFileAddon01" required>
                        <label class="custom-file-label" for="logo">Escoja una logo</label>
                    </div>
                </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-9 mb-3">
                <h6><label for="descripcion" class="col-form-label-lg col-form-label">Descripcion</label></h6>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"></span>
                    </div>
                    <textarea  class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion del partido" aria-describedby="inputGroupPrepend" requiredcols="30" rows="10" required></textarea>
                   
                </div>
                </div>
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Guardar</button>
        </form>



<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
        <!-- /Formulario -->



        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php $layout->mostrarFooter();?>
</body>
</html>