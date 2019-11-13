<?php 
include '../layout/layout.php';
include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'PuestosElectivos.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryPuestosE.php';
include 'PuestosService.php';
include "../helpers/autorizado.php";
include "../layout/layout.php";

$layout = new layout(true,"puestos",true);
$utilities = new Utilities();
$service = new PuestoElectivoService("../../database");
// Validacion de POST

$containId = isset($_GET['id']);
$element = null;

if ($containId) {

    $id = $_GET['id'];

    $element = $service->GetById($id);

$selectedActivo=($element->estado == "1") ? "selected" : ""; 
$selectedInactivo=($element->estado == "0") ? "selected" : ""; 
}
    if(isset($_POST['nombre']) && isset($_POST['descripcion'])){
        $updateEntity = new PuestoElectivo();
        $updateEntity->InitializeData($id, $_POST['nombre'], $_POST['descripcion'], $_POST['estado']);
        $service->Update($updateEntity);
        header("Location: listaPuestos.php");
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
    <title>Puesto</title>
</head>
<body  id="page-top">
<?php $layout->mostrarHeader();?>

<div id="content-wrapper">

    <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="listaPuestos.php">Puesto</a>
        </li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>

    <!--Formulario-->
    <div class="card mb-3">
        <div class="card-header">
        <i class="fas fa-user-cog"></i> Edicion del puesto <strong><?php echo $element->nombre;?></strong>
        </div>

        <div class="card-body">

        <!-- Formulario -->

        <form class="needs-validation" method="POST" action= "editar.php?id=<?php echo $element->id; ?>" enctype="multipart/form-data" novalidate>
            <div class="form-row">
                <div class="col-md-5 mb-3">
                    <h6><label for="nombre" class="col-form-label-lg col-form-label">Nombre</label></h6>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control" name="nombre" id="nombre" placerholder="Nombre del Puesto" value="<?php echo $element->nombre;?>" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                        Digite un nombre valido
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
                        <textarea  class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion del puesto" aria-describedby="inputGroupPrepend" requiredcols="30" rows="10"><?php echo $element->descripcion;?></textarea>
                        <div class="invalid-feedback">
                        Digite una descripcion valida
                        </div>
                    </div>
                </div>
            </div>
            <h6><label class="col-form-label-lg col-form-label">Estado</label></h6>
            <div class="custom-control custom-radio">
            <select name="estado" class="form-control" id="CheckStatus">
            <option <?php echo $selectedActivo; ?> value="1">Activo</option>
            <option <?php echo $selectedInactivo; ?> value="0">Inactivo</option>
            </select>
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