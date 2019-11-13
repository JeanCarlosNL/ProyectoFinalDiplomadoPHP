<?php 

include "../layout/layout.php";

$layout = new layout(true,"partidos",true);

// Validacion de POST

if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_FILES['logo']) && isset($_POST['estado'])){

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
        <a href="listaElecciones.php">Partidos</a>
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
        <i class="fas fa-user-cog"></i> Edicion del Partido <?= "*Nombre del partido*"?>
        </div>

        <div class="card-body">

        <!-- Formulario -->

        <form class="needs-validation" type="POST" action= "editar.php" enctype="multipart/form-data" novalidate>
            <div class="form-row">
                <div class="col-md-5 mb-3">
                    <h6><label for="nombre" class="col-form-label-lg col-form-label">Nombre</label></h6>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del candidato" aria-describedby="inputGroupPrepend" required>
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
                            <input name ="logo" type="logo" class="custom-file-input" id="foto"
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
                        <textarea type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion del partido" aria-describedby="inputGroupPrepend" requiredcols="30" rows="10"></textarea>
                        <div class="invalid-feedback">
                        Digite un apellido valido
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