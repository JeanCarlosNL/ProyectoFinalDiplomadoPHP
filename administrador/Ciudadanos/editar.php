<?php 
//include '../helpers/auth.php';
include "../layout/layout.php";
include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'Ciudadano.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryCiudadano.php';
include 'CiudadanoService.php';

$layout = new layout(true,"ciudadanos",true);
$utilities = new Utilities();
$service = new CiudadanoService("../../database");

$containId = isset($_GET['documentoIdentidad']);
$element = null;
if ($containId) {
    $id = $_GET['documentoIdentidad'];
    $element = $service->GetById($id);
$selectedActivo=($element->estado == "1") ? "checked" : ""; 
$selectedInactivo=($element->estado == "0") ? "checked" : ""; 
}
// Validacion de POST

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['documentoIdentidad']) && isset($_POST['estado'])){

    $updateEntity = new Partido();
    $updateEntity->InitializeData($_POST['documentoIdentidad'], $_POST['nombre'],$_POST['apellido'],$_POST['email'], $_POST['estado']);
    $service->Update($id, $updateEntity);
    header("Location: listaCiudadanos.php");
   exit();

} else 

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
    <title>Ciudadanos</title>
</head>
<body  id="page-top">
<?php $layout->mostrarHeader();?>

<div id="content-wrapper">

    <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="listaElecciones.php">Ciudadanos</a>
        </li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>

    <!-- Icon Cards-->
    <!--<div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
            <div class="card-body-icon">
                <i class="fas fa-fw fa-comments"></i>
            </div>
            <div class="mr-5">26 New Messages!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
                <i class="fas fa-angle-right"></i>
            </span>
            </a>
        </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
            <div class="card-body-icon">
                <i class="fas fa-fw fa-list"></i>
            </div>
            <div class="mr-5">11 New Tasks!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
                <i class="fas fa-angle-right"></i>
            </span>
            </a>
        </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
            <div class="card-body-icon">
                <i class="fas fa-fw fa-shopping-cart"></i>
            </div>
            <div class="mr-5">123 New Orders!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
                <i class="fas fa-angle-right"></i>
            </span>
            </a>
        </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
            <div class="card-body-icon">
                <i class="fas fa-fw fa-life-ring"></i>
            </div>
            <div class="mr-5">13 New Tickets!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
                <i class="fas fa-angle-right"></i>
            </span>
            </a>
        </div>
        </div>
    </div>-->

    <!--Formulario-->
    <div class="card mb-3">
        <div class="card-header">
        <i class="fas fa-user-cog"></i> Edicion del Ciudadano <?= "*Nombre del ciudadano*"?>       
        </div>

        <div class="card-body">

        <!-- Formulario -->

        <form class="needs-validation" type="POST" action= "editar.php" novalidate>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <h6><label for="nombre" class="col-form-label-lg col-form-label">Nombre</label></h6>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <input value="<?php ?>" type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del ciudadano" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                        Digite un nombre valido
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <h6><label for="apellido" class="col-form-label-lg col-form-label">Apellido</label></h6>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-male" aria-hidden="true"></i></span>
                        </div>
                        <input value="<?php ?>" type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido del ciudadano" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                        Digite un apellido valido
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-5 mb-3">
                    <h6><label for="email" class="col-form-label-lg col-form-label">Email</label></h6>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        </div>
                        <input value="<?php ?>" name="email" type="email" class="form-control" id="email" placeholder="Email del Ciudadano" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                        Digite un email valido
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <h6><label for="DocIdentidad" class="col-form-label-lg col-form-label">Documento de Identidad</label></h6>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-id-card" aria-hidden="true"></i></span>
                        </div>
                        <input value="<?php ?>" type="text" class="form-control" name="documentoIdentidad" id="documentoIdentidad" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                        Digite un documento de identidad valido
                        </div>
                    </div>
                </div>
            </div>
            <h6><label class="col-form-label-lg col-form-label">Estado</label></h6>
            <div class="custom-control custom-radio">
                <input type="radio" name="estado" class="custom-control-input" id="customControlValidation2" name="radio-stacked" checked required>
                <label class="custom-control-label" for="customControlValidation2">Activo</label>
            </div>
            <div class="custom-control custom-radio mb-3">
                <input type="radio" name="estado"  class="custom-control-input" id="customControlValidation3" name="radio-stacked" required>
                <label class="custom-control-label" for="customControlValidation3">Inactivo</label>
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Editar</button>
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